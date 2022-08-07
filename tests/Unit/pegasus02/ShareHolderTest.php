<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class ShareHolderTest extends TestCase
{
    use WithoutMiddleware;

    public function test_shareholder_all_true()
    {
        $data = [
            "trx_id"=> "",
            "npwp_company"=> "312766942514000",
            "company_name"=> "ANAS PUTRA PERKASA",
            "nik_share_holder"=> "3316102609930001",
            "name_share_holder"=> "AHMAD FILTER ANAS"
        ];

        $respons = $this->post(route('shareholder'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_shareholder_invalidparameter()
    {
        $data = [
            "trx_id"=> "",
            "npwp_company"=> "",
            "company_name"=> "ANAS PUTRA PERKASA",
            "nik_share_holder"=> "3316102609930001",
            "name_share_holder"=> "AHMAD FILTER ANAS"
        ];

        $respons = $this->post(route('shareholder'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["npwp_company" => "invalid"]
                                ]
                            );
    }
}
