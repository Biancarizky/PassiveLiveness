<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class VerifyTaxCompany extends TestCase
{
    use WithoutMiddleware;

    public function test_verifytaxcompany_all_true()
    {
        $data = [
            "trx_id" => "",
            "npwp" => "013084496091000",
            "income" => "1500000000"
        ];

        $respons = $this->post(route('verify.tax.company'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_verifytaxcompany_invalidparameter()
    {
        $data = [
            "trx_id" => "",
            "npwp" => "",
            "income" => "1500000000"
        ];

        $respons = $this->post(route('verify.tax.company'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ['npwp' => "invalid"]
                                ]
                            );
    }
}
