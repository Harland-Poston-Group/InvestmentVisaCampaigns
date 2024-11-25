<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Helpers\Dynamics_Helper;
use App\Models\Multistep_Form_Question;
use App\Models\Multistep_Form_Answer;

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
