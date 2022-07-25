<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class VerifyWorkplaceTest extends TestCase
{
    use WithoutMiddleware;

    public function test_test_verify_workplace_data_filled_true()
    {
        $data = [
            
            "nik"=> "3321042108830002",
            "name"=> "HARYANTO",
            "company_name"=> "SDM PKH KEMENTERIAN SOSIAL PROVINSI JAWA TENGAH",
            "company_phone"=> "3103591"
            
            
        ];

        $respons = $this->post(route('verify.workplace'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null,
                                ]
                            );

    }
}
