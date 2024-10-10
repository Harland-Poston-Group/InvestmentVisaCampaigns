<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function residencyAndCitizenship()
    {
        return view('pages.residency-and-citizenship');
    }

    public function thankYou()
    {
        return view('pages.thank-you');
    }

    public function campaigns()
    {
        return view('pages.campaigns.greece');
    }


}
