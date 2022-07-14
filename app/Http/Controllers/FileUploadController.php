<?php

namespace App\Http\Controllers;

use App\Model\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class FileUploadController extends Controller
{
    public function getAllPost(){
        $response = Http::get('https://api.stag.olive.onl/request');
        return $response->json();
    }
    
    // show form
    public function index() {
        return view('upload');
    }

    // file upload
    public function upload(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'files' => 'required'
        ])->validate();

        $total_files = count($request->file('files'));

        foreach ($request->file('files') as $file) {
            //ddd($request);
            //$name = base64_encode(file_get_contents($request->file('image')));
            $filename = $file->getClientOriginalName();
            $path = public_path() . '/uploads';
            $file->move($path,$filename);

            $fileUpload = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'multipart/form-data',  
                'apikey' => 'LprlAzZnflLXxYCLxI0bHOwAxIspX6ci',
            ])->post('https://api.stag.olive.onl/request',[
                
                'photo' => $filename,
            ]);

        // ddd($filename);

            return $fileUpload->json();
        }

        return back()->with("success", $total_files . " files uploaded successfully");
    }
}
