<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EditorController extends Controller
{
    public function index()
    {
        return view('editor');
    }

    public function store(Request $request)
    {
        $htmlContent = $request->input('gjs-html');
        $cssContent = $request->input('gjs-css');

        // Save HTML and CSS to a file or database
        File::put(public_path('storage/page.html'), $htmlContent);
        File::put(public_path('storage/page.css'), $cssContent);

        return response()->json(['status' => 'success']);
    }

    public function load()
    {
        $html = File::exists(public_path('storage/page.html')) ? File::get(public_path('storage/page.html')) : '';
        $css = File::exists(public_path('storage/page.css')) ? File::get(public_path('storage/page.css')) : '';

        return response()->json([
            'gjs-html' => $html,
            'gjs-css' => $css,
        ]);
    }
}
