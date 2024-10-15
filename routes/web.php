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



Route::get('/greece-golden-visa', [PageController::class, 'campaigns']);

Route::get('/residency-and-citizenship', [PageController::class, 'residencyAndCitizenship']);
Route::get('/thank-you', [PageController::class, 'thankYou']);

Route::get('/private-meetings/{country}', [App\Http\Controllers\LandingPageController::class, 'country_private_meetings'])->name('country_private_meetings');

// Form Submission
Route::post('/form-submission', [App\Http\Controllers\EnquiriesController::class, 'landing_page_enquiry'])->name('country_private_meetings');
