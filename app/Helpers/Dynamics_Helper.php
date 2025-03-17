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
    private static $web_enquiry_api_url;
    private static $client_id;
    private static $client_secret;
    private static $resource;
    private static $token_url;

    // Primary function that will handle the form submission
    public static function dynamics_form_submission($submission_data){

        // Define the credentials within the variables to connect to Dynamics 365
        self::$api_url = env('DYNAMICS_API_URL');
        self::$web_enquiry_api_url = env('DYNAMICS_WEB_ENQUIRY_API_URL');
        self::$client_id = env('DYNAMICS_CLIENT_ID');
        self::$client_secret = env('DYNAMICS_CLIENT_SECRET');
        self::$token_url = env('DYNAMICS_TOKEN_URL');
        self::$resource = env('DYNAMICS_RESOURCE');
        self::$access_token = self::getAccessToken();

        // Creating an associative array that contains the received values with Dynamics' form fields values already inserted
        $post = [];
        $data = $submission_data;


        // If the email address exists and is not empty - this is mandatory for any submission
        if( isset($submission_data['email_address']) && !is_null($submission_data['email_address']) && !empty($submission_data['email_address']) ){

            // Check if the email belongs to a list of blocked domains
            if (isBlockedEmailDomain($submission_data['email_address'])) {
                Log::info('[ZeroBounce] - Email ' . $submission_data['email_address'] . ' belongs to a blocked domain | Blocked from Dynamics 365 submission');
                writeBlockedEmail($submission_data['email_address'], 'Email address belongs to a blocked domain by us.');
                return false;
            }

            $valid = verify($submission_data['email_address']);

            // Invalid Email
            if( $valid->getStatusCode() !== 200 ){

                $reason = $valid->getData(true);
                $reason = $reason['email_verification_error'];

                writeBlockedEmail($submission_data['email_address'], $reason);

                // Mail::to('miguel.curto@portugalhomes.com')
                //     ->send(new \App\Mail\Admin\InvalidEmail($submission_data['email_address']));

                // dump($reason);
                Log::info('[ZeroBounce] - Email ' . $submission_data['email_address'] . ' verified as not being a credible email address | Blocked from Dynamics 365 submission');
                return false;

            // Valid Email
            }else{
                // The email is valid - nothing to be done
            }

        }else{
            return false;
        }

        // dump($valid);
        // dd('Passed the email validation!');

        /* First we'll create the field mappings and only after, we'll automatically populate our array with the correct fields that we may have */

        // Define the mappings from form fields to Dynamics fields
        $fieldMappings = [
            'first_name' => 'firstname',
            'last_name' => 'lastname',
            'email' => 'emailaddress1',
            'email_address' =>  'emailaddress1',
            'phone_number' => 'telephone1',
            'country_code'  => 'ans_countrycode',
            'countrycode'   =>  'ans_countrycode',
            'message' => 'ans_message',
            'investment_amount' =>  'ans_investmentamount',
            'what_are_you_looking_for' => 'ans_whatareyoulookingfortext',
            'enquiry_subject' => 'ans_whatareyoulookingfortext',
            'ref_property' => 'ans_propertyref',
            'reference' => 'ans_propertyref', // This can be overridden later
            'ref_fraction' => 'ans_unitref',
            'company' => 'companyname',
            'position' => 'jobtitle',
            'website_url' => 'websiteurl',
            'quiz_submission'   =>  'ans_quiz_submission',
            'new_minimum_investment_amount' => 'new_minimum_investment_amount'
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
        $post['ans_brand'] = 119020001;

        if( !empty( $_SERVER['HTTP_REFERER'] ) ){

            $post["ans_firstpageseen"] = $_SERVER['HTTP_REFERER'];
        }

        /* Add Tracking Information */

            // In case we have any available data regarding campaigns from where the user may have visited us through
            $utm_source = Cookie::get('utm_source', '');
            $utm_medium = Cookie::get('utm_medium', '');
            $utm_campaign = Cookie::get('utm_campaign', '');

            // We're only using the 'source' for now
            if( !empty($utm_source) ){

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
                    case 'microsoft':
                        $post['ans_originalsource'] = 100000001;
                        break;
                    default:
                        # code...
                        break;
                }
            }

        /* End of Tracking Information */

        /* Specifying the maildata variable section -- where the final touches of maildata info will be defined */

            // maildata variable
            $maildata = $post;

            // utm_source
            if( isset($utm_source) && !empty($utm_source) ){
                $maildata['utm_source'] = $utm_source;
            }

            // utm_medium
            if( isset($utm_medium) && !empty($utm_medium) ){
                $maildata['utm_medium'] = $utm_medium;
            }

            // utm_campaign
            if( isset($utm_campaign) && !empty($utm_campaign) ){
                $maildata['utm_campaign'] = $utm_campaign;
            }

        /* End of maildata variable section */

        /* DETECT COUNTRY OF ORIGIN OF SUBMISSION */
            /* This may come in handy as there are some submissions that are coming without the country code, with this happening,
            we can capture either way the country of submission of the user, it is almost certain that the phone number introduced is correspondent to the
            country where the person is located, thus mitigating this issue, assuming these are real users and not BOTs */

            try {
                // Fetch country of origin based on user's IP
                $ip = request()->ip(); // Get the user's IP address
                $country_of_origin = self::getCountryFromIP($ip);

                // Set the country of origin in maildata
                $maildata['country_of_origin'] = $country_of_origin ?? 'N/A';
            } catch (\Exception $e) {
                \Log::error("Error fetching country of origin: " . $e->getMessage());
                $maildata['country_of_origin'] = 'N/A'; // Default value if any error occurs
            }

        /* END OF COUNTRY DETECTION */

        // If it's a work visa submission - do not accept it
        if( isset($post['ans_whatareyoulookingfortext']) ){

            switch ( strtolower($post['ans_whatareyoulookingfortext']) ) {
                case 'work visa':
                    return false;
                    break;
                case 'work_visa':
                    return false;
                    break;
                default:
                    # Nothing happens
                    break;
            }

        }

        // dd($post);

        // Check if there's a lead with the same email in Dynamics
        // $existing_lead = self::checkExistingLead($post['emailaddress1']);

        // The email to where the notification of this submission should be sent to
        $admin_notification_emails = ['enquiries@investmentvisa.com', 'antonio.lima@portugalhomes.com'];
        // $admin_notification_emails = ['antonio.lima@portugalhomes.com'];

        // Set timezone to Portugal
        date_default_timezone_set('Europe/Lisbon');

        /* Check if there's a multistep form that has data we want to send to the enquiries email */

            if( isset($submission_data['quiz_email_submission']) ){
                // dd($submission_data['quiz_email_submission']);
                $maildata['quiz_submission'] = $submission_data['quiz_email_submission'];
            }

        /* End of multistep check */

        // If there's a contact with this submission's email
        if( isset($existing_lead) && $existing_lead ){

            // Lead exists, get the existing message
            $lead_id = $existing_lead['leadid'];
            $post['leadid'] = $lead_id;
            $maildata['leadid'] = $lead_id;
            $existing_message = $existing_lead['ans_message'];

            // Email the admin of the form submission
            // Mail::to($admin_notification_emails)
            // ->send(new \App\Mail\Admin\DynamicsExistingContactEnquiry($maildata));

            // dd($post);

            if( isset($data['message']) ){

                // Get the current timestamp in desired format
                $timestamp = date('d/m/Y H:i'); // Example: 03/10/2024 08:55

                // Append the new message with a separator
                $new_message = "(Last updated: $timestamp)\n" . $data['message'] . "\n";

                $combined_message = trim($new_message . $existing_message );

                // Prepare data to update Dynamics
                $post['ans_message'] = $combined_message;

            }

            // Update the existing lead with the new message
            try {

                /* NO LONGER NEED TO CREATE/UPDATE LEADS AS WEB ENQUIRIES ARE ALREADY BEING USED */
                // $response = self::updateExistingLead($lead_id, $post);

                // echo "Lead updated successfully<br>. Response: <pre>" . $response. '</pre>';

                // $post['ans_lead'] = $lead_id;
                // // Web Enquiry Record creation
                // self::createWebEnquiryRecord($post);

                // Email the admin of the form submission
                Mail::to($admin_notification_emails)
                ->send(new \App\Mail\Admin\DynamicsExistingContactEnquiry($maildata));

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

        }else{

            // Contact/Lead Creation

            /* NO LONGER NEED TO CREATE/UPDATE LEADS AS WEB ENQUIRIES ARE ALREADY BEING USED */
            // Run the function that will submit the data over to Dynamics 365
            // self::sendToDynamics365($post);

            // Email the admin of the form submission
            Mail::to($admin_notification_emails)
            ->send(new \App\Mail\Admin\DynamicsEnquiry($maildata));
        }

        // This field has a different name in the web enquiries field
        if( isset($data['investment_amount']) ){
            $post['new_minimum_investment_amount'] = $data['investment_amount'];
        }

        // Web Enquiry Record creation
        self::createWebEnquiryRecord($post);

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
    protected static function sendToDynamics365($data)
    {

        // Log access token status
        Log::info('Access token retrieved: ' . (self::$access_token ? 'Success' : 'Failed'), ['context' => 'custom-debug']);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . self::$access_token,
        ])
        ->post(self::$api_url, $data);

        // Log the response from Dynamics 365
        Log::info('Dynamics 365 Response: ' . print_r($response->body(), true), ['context' => 'custom-debug']);

        if ($response->status() !== 204) {
            Log::error('Failed to create lead in Dynamics 365: ' . $response->body(), ['context' => 'custom-debug']);
            // Handle the error as needed
            throw new \Exception('Failed to create lead in Dynamics 365' . $response->body());
        }
    }

    // Create Web Enquiry Record
    protected static function createWebEnquiryRecord($data)
    {

        // Log access token status
        // Log::info('Access token retrieved: ' . (self::$access_token ? 'Success' : 'Failed'), ['context' => 'custom-debug']);

        /* Clean Data and convert input names for Web Enquiry field names (Thanks ANS for not keeping the same input names as in Leads) */

            $web_enquiry_data = [];


            // First Name
            if( isset( $data['firstname'] ) ){
                $web_enquiry_data['ans_firstname'] = $data['firstname'];
            }

            // Last Name
            if ( isset( $data['lastname'] )){
                $web_enquiry_data['ans_lastname'] = $data['lastname'];
            }

            // Phone Number
            if( isset( $data['telephone1'] ) ){

                if( isset($data['ans_countrycode']) && !empty($data['ans_countrycode']) ){
                    $country_code = $data['ans_countrycode'] . ' ';
                }else{
                    $country_code = '';
                }

                $web_enquiry_data['ans_businessphone'] = $country_code . $data['telephone1'];

            }

            // Email
            if( isset( $data['emailaddress1'] ) ){
                $web_enquiry_data['ans_emailaddress'] = $data['emailaddress1'];
            }

            // Brand
            if( isset( $data['ans_brand'] ) ){
                $web_enquiry_data['ans_brand'] = $data['ans_brand'];
            }

            // First Page Seen
            if( isset( $data['ans_firstpageseen'] ) ){
                $web_enquiry_data['ans_firstpageseen'] = $data['ans_firstpageseen'];
            }

            // What are you looking for
            if( isset( $data['ans_whatareyoulookingfortext'] ) ){
                $web_enquiry_data['ans_whatareyoulookingfor'] = $data['ans_whatareyoulookingfortext'];
            }

            // Property Ref
            if( isset( $data['ans_propertyref'] ) ){
                $web_enquiry_data['ans_propertyref'] = $data['ans_propertyref'];
            }

            // Unit REF
            if( isset( $data['ans_unitref'] ) ){
                $web_enquiry_data['ans_unitref'] = $data['ans_unitref'];
            }

            if( isset( $data['ans_message'] ) && !empty( $data['ans_message'] ) ){
                $web_enquiry_data['ans_message'] = $data['ans_message'];
            }

        /* End of input cleaning */

        $response_web_enquiry = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . self::$access_token,
        ])
        ->post(self::$web_enquiry_api_url, $web_enquiry_data);

        // Log the response from Dynamics 365
        Log::info('Dynamics 365 Response: ' . print_r($response_web_enquiry->body(), true), ['context' => 'custom-debug']);

        if ($response_web_enquiry->status() !== 204) {
            Log::error('Failed to create Web Enquiry record in Dynamics 365: ' . $response_web_enquiry->body(), ['context' => 'custom-debug']);
            // Handle the error as needed
            throw new \Exception('Failed to create Web Enquiry record in Dynamics 365: ' . $response_web_enquiry->body());
        }

    }

    /**
     * Helper function to get the country from the user's IP using geoplugin.com API.
     *
     * @param string $ip
     * @return string|null
     */
    protected static function getCountryFromIP($ip)
    {
        try {
            // Use Laravel's HTTP client to fetch geolocation data
            $response = \Illuminate\Support\Facades\Http::get("http://www.geoplugin.net/json.gp?ip={$ip}");

            if ($response->ok()) {
                $data = $response->json();
                return $data['geoplugin_countryName'] ?? null;
            }
            return null; // Return null if API response is not ok
        } catch (\Exception $e) {
            \Log::error("Error fetching geolocation data: " . $e->getMessage());
            return null; // Return null in case of any error
        }
    }
}
