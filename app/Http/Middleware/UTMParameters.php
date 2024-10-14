<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class UTMParameters
{
    public function handle($request, Closure $next)
    {
        // List of UTM parameters to capture
        $utm_params = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'utm_adgroup', 'utm_campaignid', 'utm_location', 'utm_gclid'];

        // Loop through each UTM parameter and check if it's present in the URL query
        foreach ($utm_params as $param) {

            // If the parameter exists in the query and is not already in the session
            // if ($request->query($param) && !$request->session()->has($param)) {

            //     // Store the UTM parameter in the session
            //     $request->session()->put($param, $request->query($param));
            // }

            // Using cookies instead of a session variable as we want to track this data in future sessions in case the user comes back
            // even if via direct access to the website
            if ($request->query($param) && !Cookie::has($param)) {
                // Store UTM parameter in a cookie that lasts for 30 days (adjust the time as necessary)
                Cookie::queue(Cookie::make($param, $request->query($param), 43200)); // 43200 minutes = 30 days
            }
        }

        return $next($request);
    }
}
