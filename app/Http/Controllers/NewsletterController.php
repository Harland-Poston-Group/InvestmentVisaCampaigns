<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {

      //  dd($request->all());

        $name = $request->input('name');
        $email = $request->input('email');
        $filters = $request->except('email', '_token');

        $details = [
            'name' => $name,
            'email' => $email,
            'filters' => $filters, // Always wrapped as 'filters'
        ];

        Mail::to('paulo.bernardes@portugalhomes.com')->send(new \App\Mail\NewsletterSubscription($details));

        return response()->json(['message' => 'Thanks for subscribing!']);
    }

    public function sendEmail(Request $request)
    {
        $data = $request->all();

        // You can reuse your Mailable or create a new one if needed
        Mail::to('paulo.bernardes@portugalhomes.com')->send(new \App\Mail\NewsletterSubscription([
            'email' => $data['email'] ?? '',
            'advisor' => $data['advisor_name'] ?? 'Not specified',
            'filters' => $data, // capture all fields
        ]));

        return response()->json(['message' => 'Email sent successfully']);
    }

    public function requestCall(Request $request)
    {
        $data = $request->all();

        Mail::to('paulo.bernardes@portugalhomes.com')->send(new \App\Mail\NewsletterSubscription([
            'email' => $data['email'] ?? '',
            'advisor' => $data['advisor_name'] ?? 'Not specified',
            'filters' => $data,
        ]));

        return response()->json(['message' => 'Call request sent successfully']);
    }



}
