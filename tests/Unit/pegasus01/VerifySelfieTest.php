<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class VerifySelfieTest extends TestCase
{
    use WithoutMiddleware;

    public function test_verifyselfie_all_true()
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

    public function test_verifyselfie_invalidparameter()
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
