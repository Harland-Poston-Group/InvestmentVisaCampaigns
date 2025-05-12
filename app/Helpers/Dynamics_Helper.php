<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Log;

class Dynamics_Helper
{
    /** Post the web-enquiry to the central Dynamics API. */
    public static function send(array $formData): void
    {

        /* ----------------------- Build final payload -------------------- */
        $payload = $formData + [
            'ans_brand'         => env('DYNAMICS_WEB_ENQUIRY_BRAND', '119020000'),
        ];

        // add only if controller didn’t supply it
        if (!isset($payload['source_page']) || $payload['source_page'] === '') {
            $payload['source_page'] = request()->headers->get('referer', '');
        }

        /* ----------------------- Ship it to Dynamics -------------------- */
        try {
            Http::asForm()                                    // API expects x-www-form-urlencoded
                ->timeout((int) env('DYNAMICS_API_CALL_WAIT_TIME', 20))
                ->post(env('DYNAMICS_WEB_ENQUIRY_ENDPOINT'), $payload)
                ->throw();                                    // throws on 4xx / 5xx / network
        } catch (RequestException $e) {
            /* 🍺  Log everything that helps you diff against Postman */
            $resp = $e->response;                             // may be null on network errors

            Log::error('Dynamics API  error', [
                'status'   => optional($resp)->status(),
                'body'     => optional($resp)->body(),
                'payload'  => $payload,
                'headers'  => optional($resp)->headers(),
            ]);

            throw $e;                                         // bubble up – controller decides
        }
    }
}
