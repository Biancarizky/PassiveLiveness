<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithoutMiddleware;
class TestFileUpload extends Controller
{
  
    public function get_unit_test(){
        echo csrf_token();
    }
    public function unit_test(Request $request)
    {
        $fileTest = $request->file('files');
        $trx_id = $request->input('trx_id');

        if($trx_id == null && $fileTest == null){
            $field = "photo dan trx_id";
        }elseif($fileTest == null){
            $field = 'photo';
        }elseif($trx_id == null){
            $field = "trx_id";
        }

        $messageValue = [];
        $timestamp = Carbon::now()->toDateTimeString();;
        $dataValue = [];

        if(!empty($field)){
            $messageValue = [
                "field"     => $field,
                "message"   => "invalid"
            ];

            $dataValue = [
                "passed"    => $field,
                "score"     => "invalid"
            ];
            
            $fileUpload = [
                'timestamp' => $timestamp,
                'status' => '1001',
                'message' => 'invalid parameter',
                'info' => $messageValue,
                'data' => $dataValue,
                'trx_id' => $trx_id,
            ];
            return json_encode($fileUpload);
        }else{
            // echo "semua terisi";
            $name = base64_encode(file_get_contents($fileTest));
                
            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Content-Type' => 'multipart/form-data',  
                // 'X-CSRF-TOKEN' => csrf_token(),  
                'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                ])->post('https://api.digidata.ai/cp_digidata/passive_liveness',[
                    "_token"=> "{{ csrf_token() }}",
                    'trx_id' => '01',
                    'photo' => $name,
                ]);
                return $fileUpload->json();
               
        }

        

    }

    public function unittestts(Request $request)
    {
        // echo $request->input('id');
        $fileTest = $request->file('files');
        $trx_id = $request->input('trx_id');
        $messageValue = [];
        $timestamp = Carbon::now()->toDateTimeString();;
        $dataValue = [];
            if(empty($fileTest) || empty($trx_id)){
                if(empty($fileTest) && empty($trx_id)){
                    $field = 'photo and trx_id';
                }elseif((empty($trx_id))){
                    $field = ' trx_id';
                }else{
                    $field = 'photo';
                }
                
                $messageValue = [
                    "field"     => $field,
                    "message"   => "invalid"
                ];

                $dataValue = [
                    "passed"    => $field,
                    "score"     => "invalid"
                ];

                $fileUpload = [
                    'timestamp' => $timestamp,
                    'status' => '1001',
                    'message' => 'invalid parameter',
                    'info' => $messageValue,
                    'data' => $dataValue,
                    'trx_id' => $trx_id,
                ];

                return response()->json([$fileUpload
                ]);
            }else{

                $name = base64_encode(file_get_contents($fileTest));
                
                
                $fileUpload = Http::withHeaders([
                    'Accept' => 'application/json',
                    // 'Content-Type' => 'multipart/form-data',  
                    'X-CSRF-TOKEN' => "{{ csrf_token() }}",  
                    'Token' => 'ZDIwYmUxMDEtYjcxNi00OGE0LWI3MDUtMzdjZTAzYThkMzFk',
                    ])->post('https://api.digidata.ai/cp_digidata/passive_liveness',[
                        "_token"=> "{{ csrf_token() }}",
                        'trx_id' => '01',
                        'photo' => $name,
                    ]);
                    
                    return $fileUpload->json();
            }
                    // }
    }
}

 