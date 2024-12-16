<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Multistep_Form;


class LandingPageController extends BaseController
{

    // Always On Campaign
    public function always_on_page(){

        $photos =  File::glob('assets/img/reps/*');

        if( !empty($photos) ){

            $agent_image = $photos[array_rand($photos)];
            $cta_agent_image = $photos[array_rand($photos)];
        }

        return view('pages.always_on.campaign',
            [
                'agent_image' => $agent_image,
                'cta_agent_image' => $cta_agent_image
            ]
        );
    }

    // Portuguese Always On Campaign
    public function always_on_page_pt(){

        $photos =  File::glob('assets/img/reps/*');

        if( !empty($photos) ){

            $agent_image = $photos[array_rand($photos)];
            $cta_agent_image = $photos[array_rand($photos)];
        }

        return view('pages.always_on.campaign_pt',
            [
                'agent_image' => $agent_image,
                'cta_agent_image' => $cta_agent_image
            ]
        );
    }

    // United States LP
    public function us_awareness_page(){

        // dump("test");

        // Fetch reps photos and load a random one on each page load
        $photos =  File::glob('assets/img/reps/*');

        if( !empty($photos) ){

            $agent_image = $photos[array_rand($photos)];
            $cta_agent_image = $photos[array_rand($photos)];
        }

        return view('pages.awareness.lp-us',
            [
                'agent_image' => $agent_image,
                'cta_agent_image' => $cta_agent_image
            ]
        );
    }

    // North America LP
    public function na_performance_page(){

        // Fetch reps photos and load a random one on each page load
        $photos =  File::glob('assets/img/reps/*');

        if( !empty($photos) ){

            $agent_image = $photos[array_rand($photos)];
            $cta_agent_image = $photos[array_rand($photos)];
        }


        // dd($agent_image);


        return view('pages.performance.lp-na-performance',
                        [
                            'agent_image' => $agent_image,
                            'cta_agent_image' => $cta_agent_image
                        ]
                    );
    }

    // United Kingdom Landing Page
    public function uk_landing_page(){

        return view('pages.lp-uk');
    }

    // Thank you page
    public function thank_you_page(){

        return view('pages.thank-you');
    }

    // Thank you page PT
    public function thank_you_page_pt(){

        return view('pages.thank-you-pt');
    }

    // eBook Landing Page
    public function ebook_usa(){

        return view('pages.ebook');

    }

    // eBook Download Thank you page
    public function ebook_thank_you(){

        return view('pages.ebook-thank-you');
    }

    public function country_private_meetings($country){

        // List of countries we're targetting
        $valid_countries = [
            'sa', // Saudi Arabia
            'usa', // USA
            'bra', // Brazil
            'zh', // China
            'idn', // Indonesia
            'ind', // India
            'kor', // South Korea
            'mys', // Malaysia
            'pak', // Pakistan
            'phl', // Philippines
            'sgp', // Singapore
            'twn', // Taiwan
            'vnm'  // Vietnam
        ];

        // Verify if the provided $country abbreviation exists in the array
        if (in_array($country, $valid_countries)) {

            // Set locale
            App::setLocale($country);

        } else {

            // Trigger a 404 error if the country is not found
            abort(404);
        }

        // Fetch Country Images
        $country_flag = File::glob('assets/img/private_meetings/countries/flags/'. $country .'/*');
        $country_pm_image = File::glob('assets/img/private_meetings/countries/country_image/'. $country .'/*');
        $image_not_found = File::glob('assets/img/private_meetings/countries/default/*');

        // Verifying if the image exists
        if( !empty($country_flag) ){
            $country_flag = $country_flag[0];

        // If the image doesn't exist, verify if we have a backup default "Not Found" image
        }elseif ( !empty($image_not_found) ) {

            $country_flag = $image_not_found[0];

        // If there's no backup image, simply send an error string to the frontend
        }else{

            $country_flag = 'No_Country_Flag_Found';
        }

        // Verifying if the image exists
        if( !empty($country_pm_image) ){
            $country_pm_image = $country_pm_image[0];

        // If the image doesn't exist, verify if we have a backup default "Not Found" image
        }elseif ( !empty($image_not_found) ) {

            $country_pm_image = $image_not_found[0];

        // If there's no backup image, simply send an error string to the frontend
        }else{

            $country_pm_image = 'No_Country_Image_Found;';
        }


        /* Treat the information regarding this country's cities private meetings */
        $cities = __('cities');

        // Format the duration for each city
        foreach ($cities as $key => &$city) {
            // Default values for dates if empty
            $startDate = !empty($city['start_date']) ? Carbon::parse($city['start_date']) : null;
            $endDate = !empty($city['end_date']) ? Carbon::parse($city['end_date']) : null;

            if ($startDate && $endDate) {
                // Format the duration
                if ($startDate->isSameDay($endDate)) {
                    // Same day
                    $city['duration'] = $startDate->format('F jS');
                } else {
                    // Different days
                    $startMonth = $startDate->format('F');
                    $endMonth = $endDate->format('F');

                    // Check if start and end months are different
                    if ($startMonth !== $endMonth) {
                        $city['duration'] = $startDate->format('F jS') . ' - ' . $endDate->format('F jS');
                    } else {
                        $city['duration'] = $startDate->format('F jS') . ' - ' . $endDate->format('jS');
                    }
                }
            } else {

                $city['duration'] = __('content.date_to_be_determined');
            }
        }

        // Retrieve the country's image for the private meetings section


        // Reps Photos
        $photos =  File::glob('assets/img/reps/*');

        if( !empty($photos) ){

            $agent_image = $photos[array_rand($photos)];
            $cta_agent_image = $photos[array_rand($photos)];
        }

        return view('pages.private_meetings.index',
            [
                'agent_image' => $agent_image,
                'cta_agent_image' => $cta_agent_image,
                'country_flag'  =>  $country_flag,
                'country_pm_image'  =>  $country_pm_image,
                'country_pm'   =>  $cities
            ]
        );

    }

    // Residency and Citizenship Page Revamp
    public function residency_and_citizenship_page($lang = null)
    {
        // Fetch the form using the model's method
        $form = Multistep_Form::fetchWithQuestionsAndAnswers('residency-by-investment')->toArray();

        // Check if the provided $lang is supported and not English
        if (!is_null($lang) && $lang !== 'en' && check_supported_locale($lang)) {

            App::setLocale($lang);

        } else {

        }

        // Assigning lang to a variable
        $lang = App::getLocale();

        return view('pages.campaigns.residency_and_citizenship',
            [
                'multistep_form' => $form,
                'lang'  =>  $lang,
            ]
        );

    }

    // Greece Golden Visa V2
    public function greece_golden_visa_v2_page($lang = null)
    {
        // Fetch the form using the model's method
        $form = Multistep_Form::fetchWithQuestionsAndAnswers('residency-by-investment')->toArray();

        // Check if the provided $lang is supported and not English
        if (!is_null($lang) && $lang !== 'en' && check_supported_locale($lang)) {

            App::setLocale($lang);

        } else {

        }

        // Assigning lang to a variable
        $lang = App::getLocale();

        return view('pages.campaigns.greece_gv',
            [
                'multistep_form' => $form,
                'lang'  =>  $lang,
            ]
        );

    }

    // Test Multistep form LP
    public function multistep_lp_1(){

        // Fetch the form using the model's method
        $form = Multistep_Form::fetchWithQuestionsAndAnswers('residency-by-investment')->toArray();

        // dump($form);

        return view('pages.multistep-form',
            [
                'multistep_form' => $form,
            ]
        );

    }

}
