<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class OcrExtraTest extends TestCase
{
    use WithoutMiddleware;
    
    public function test_ocrextra_all_true()
    {
        $data = [
            'files' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\ocr_extra.jpg'), 'public/test-files/ocr_extra.jpg', null, null, true),
            'trx_id' => "01",
        ];

        $respons = $this->post(route('ocr.extra'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'message' => "SUCCESS"    
                                ]
                            );
    }

    public function test_ocrextra_no_files_invalidparameter()
    {
        $data = [
            'files' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\coba.jpg'), 'public/test-files/coba.jpg', null, null, true),
            'trx_id' => "01",
        ];

        $respons = $this->post(route('ocr.extra'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'message' => "SUCCESS"    
                                ]
                            );
    }

    public function test_ocrextra_1001_invalidparameter()
    {
        $data = [
            'files' => "",
            'trx_id' => "01",
        ];

        $respons = $this->post(route('ocr.extra'), $data);
        $respons->assertJson(
                                [
                                    'status' => 1001, 
                                    'message' => "invalid parameter"    
                                ]
                            );
    }
}
