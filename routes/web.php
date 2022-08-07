<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\FileUploadController;
use App\Http\Controllers\test\TestController;
use App\Http\Controllers\test\TestPegasus02Controller;

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

Route::group(['prefix' => 'test-02'], function() use ($router){
    Route::controller(TestPegasus02Controller::class)->group(function () {
        Route::post('ocr-extra',             'ocr_extra')->name('ocr.extra.02');
        Route::post('checkid',             'checkid')->name('checkid');
        Route::post('basicid',             'basicid')->name('basicid');
        Route::post('selfie-checkid',             'selfie_checkid')->name('selfie.checkid');
        Route::post('completeid',             'completeid')->name('completeid');
        Route::post('completeid-autofix',             'completeid_autofix')->name('completeid.autofix');
        Route::post('face-match',             'face_match')->name('face.match');
        Route::post('face-match-autofix',             'face_match_autofix')->name('face.match.autofix');
        Route::post('auto-face-crop',             'auto_face_crop')->name('auto.face.crop');
        Route::post('ibu',             'ibu')->name('ibu');
        Route::post('telepon',             'telepon')->name('telepon');
        Route::post('telepon-total',             'telepon_total')->name('telepon.total');
        Route::post('telepon-durasi',             'telepon_durasi')->name('telepon.durasi');
        Route::post('pendapatan-nik',             'pendapatan_nik')->name('pendapatan.nik');
        Route::post('pendapatan',             'pendapatan')->name('pendapatan');
        Route::post('pendapatan-perseroan',             'pendapatan_perseroan')->name('pendapatan.perseroan');
        Route::post('properti',             'properti')->name('properti');
        Route::post('tempat-kerja',             'tempat_kerja')->name('tempat.kerja');
        Route::post('shareholder',             'shareholder')->name('shareholder');
        Route::post('alamat-rumah-percentage',             'alamat_rumah_percentage')->name('alamat.rumah.percentage');
        Route::post('alamat-kantor-percentage',             'alamat_kantor_percentage')->name('alamat.kantor.percentage');
        Route::post('negative-list',             'negative_list')->name('negative.list02');
    });
});




















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
        Route::post('verify-income',      'verify_income')->name('verify.income');
        Route::post('home-address-percentage',      'home_address_percentage')->name('home.address.percentage');
    });
});