<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;


// Helper File to Use Dynamics 365 functions to create leads within the CRM
class Dynamics_Helper {

    private static $access_token;
    private static $api_url;
    private static $client_id;
    private static $client_secret;
    private static $resource;
    private static $token_url;

    // Primary function that will handle the form submission
    public static function dynamics_form_submission($submission_data){

        // Define the credentials within the variables to connect to Dynamics 365
        self::$api_url = env('DYNAMICS_API_URL');
        self::$client_id = env('DYNAMICS_CLIENT_ID');
        self::$client_secret = env('DYNAMICS_CLIENT_SECRET');
        self::$token_url = env('DYNAMICS_TOKEN_URL');
        self::$resource = env('DYNAMICS_RESOURCE');
        self::$access_token = self::getAccessToken();

        // Creating an associative array that contains the received values with Dynamics' form fields values already inserted
        $post = [];
        $data = $submission_data;

        // dump("Hello there! Here is your dump!");
        // dd($data);

        /* First we'll create the field mappings and only after, we'll automatically populate our array with the correct fields that we may have */

        // Define the mappings from form fields to Dynamics fields
        $fieldMappings = [
            'first_name' => 'firstname',
            'last_name' => 'lastname',
            'email' => 'emailaddress1',
            'email_address' =>  'emailaddress1',
            'phone_number' => 'telephone1',
            'message' => 'ans_message',
            'what_are_you_looking_for' => 'ans_whatareyoulookingfortext',
            'enquiry_subject' => 'ans_whatareyoulookingfortext',
            'ref_property' => 'ans_propertyref',
            'reference' => 'ans_propertyref', // This can be overridden later
            'ref_fraction' => 'ans_unitref',
            'company' => 'companyname',
            'position' => 'jobtitle',
            'website_url' => 'websiteurl'
        ];

        // Loop through field mappings and populate the $post array
        foreach ($fieldMappings as $formField => $dynamicsField) {
            if (isset($data[$formField]) && !empty($data[$formField])) {
                // Set the value only if the target field is not already set
                if (!isset($post[$dynamicsField]) || empty($post[$dynamicsField])) {
                    $post[$dynamicsField] = $data[$formField];
                }
            } else {
                // Optional: Set default values or handle missing fields
                $post[$dynamicsField] = $post[$dynamicsField] ?? ''; // Retain previous value if set
            }
        }

        // Clean $post of empty values
        $post = array_filter($post, function($value) {
            return !empty($value); // Keep only non-empty values
        });

        // Add the "Portugal Homes" brand to the request (identified by an ID)
        $post['ans_brand'] = 119020000;

        /* Add Tracking Information */

            // In case we have any available data regarding campaigns from where the user may have visited us through
            // $utm_source = session('utm_source', '');
            // $utm_medium = session('utm_medium', '');
            // $utm_campaign = session('utm_campaign', '');

            $utm_source = Cookie::get('utm_source', '');
            $utm_medium = Cookie::get('utm_medium', '');
            $utm_campaign = Cookie::get('utm_campaign', '');

            // We're only using the 'source' for now
            if( !empty($utm_source) ){

                // Lead Source
                // switch ($utm_source) {
                //     case 'google':
                //         $post['ans_leadsource'] = 119020008;
                //         break;
                //     case 'google_ads':
                //         $post['ans_leadsource'] = 119020002;
                //         break;
                //     case 'facebook':
                //         $post['ans_leadsource'] = 119020001;
                //     default:
                //         # code...
                //         break;
                // }

                // Original Source
                switch ($utm_source) {
                    case 'google':
                        $post['ans_originalsource'] = 119020001;
                        break;
                    case 'facebook':
                        $post['ans_originalsource'] = 119020000;
                        break;
                    case 'instagram':
                        $post['ans_originalsource'] = 119020000;
                        break;
                    case 'meta':
                        $post['ans_originalsource'] = 119020000;
                        break;
                    case 'ig':
                        $post['ans_originalsource'] = 119020000;
                        break;
                    case 'fb':
                        $post['ans_originalsource'] = 119020000;
                        break;
                    default:
                        # code...
                        break;
                }
            }

            // dump('UTM Campaign: ' . $utm_campaign);
            // dump('UTM Source: ' . $utm_source);
            // dd('end');

        /* End of Tracking Information */

        // If it's a work visa submission - do not accept it
        switch ( strtolower($post['ans_whatareyoulookingfortext']) ) {
            case 'work visa':
                return false;
                break;
            default:
                # Nothing happens
                break;
        }


        if( !empty( $_SERVER['HTTP_REFERER'] ) ){

            $post["ans_firstpageseen"] = $_SERVER['HTTP_REFERER'];
        }

        // Check if there's a lead with the same email in Dynamics
        $existing_lead = self::checkExistingLead($post['emailaddress1']);

        // The email to where the notification of this submission should be sent to
        $admin_notification_emails = ['enquiries@investmentvisa.com', 'antonio.lima@portugalhomes.com'];

        // If there's a contact with this submission's email
        if( $existing_lead ){

            // Lead exists, get the existing message
            $lead_id = $existing_lead['leadid'];
            $post['leadid'] = $lead_id;
            $existing_message = $existing_lead['ans_message'];

            // Email the admin of the form submission
            Mail::to($admin_notification_emails)
            ->send(new \App\Mail\Admin\DynamicsExistingContactEnquiry($post));

            // Get the current timestamp in desired format
            $timestamp = date('d/m/Y H:i'); // Example: 03/10/2024 08:55

            // Append the new message with a separator
            $new_message = "(Last updated: $timestamp)\n" . $data['message'] . "\n";

            $combined_message = trim($new_message . $existing_message );

            // Prepare data to update Dynamics
            $post['ans_message'] = $combined_message;


            // Update the existing lead with the new message
            try {
                $response = self::updateExistingLead($lead_id, $post);
                // echo "Lead updated successfully<br>. Response: <pre>" . $response. '</pre>';
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

        }else{
            // Contact/Lead Creation

            // Email the admin of the form submission
            Mail::to($admin_notification_emails)
            ->send(new \App\Mail\Admin\DynamicsEnquiry($post));

            // Run the function that will submit the data over to Dynamics 365
            self::sendToDynamics365($post);
        }

        // Check for failures
        // if (count(Mail::failures()) > 0) {
        //     // If failures exist, handle them here
        //     return response()->json(['status' => 'error', 'message' => 'Email sending failed', 'failed_recipients' => Mail::failures()]);
        // } else {
        //     // If no failures, email was sent successfully
        //     return response()->json(['status' => 'success', 'message' => 'Email sent successfully']);
        // }

    }

    // Get access token
    public static function getAccessToken() {

        // Picking up the values defined in the dashboard
        $token_url = self::$token_url;
        $client_id = self::$client_id;
        $client_secret = self::$client_secret;
        $resource = self::$resource;
        $grant_type = "client_credentials";

        // Make the POST request to get the access token
        $response = Http::asForm()->post($token_url, [
            'grant_type' => $grant_type,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'resource' => $resource,
        ]);

        // Check if the response was successful
        if ($response->successful()) {
            $body = $response->json();

            if (isset($body['access_token'])) {
                Log::info('Access token successfully retrieved');
                return $body['access_token'];
            } else {
                Log::error('Failed to retrieve access token: ' . print_r($body, true));
                throw new Exception('Failed to retrieve access token');
            }
        } else {
            Log::error('HTTP request failed: ' . $response->body());
            throw new Exception('HTTP request failed: ' . $response->body());
        }

    }

    // Check if a lead with the same email already exists
    public static function checkExistingLead($email) {

        $http = curl_init();

        // Query to check if contact exists by email
        $queryUrl = self::$api_url . "?\$filter=emailaddress1%20eq%20'".$email."'&\$select=leadid,ans_message";

        curl_setopt($http, CURLOPT_URL, $queryUrl);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($http, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . self::$access_token,
        ]);

        $response = curl_exec($http);
        $error = curl_error($http);
        curl_close($http);

        if ($error) {
            throw new Exception("Curl error: $error");
        }

        $responseData = json_decode($response, true);

        // If the query returns results, return the first lead's ID and ans_message
        if (isset($responseData['value']) && count($responseData['value']) > 0) {
            return [
                'leadid' => $responseData['value'][0]['leadid'],
                'ans_message' => $responseData['value'][0]['ans_message'] ?? '' // Return existing message if available
            ];
        } else {
            return false; // No existing lead found
        }
    }

