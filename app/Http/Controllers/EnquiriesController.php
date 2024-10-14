<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Helpers\Dynamics_Helper;

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


}
