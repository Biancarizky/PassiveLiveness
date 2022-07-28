<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class CompanyShareholderTest extends TestCase
{
    use WithoutMiddleware;

    public function test_companyshareholder_all_true()
    {
        $data = [
            "trx_id" => "",
            "npwp_company" => "312766942514000",
            "company_name" => "ANAS PUTRA PERKASA",
            "nik_share_holder" => "3316102609930001",
            "name_share_holder" => "AHMAD FILTER ANAS"
        ];

        $respons = $this->post(route('verify.company.shareholder'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    
}
