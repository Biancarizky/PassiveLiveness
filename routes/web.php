<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\FileUploadController;
use App\Http\Controllers\test\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::post('/upload-unittest', 'App\Http\Controllers\TestFileUpload@unit_test')->name('upload.unittest');
Route::get('/unittest', 'App\Http\Controllers\TestFileUpload@get_unit_test');

Route::get('/token', function () {

    $token = csrf_token();
    return response()->json(['token' => $token]);
    // return csrf_token(); 
});

Route::get('upload', 'App\Http\Controllers\FileUploadController@index');

Route::post('upload', 'App\Http\Controllers\FileUploadController@upload')->name('upload');

Route::group(['prefix' => 'test'], function() use ($router){
    Route::controller(TestController::class)->group(function () {
        Route::post('ocr-extra',             'test_ocr_extra')->name('ocr.extra');
        Route::post('liveness-detection',    'liveness_detection')->name('liveness.detection');
        Route::post('verify-basic',          'verify_basic')->name('verify.basic');
        Route::post('verify-professional',   'verify_professional')->name('verify.professional');
        Route::post('verify-selfie',         'verify_selfie')->name('verify.selfie');
        Route::post('verify-mother',         'verify_mother')->name('verify.mother');

        Route::post('verify-phone',          'verify_phone')->name('verify.phone');
        Route::post('verify-phone-extra',    'verify_phone_extra')->name('verify.phone.extra');
        Route::post('verify-phone-age',      'verify_phone_age')->name('verify.phone.age');

        Route::post('verify-tax-extra',          'verify_tax_extra')->name('verify.tax.extra');
        Route::post('verify-property',    'verify_property')->name('verify.property');
        Route::post('verify-workplace',      'verify_workplace')->name('verify.workplace');
        Route::post('verify-company-shareholder',      'verify_company_shareholder')->name('verify.company.shareholder');
        Route::post('work-address-percentage',      'work_address_percentage')->name('work.address.percentage');

        Route::post('negative-list',      'negative_list')->name('negative.list');
        Route::post('verify-tax-company',      'verify_tax_company')->name('verify.tax.company');
    });
});