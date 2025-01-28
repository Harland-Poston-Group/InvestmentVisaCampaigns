<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function residencyAndCitizenship()
    {
        return view('pages.residency-and-citizenship');
    }
    public function residencyAndCitizenshipTwo()
    {
        return view('pages.residency-and-citizenship-2');
    }
    public function thankYou()
    {
        return view('pages.thank-you');
    }

    public function campaigns()
    {
        return view('pages.campaigns.greece');
    }

    // Greece GV Page Revamp
    public function greece_gv_page()
    {

        return view('pages.campaigns.greece_gv');

    }

    public function campaigns_translation_test($lang = null)
    {

        // Check if the provided $lang is supported and not English
        if (!is_null($lang) && $lang !== 'en' && check_supported_locale($lang)) {

            App::setLocale($lang);

        } else {

        }

        // Assigning lang to a variable
        $lang = App::getLocale();

        return view('pages.campaigns.translations_test', ['lang' => $lang]);
    }


}
