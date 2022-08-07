<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class FaceMatchTest extends TestCase
{
    use WithoutMiddleware;

    public function test_facematch_all_true()
    {
        $data = [
            "trx_id" => "completeidautofix01",
            "nik" => "3175044109890002",
            "selfie_photo" => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\selfi.jpg'), 'public/test-files/selfi.jpg', null, null, true),
                    
        ];

        $respons = $this->post(route('face.match'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null    
                                ]
                            );
    }

    public function test_facematch_invalidparameter()
    {
        $data = [
            "trx_id" => "completeidautofix01",
            "nik" => "",
            "selfie_photo" => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\selfi.jpg'), 'public/test-files/selfi.jpg', null, null, true),
                    
        ];

        $respons = $this->post(route('face.match'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["nik" => "invalid"]  
                                ]
                            );
    }

}
