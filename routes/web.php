<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\EditorController;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\PageController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/run-npm-prod', function () {
//     Artisan::call('npm:run-prod');
//     return Artisan::output();
// });


Route::get('/editor', [EditorController::class, 'index'])->name('editor');
Route::post('/editor/store', [EditorController::class, 'store'])->name('editor.store');
Route::get('/editor/load', [EditorController::class, 'load'])->name('editor.load');

Route::get('/page', function () {
    $html = File::get(public_path('storage/page.html'));
    $css = File::get(public_path('storage/page.css'));

    return view('page', compact('html', 'css'));
});



// Route::get('/greece-golden-visa', [PageController::class, 'campaigns']);

// NEW GREECE GV PAGE
// Route::get('/greece-golden-visa-revamp', [App\Http\Controllers\LandingPageController::class, 'greece_gv_page']);
Route::get('/residency-and-citizenship', [App\Http\Controllers\LandingPageController::class, 'residency_and_citizenship_page']);
Route::get('/greece-golden-visa', [App\Http\Controllers\LandingPageController::class, 'greece_golden_visa_v2_page']);

// Route::get('/residency-and-citizenship', [PageController::class, 'residencyAndCitizenship']);
// Testing the translation feature of Deepl
Route::get('/greece-gv-translations/{lang?}', [PageController::class, 'campaigns_translation_test']);

// Route::get('/residency-and-citizenship', [PageController::class, 'residencyAndCitizenship']);

Route::get('/thank-you', [PageController::class, 'thankYou']);

Route::get('/private-meetings/{country}', [App\Http\Controllers\LandingPageController::class, 'country_private_meetings'])->name('country_private_meetings');

// Form Submission
Route::post('/form-submission', [App\Http\Controllers\EnquiriesController::class, 'landing_page_enquiry'])->name('country_private_meetings');
Route::post('/multistep-form-submission', [App\Http\Controllers\EnquiriesController::class, 'multistep_form_enquiry'])->name('multistep_form_enquiry');

// Test Multistep Form LP
Route::get('/quiz', [App\Http\Controllers\LandingPageController::class, 'multistep_lp_1'])->name('test_multistep_lp');

