<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Helpers\Dynamics_Helper;
use App\Models\Multistep_Form_Question;
use App\Models\Multistep_Form_Answer;
use Illuminate\Support\Str;

class EnquiriesController extends Controller
{

    // Process the form submission
    public function landing_page_enquiry(Request $request)
    {

        // Send data over to Dynamics 365
        $submission_data = $request->all();
        // dd($submission_data);
        $response = Dynamics_Helper::dynamics_form_submission($submission_data);

        // dd($submission_data);

        return response()->json(['success' => 'Thank you for your enquiry, we\'ll be in touch, shortly.']);
    }

    // Process the download brochure form submission
    public function download_brochure_enquiry(Request $request)
    {

        // // Send data over to Dynamics 365
        $submission_data = $request->all();
        // // dd($submission_data);
        $response = Dynamics_Helper::dynamics_form_submission($submission_data);

        if( isset( $submission_data['fullname'] ) && !empty($submission_data['fullname']) ){

            // Split full name by spaces
            $nameParts = Str::of($submission_data['fullname'])->explode(' ');

            // Set the first word as firstname
            $submission_data['firstname'] = $nameParts->first();

        }

        // dd($submission_data);
        if( isset($submission_data['brochure-link']) && !empty($submission_data['brochure-link']) ){

            switch ($submission_data['brochure-link']) {
                case 'fact_sheet':
                    $submission_data['brochure-link'] = '/assets/brochures/ggv_fact_sheet.pdf';
                    break;
                default:
                $submission_data['brochure-link'] = '/assets/brochures/ggv_fact_sheet2.pdf';
                    break;
            }

            $submission_data['brochure-link'] = url($submission_data['brochure-link']);
            $maildata = $submission_data;

        }else{
            return false;
        }

        // dd($maildata);

        Mail::to($submission_data['email_address'])
        ->send(new \App\Mail\User\BrochureDownload($maildata));

        return response()->json(['success' => 'Thank you for your enquiry, we\'ll be in touch, shortly.']);
    }

    // Enquiry from the multistep form (or any)
    public function multistep_form_enquiry(Request $request)
    {

        // Send data over to Dynamics 365
        $submission_data = $request->all();
        $questionsWithAnswers = [];
        $emailSubmissionData = []; // To be used to include in the email notification

        // Iterate through the questions answered
        foreach ($submission_data as $key => $value) {

            if ( str_starts_with($key, 'question_') ) {
                $questionId = (int) str_replace('question_', '', $key);

                // 2. Fetch the question and answers from the database
                $question = Multistep_Form_Question::with('answers')
                    ->where('id', $questionId)
                    ->first();

                if ($question) {
                    // Fetch the selected answers' texts
                    $selectedAnswers = Multistep_Form_Answer::whereIn('id', $value)->pluck('answer_text')->toArray();

                    // 3. Organize the data
                    $questionsWithAnswers[] = [
                        'question_text' => $question->question_text,
                        'selected_answers' => $selectedAnswers,
                    ];

                    // Organize the data for `quiz_email_submission`
                    $emailSubmissionData[$question->question_text] = $selectedAnswers;
                }
            }

        }

        $formattedData = '';

        // Get the questions with answers array and put everything into one string with separated lines to insert into Dynamics 365
        foreach ($questionsWithAnswers as $qa) {
            $formattedData .= "Question: " . $qa['question_text'] . "\n";
            $formattedData .= "Answers:\n";

            foreach ($qa['selected_answers'] as $answer) {
                $formattedData .= "- " . $answer . "\n";
            }

            $formattedData .= "\n"; // Add a line break after each question
        }


        // dump($submission_data);
        // dump($formattedData);
        // dd($questionsWithAnswers);

        // Inserting it in the load sent over to the Dynamics fuction
        $submission_data['quiz_submission'] = $formattedData;
        $submission_data['quiz_email_submission'] = $emailSubmissionData; // Key-value format for email or other use


        $response = Dynamics_Helper::dynamics_form_submission($submission_data);

        // dd($submission_data);

        return response()->json(['success' => 'Thank you for your enquiry, we\'ll be in touch, shortly.']);

    }


}
