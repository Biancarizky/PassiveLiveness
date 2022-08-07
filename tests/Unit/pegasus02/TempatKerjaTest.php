<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class TempatKerjaTest extends TestCase
{
    use WithoutMiddleware;

    public function test_properti_all_true()
    {
        $data = [
            "nik" => "3321042108830002",
            "name" => "HARYANTO",
            "company_name"=> "SDM PKH KEMENTERIAN SOSIAL PROVINSI JAWA TENGAH",
            "company_phone" => "3103591"
        ];

        $respons = $this->post(route('tempat.kerja'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_properti_invalidparameter()
    {
        $data = [
            "nik" => "",
            "name" => "HARYANTO",
            "company_name"=> "SDM PKH KEMENTERIAN SOSIAL PROVINSI JAWA TENGAH",
            "company_phone" => "3103591"
        ];

        $respons = $this->post(route('tempat.kerja'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["nik" => "invalid"]
                                ]
                            );
    }
}
