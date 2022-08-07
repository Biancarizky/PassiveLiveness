<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class OcrExtraTest extends TestCase
{
    use WithoutMiddleware;

    public function test_ocrextra_all_true()
    {
        $data = [
            'ktp_image' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\ocr_extra.jpg'), 'public/test-files/ocr_extra.jpg', null, null, true),
            'trx_id' => "01",
        ];

        $respons = $this->post(route('ocr.extra.02'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null    
                                ]
                            );
    }

    public function test_ocrextra_no_files_invalidparameter()
    {
        $data = [
            'ktp_image' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\coba.jpg'), 'public/test-files/coba.jpg', null, null, true),
            'trx_id' => "01",
        ];

        $respons = $this->post(route('ocr.extra.02'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'data' => ['nik' => '']   
                                ]
                            );
    }

    // public function test_ocrextra_1001_invalidparameter()
    // {
    //     $data = [
    //         'files' => "",
    //         'trx_id' => "01",
    //     ];

    //     $respons = $this->post(route('ocr.extra'), $data);
    //     $respons->assertJson(
    //                             [
    //                                 'status' => 1001, 
    //                                 'message' => "invalid parameter"    
    //                             ]
    //                         );
    // }
}
