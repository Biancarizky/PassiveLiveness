<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use GuzzleHttp\Client;
use Log;

class TestController extends Controller
{
    
    public function test_ocr_extra(Request $request)
    {
        $fileTest = $request->file('files');
        $trx_id = $request->input('trx_id');
        // if($fileTest == null){
        //     $name = base64_encode(file_get_contents($fileTest));
        // }
        
        $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/ocr_identity',[
                    "_token"=> "{{ csrf_token() }}",
                    'trx_id' => '01',
                    'ktp_image' => $name,
                ]);
                return $fileUpload->json();
    }

    public function liveness_detection(Request $request){
        $fileTest = $request->file('file');
        $gestures_set = $request->input('gestures_set');
        // return $this->respondWithToken($token);

        return $this->handle($gestures_set, $fileTest);
    }

    public static function handle($gesturesSet, $images)
    {
        $livenessData = [
            [
                'name'     => 'gestures_set',
                'contents' => $gesturesSet
            ]
        ];

        $no = 1;

        foreach ( $images as $image )
        {
            $livenessData[] = [
                'name'     => 'file',
                'contents' => fopen($image, 'r'),
                'filename' => $no . '.jpg'
            ];

            $no++;
        }

        $client = new Client;

        $params = [
            'verify' => false,
            'debug' => false,
            'timeout' => 30,
            'headers' => [
                'Accept' => 'application/json',
                // 'Content-Type' => 'image/png',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ],
            'multipart' => $livenessData
        ];

        try
        {
            $client = $client->request('POST', "https://api.digidata.ai/cp_digidata/liveness_detection", $params);

            $response = json_decode($client->getBody(), TRUE);

            return [
                'status' => true,
                'response' => $response
            ];
        }
        catch ( \Exception $e )
        {
            Log::error(__METHOD__ . ': '. $e->getMessage());

            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }



















    
    public function verify_basic(Request $request){
        $trx_id = $request->input('trx_id');
        $nik = $request->input('nik');
        $name = $request->input('name');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/verify_basic',[
                "_token"=> "{{ csrf_token() }}",
                'trx_id' => '01',
                'nik' => $nik,
                'name' => $name,
                'birthdate' => $birthdate,
                'birthplace' => $birthplace,
                
            ]);
            return $fileUpload->json();

    }

    public function verify_professional(Request $request){
        $nik = $request->input('nik');
        $namee = $request->input('name');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');

        $fileTest = $request->file('files');
        
        $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));
        // echo $name;
            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/verify_professional',[
                    "_token"=> "{{ csrf_token() }}",
                    'trx_id' => '01',
                    'nik' => $nik,
                    'name' => $namee,
                    'birthdate' => $birthdate,
                    'birthplace' => $birthplace,
                    'selfie_photo' => $name,
                ]);
                return $fileUpload->json();
    }

    public function verify_selfie(Request $request){
        $nik = $request->input('nik');

        $fileTest = $request->file('files');
        
        $name = $fileTest == null ? "sds" : base64_encode(file_get_contents($fileTest));
        // echo $name;
            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/verify_selfie',[
                    "_token"=> "{{ csrf_token() }}",
                    'trx_id' => '01',
                    'nik' => $nik,
                    'selfie_photo' => $name,
                ]);
                return $fileUpload->json();
    }

    public function verify_mother(Request $request){
        $nik = $request->input('nik');
        $mother_name = $request->input('mother_name');


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/verify_mother',[
                "_token"=> "{{ csrf_token() }}",
                'trx_id' => '01',
                'nik' => $nik,
                'mother_name' => $mother_name,
                
            ]);
            return $fileUpload->json();
    }

    public function verify_phone(Request $request){
        $nik = $request->input('nik');
        $phone = $request->input('phone');


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/verify_phone',[
                "_token"=> "{{ csrf_token() }}",
                'trx_id' => '01',
                'nik' => $nik,
                'phone' => $phone,
                
            ]);
            return $fileUpload->json();
    }

    public function verify_phone_extra(Request $request){
        $nik = $request->input('nik');
        $phone = $request->input('phone');


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/verify_phone_extra',[
                "_token"=> "{{ csrf_token() }}",
                'trx_id' => '01',
                'nik' => $nik,
                'phone' => $phone,
                
            ]);
            return $fileUpload->json();
    }

    public function verify_phone_age(Request $request){
        $nik = $request->input('nik');
        $phone = $request->input('phone');


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/verify_phone_age',[
                "_token"=> "{{ csrf_token() }}",
                'trx_id' => '01',
                'nik' => $nik,
                'phone' => $phone,
                
            ]);
            return $fileUpload->json();
    }

    public function verify_tax_extra(Request $request){
        $npwp = $request->input('npwp');
        $nik = $request->input('nik');
        $income = $request->input('income');

        $name = $request->input('name');
        $birthdate = $request->input('birthdate');
        $birthplace = $request->input('birthplace');


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/verify_tax_extra',[
                "_token"=> "{{ csrf_token() }}",
                "trx_id"        => "1234567890",
                "npwp"          => $npwp,
                "nik"           => $nik,
                "income"        => $income,
                "name"          => $name,
                "birthdate"     => $birthdate,
                "birthplace"    => $birthplace
            ]);
            return $fileUpload->json();
    }

    public function verify_property(Request $request){
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


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/verify_property',[
                "_token"=> "{{ csrf_token() }}",

                "trx_id"=> "",
                "nop"=> $nop,
                "property_name"=> $property_name,
                "property_building_area"=> $property_building_area,
                "property_surface_area"=> $property_surface_area,
                "property_estimation"=> $property_estimation,
                "nik"=> $nik,
                "certificate_id"=> $certificate_id,
                "certificate_name"=> $certificate_name,
                "certificate_type"=> $certificate_type,
                "certificate_date"=> $certificate_date

               
            ]);
            return $fileUpload->json();
    }

    public function verify_workplace(Request $request){
        $nik = $request->input('nik');
        $name = $request->input('name');
        $company_name = $request->input('company_name');
        $company_phone = $request->input('company_phone');


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/verify_workplace',[
                "_token"=> "{{ csrf_token() }}",

                "nik"           => $nik,
                "name"          => $name,
                "company_name"  => $company_name,
                "company_phone" => $company_phone

               
            ]);
            return $fileUpload->json();
    }

    public function verify_company_shareholder(Request $request){
        $npwp_company = $request->input('npwp_company');
        $company_name = $request->input('company_name');
        $nik_share_holder = $request->input('nik_share_holder');
        $name_share_holder = $request->input('name_share_holder');


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/verify_company_shareholder',[
                "_token"=> "{{ csrf_token() }}",

                "trx_id" => "",
                "npwp_company" => $npwp_company,
                "company_name" => $company_name,
                "nik_share_holder" => $nik_share_holder,
                "name_share_holder" => $name_share_holder

               
            ]);
            return $fileUpload->json();
    }

    public function work_address_percentage(Request $request){
        $trx_id = $request->input('trx_id');
        $phone = $request->input('phone');
        $address = $request->input('address');


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/work_address_percentage',[
                "_token"=> "{{ csrf_token() }}",

                "trx_id" => $trx_id,
                "phone" => $phone,
                "address" => $address

               
            ]);
            return $fileUpload->json();
    }

    public function negative_list(Request $request){
        $nik = $request->input('nik');
        $name = $request->input('name');
        $pob = $request->input('pob');
        $dob = $request->input('dob');


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
                "dob" => $dob

               
            ]);
            return $fileUpload->json();
    }

    public function verify_tax_company(Request $request){
        $trx_id = $request->input('trx_id');
        $npwp = $request->input('npwp');
        $income = $request->input('income');


        $fileUpload = Http::withHeaders([
            'Accept' => 'application/json',
            // 'Content-Type' => 'multipart/form-data',  
            // 'X-CSRF-TOKEN' => csrf_token(),  
            'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
            ])->post('https://api.digidata.ai/cp_digidata/verify_tax_company',[
                "_token"=> "{{ csrf_token() }}",

                "trx_id"    => $trx_id,
                "npwp"      => $npwp,
                "income"    => $income

               
            ]);
            return $fileUpload->json();
    }
}
