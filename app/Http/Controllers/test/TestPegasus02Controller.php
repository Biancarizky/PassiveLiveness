<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use GuzzleHttp\Client;
use Log;

class TestPegasus02Controller extends Controller
{

    public function ocr_extra(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $fileTest = $request->file('ktp_image');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/ocr_extra',[
                    "_token"=> "{{ csrf_token() }}",
                    'trx_id' => '01',
                    'ktp_image' => $name,
                ]);
                return $fileUpload->json();
    }

    public function checkid(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $name = $request->input('name');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');
        // $fileTest = $request->file('ktp_image');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/checkid',[
                    "_token"=> "{{ csrf_token() }}",
                    'trx_id' => $trx_id,
                    'nik' => $nik,
                    'name' => $name,
                    'birthdate' => $birthdate,
                    'birthplace' => $birthplace,
                ]);
                return $fileUpload->json();
    }

    public function basicid(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $name = $request->input('name');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');
        // $fileTest = $request->file('ktp_image');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/basicid',[
                    "_token"=> "{{ csrf_token() }}",
                    'trx_id' => $trx_id,
                    'nik' => $nik,
                    'name' => $name,
                    'birthdate' => $birthdate,
                    'birthplace' => $birthplace,
                ]);
                return $fileUpload->json();
    }

    public function selfie_checkid(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $nama = $request->input('name');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');
        $fileTest = $request->file('selfie_photo');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/selfie_checkid',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nik" => $nik,
                    "name" => $nama,
                    "birthdate" => $birthdate,
                    "birthplace" => $birthplace,
                    "selfie_photo" => $name
                ]);
                return $fileUpload->json();
    }

    public function completeid_autofix(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $nama = $request->input('name');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');
        $fileTest = $request->file('selfie_photo');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/completeid_autofix',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nik" => $nik,
                    "name" => $nama,
                    "birthdate" => $birthdate,
                    "birthplace" => $birthplace,
                    "selfie_photo" => $name
                ]);
                return $fileUpload->json();
    }

    public function face_match(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $fileTest = $request->file('selfie_photo');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/face_match',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nik" => $nik,
                    "selfie_photo" => $name
                ]);
                return $fileUpload->json();
    }

    public function face_match_autofix(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $fileTest = $request->file('selfie_photo');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/face_match_autofix',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nik" => $nik,
                    "selfie_photo" => $name
                ]);
                return $fileUpload->json();
    }

    public function auto_face_crop(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $fileTest = $request->file('image');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/auto_face_crop',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "image" => $name
                ]);
                return $fileUpload->json();
    }

    public function ibu(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $mother_name = $request->input('mother_name');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/ibu',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nik" => $nik,
                    "mother_name" => $mother_name,
                ]);
                return $fileUpload->json();
    }

    public function telepon(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $phone = $request->input('phone');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/telepon',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nik" => $nik,
                    "phone" => $phone,
                ]);
                return $fileUpload->json();
    }

    public function telepon_total(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $phone = $request->input('phone');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/telepon_total',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nik" => $nik,
                    "phone" => $phone,
                ]);
                return $fileUpload->json();
    }

    public function telepon_durasi(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $phone = $request->input('phone');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/telepon_durasi',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nik" => $nik,
                    "phone" => $phone,
                ]);
                return $fileUpload->json();
    }

    public function pendapatan_nik(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $income = $request->input('income');
        $name = $request->input('name');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/pendapatan_nik',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nik" => $nik,
                    "income" => $income,
                    "name" => $name,
                    "birthdate" => $birthdate,
                    "birthplace" => $birthplace
                ]);
                return $fileUpload->json();
    }

    public function pendapatan(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $npwp = $request->input('npwp');
        $nik = $request->input('nik');
        $income = $request->input('income');
        $name = $request->input('name');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/pendapatan',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "npwp" => $npwp,
                    "nik" => $nik,
                    "income" => $income,
                    "name" => $name,
                    "birthdate" => $birthdate,
                    "birthplace" => $birthplace
                ]);
                return $fileUpload->json();
    }

    public function pendapatan_perseroan(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $npwp = $request->input('npwp');
        $income = $request->input('income');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/pendapatan_perseroan',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "npwp" => $npwp,
                    "income" => $income,
                ]);
                return $fileUpload->json();
    }

    public function properti(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nop = $request->input('nop');
        $property_name = $request->input('property_name');
        $property_building_area = $request->input('property_building_area');
        $property_surface_area = $request->input('property_surface_area');
        $property_estimation = $request->input('property_estimation');
        $nik = $request->input('nik');
        $certificate_id = $request->input('certificate_id');
        $certificate_name = $request->input('certificate_name');
        $certificate_type = $request->input('certificate_type');
        $certificate_date = $request->input('certificate_date');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/properti',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nop" => $nop,
                    "property_name" => $property_name,
                    "property_building_area" => $property_building_area,
                    "property_surface_area" => $property_surface_area,
                    "property_estimation" => $property_estimation,
                    "nik" => $nik,
                    "certificate_id" => $certificate_id,
                    "certificate_name" => $certificate_name,
                    "certificate_type" => $certificate_type,
                    "certificate_date" => $certificate_date,
                ]);
                return $fileUpload->json();
    }

    public function tempat_kerja(Request $request)
    {
        $nik = $request->input('nik');
        $name = $request->input('name');
        $company_name = $request->input('company_name');
        $company_phone = $request->input('company_phone');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/tempat_kerja',[
                    "_token"=> "{{ csrf_token() }}",
                    "nik" => $nik,
                    "name" => $name,
                    "company_name" => $company_name,
                    "company_phone" => $company_phone,
                ]);
                return $fileUpload->json();
    }

    public function shareholder(Request $request)
    {
        $npwp_company = $request->input('npwp_company');
        $company_name = $request->input('company_name');
        $nik_share_holder = $request->input('nik_share_holder');
        $company_phone = $request->input('company_phone');
        $name_share_holder = $request->input('name_share_holder');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/shareholder',[
                    "_token"=> "{{ csrf_token() }}",
                    "npwp_company" => $npwp_company,
                    "company_name" => $company_name,
                    "nik_share_holder" => $nik_share_holder,
                    "company_phone" => $company_phone,
                    "name_share_holder" => $name_share_holder,
                ]);
                return $fileUpload->json();
    }

    public function alamat_rumah_percentage(Request $request)
    {
        $phone = $request->input('phone');
        $address = $request->input('address');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/alamat_rumah_percentage',[
                    "_token"=> "{{ csrf_token() }}",
                    "phone" => $phone,
                    "address" => $address,
                ]);
                return $fileUpload->json();
    }

    public function alamat_kantor_percentage(Request $request)
    {
        $phone = $request->input('phone');
        $address = $request->input('address');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/alamat_kantor_percentage',[
                    "_token"=> "{{ csrf_token() }}",
                    "phone" => $phone,
                    "address" => $address,
                ]);
                return $fileUpload->json();
    }

    public function negative_list(Request $request)
    {
        $nik = $request->input('nik');
        $name = $request->input('name');
        $pob = $request->input('pob');
        $dob = $request->input('dob');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        // $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/negative_list',[
                    "_token"=> "{{ csrf_token() }}",
                    "nik" => $nik,
                    "name" => $name,
                    "pob" => $pob,
                    "dob" => $dob,
                ]);
                return $fileUpload->json();
    }

    public function completeid(Request $request)
    {
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $name = $request->input('name');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');
        $address = $request->input('address');
        $selfie_photo = $request->file('selfie_photo');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        $name = $selfie_photo == null ? "sds" : base64_encode(file_get_contents($selfie_photo));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/completeid',[
                    "_token"=> "{{ csrf_token() }}",
                    "trx_id" => $trx_id,
                    "nik" => $nik,
                    "name" => $name,
                    "birthdate" => $birthdate,
                    "birthplace" => $birthplace,
                    "address" => $address,
                    "selfie_photo" => $name,
                ]);
                return $fileUpload->json();
    }
}
