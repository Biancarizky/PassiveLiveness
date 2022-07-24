<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class TestVerifySelfie extends TestCase
{
    use WithoutMiddleware;

    public function test_verify_selfie_true()
    {
        $data = [
            'trx_id' => "01",
            'nik' => "7306082908960009",
            'files' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\verify_professional.jpeg'), 'public/test-files/verify_professional.jpeg', null, null, true),
        ];

        $respons = $this->post(route('verify.selfie'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200,  
                                    'errors' => null
                                ]
                            );
    }

    public function test_verify_selfie_no_nik_true()
    {
        $data = [
            'trx_id' => "01",
            'nik' => "",
            'files' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\verify_professional.jpeg'), 'public/test-files/verify_professional.jpeg', null, null, true),
        ];

        $respons = $this->post(route('verify.selfie'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200,  
                                    'errors' => ['nik' => "invalid"]
                                ]
                            );
    }
}
