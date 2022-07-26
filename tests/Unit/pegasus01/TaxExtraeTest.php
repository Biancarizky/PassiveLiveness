<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class TaxExtraeTest extends TestCase
{
    use WithoutMiddleware;

    public function test_test_tax_extrae_data_filled_true()
    {
        $data = [
            
                "trx_id"    =>"1234567890",
                "npwp"      => "261082911426000",
                "nik"       => "6371045005870008",
                "income"    => 1,
                "name"      => "usup suparta",
                "birthdate" => "28-04-1996",
                "birthplace"=> "bogor"
        ];

        $respons = $this->post(route('verify.tax.extra'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null,
                                ]
                            );

    }
}
