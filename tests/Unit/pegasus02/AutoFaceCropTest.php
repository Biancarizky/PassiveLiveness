<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class AutoFaceCropTest extends TestCase
{
    use WithoutMiddleware;

    public function test_autofacecrop_all_true()
    {
        $data = [
            "trx_id" => "completeidautofix01",
            "image" => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\crop.jpg'), 'public/test-files/crop.jpg', null, null, true),
                    
        ];

        $respons = $this->post(route('auto.face.crop'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null    
                                ]
                            );
    }

    public function test_autofacecrop_invalidparameter()
    {
        $data = [
            "trx_id" => "completeidautofix01",
            "image" => "",
                    
        ];

        $respons = $this->post(route('auto.face.crop'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["cropped_image" => "invalid"]   
                                ]
                            );
    }
}
