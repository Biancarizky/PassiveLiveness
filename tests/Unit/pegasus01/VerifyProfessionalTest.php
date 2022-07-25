<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class VerifyProfessionalTest extends TestCase
{
    use WithoutMiddleware;

    public function test_verify_professional_true()
    {
        $data = [
            'trx_id' => "01",
            'nik' => "7306082908960009",
            'name' => "KURNIAWAN",
            'birthdate' => "29-08-1996",
            'birthplace' => "MAKASSAR",
            'files' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\verify_professional.jpeg'), 'public/test-files/verify_professional.jpeg', null, null, true),
        ];

        $respons = $this->post(route('verify.professional'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200,  
                                    'errors' => null
                                ]
                            );
    }

    public function test_verify_professional_not_nik()
    {
        $data = [
            'trx_id' => "01",
            'nik' => "",
            'name' => "KURNIAWAN",
            'birthdate' => "29-08-1996",
            'birthplace' => "MAKASSAR",
            'files' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\verify_professional.jpeg'), 'public/test-files/verify_professional.jpeg', null, null, true),
        ];

        $respons = $this->post(route('verify.professional'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200,  
                                    'errors' => ['nik' => "invalid"]
                                ]
                            );
    }


}
