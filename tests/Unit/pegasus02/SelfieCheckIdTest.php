<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class SelfieCheckIdTest extends TestCase
{
    use WithoutMiddleware;

    public function test_selfiecheckd_all_true()
    {
        $data = [
            "trx_id" => "completeidautofix01",
            "nik" => "c40f89ba9d12b0c7ee733c378251b94c",
            "name" => "JELITA SEPTRIASA",
            "birthdate" => "01-09-1989",
            "birthplace" => "JAKARTA",
            "selfie_photo" => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\selfi.jpg'), 'public/test-files/selfi.jpg', null, null, true),
                    
        ];

        $respons = $this->post(route('selfie.checkid'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null    
                                ]
                            );
    }

    public function test_selfiecheckd_invalidparameter()
    {
        $data = [
            "trx_id" => "completeidautofix01",
            "nik" => "",
            "name" => "JELITA SEPTRIASA",
            "birthdate" => "01-09-1989",
            "birthplace" => "JAKARTA",
            "selfie_photo" => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\selfi.jpg'), 'public/test-files/selfi.jpg', null, null, true),
                    
        ];

        $respons = $this->post(route('selfie.checkid'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["nik" => "invalid"]   
                                ]
                            );
    }
}