    // Function to update an existing lead/contact in Dynamics 365
    protected static function updateExistingLead($lead_id, $contact_data) {

        $http = curl_init();

        $update_url = self::$api_url . "(" . $lead_id . ")";

        curl_setopt($http, CURLOPT_URL, $update_url);
        curl_setopt($http, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($http, CURLOPT_POSTFIELDS, json_encode($contact_data));
        curl_setopt($http, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . self::$access_token,
            'Prefer: return=representation'
        ]);

        // Run PATCH URL
        $response = curl_exec($http);
        $error = curl_error($http);
        curl_close($http);

        if ($error) {
            throw new Exception("Curl error: $error");
        }

        return $response;
    }

    // Function that will post a contact over to Dynamics 365
    // protected function sendToDynamics365($first_name, $last_name, $email, $phone_number, $message, $property_ref, $unit_ref, $company, $job_title, $website_url, $type)
    protected static function sendToDynamics365($data)
    {

        // Log access token status
        Log::info('Access token retrieved: ' . (self::$access_token ? 'Success' : 'Failed'), ['context' => 'custom-debug']);

        // Adding a First Page Seen to the request, this is going to be temporary
        // if( !empty( $_SERVER['HTTP_REFERER'] ) ){

        //     $data["ans_firstpageseen"] = $_SERVER['HTTP_REFERER'];
        // }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . self::$access_token,
        ])
        ->post(self::$api_url, $data);

        // Log the response from Dynamics 365
        Log::info('Dynamics 365 Response: ' . print_r($response->body(), true), ['context' => 'custom-debug']);

        if ($response->status() !== 204) {
            Log::error('Failed to send data to Dynamics 365: ' . $response->body(), ['context' => 'custom-debug']);
            // Handle the error as needed
            throw new \Exception('Failed to send data to Dynamics 365' . $response->body());
        }
    }
}
