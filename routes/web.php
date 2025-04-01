<?php

use App\Http\Controllers\ChatbotController;
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
Route::get('/residency-and-citizenship/{lang?}', [App\Http\Controllers\LandingPageController::class, 'residency_and_citizenship_page'])->name('residency-and-citizenship');
Route::get('/greece-golden-visa/{lang?}', [App\Http\Controllers\LandingPageController::class, 'greece_golden_visa_v2_page'])->name('greece_gv_campaign');

// Route::get('/residency-and-citizenship', [PageController::class, 'residencyAndCitizenship']);
// Testing the translation feature of Deepl
Route::get('/greece-gv-translations/{lang?}', [PageController::class, 'campaigns_translation_test']);

// Route::get('/residency-and-citizenship', [PageController::class, 'residencyAndCitizenship']);

Route::get('/thank-you', [PageController::class, 'thankYou']);
Route::get('/thank-you-brochure', [PageController::class, 'thankYouBrochure']);

Route::get('/private-meetings/{country}', [App\Http\Controllers\LandingPageController::class, 'country_private_meetings'])->name('country_private_meetings');

// Form Submission
Route::post('/form-submission', [App\Http\Controllers\EnquiriesController::class, 'landing_page_enquiry'])->name('country_private_meetings');
Route::post('/multistep-form-submission', [App\Http\Controllers\EnquiriesController::class, 'multistep_form_enquiry'])->name('multistep_form_enquiry');
Route::post('/download-brochure-submission', [App\Http\Controllers\EnquiriesController::class, 'download_brochure_enquiry'])->name('download_brochure_submission');

// Test Multistep Form LP
Route::get('/quiz/{lang?}', [App\Http\Controllers\LandingPageController::class, 'multistep_lp_1'])->name('test_multistep_lp');


// Route::get('/portugal-golden-visa', function () {
//     return view('pages.campaigns.simon.residency');
// })->name('campaigns.simon.residency');

// Route::get('/rbi-and-cbi', function () {
//     return view('pages.campaigns.simon.rbi-and-cbi');
// })->name('campaigns.simon.rbi-and-cbi');

// Route::get('/greece-golden-visa-program', function () {
//     return view('pages.campaigns.simon.greece-golden-visa-program');
// })->name('campaigns.simon.greece-golden-visa-program');

Route::get('/portugal-golden-visa', [App\Http\Controllers\LandingPageController::class, 'simon_campaigns'])->name('campaigns.simon.simon_pt_gv_lp');
Route::get('/rbi-and-cbi', [App\Http\Controllers\LandingPageController::class, 'simon_campaigns'])->name('campaigns.simon.rbi-and-cbi');
Route::get('/greece-golden-visa-program', [App\Http\Controllers\LandingPageController::class, 'simon_campaigns'])->name('campaigns.simon.greece-golden-visa-program');

Route::get('/greece-gv-by-real-estate', [App\Http\Controllers\LandingPageController::class, 'greece_gv_by_real_estate'])->name('greece-gv-real-estate');


Route::post('/chatbot/message', [ChatbotController::class, 'handleMessage']);
Route::post('/chatbot/filter', [ChatbotController::class, 'handleFilter']);
Route::post('/chatbot/wizard-results', [\App\Http\Controllers\ChatbotController::class, 'wizardResults']);

Route::post('/subscribe-newsletter', [App\Http\Controllers\NewsletterController::class, 'subscribe']);
Route::post('/request-call', [App\Http\Controllers\NewsletterController::class, 'requestCall']);
Route::post('/send-email', [App\Http\Controllers\NewsletterController::class, 'sendEmail']);

Route::post('/chatbot/faqs', [\App\Http\Controllers\ContentController::class, 'handleFaqs']);
Route::post('/chatbot/news', [\App\Http\Controllers\ContentController::class, 'handleNews']);
Route::view('/services', 'services')->name('services.index');
