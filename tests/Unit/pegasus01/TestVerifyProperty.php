<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class TestVerifyProperty extends TestCase
{
    use WithoutMiddleware;

    public function test_test_tax_extrae_data_filled_true()
    {
        $data = [
            
            "trx_id"=> "",
            "nop"=> "317203100102600100",
            "property_name"=> "HERI NOVIANDI",
            "property_building_area"=> 0,
            "property_surface_area"=> 205,
            "property_estimation"=> 6000000000,
            "nik"=> "3273041601760001",
            "certificate_id"=> "10140903300601",
            "certificate_name"=> "MOCH.DICKY GARKIYADI, S.SOS",
            "certificate_type"=> "HGB",
            "certificate_date"=> "01-01-1970"
            
            
        ];

        $respons = $this->post(route('verify.property'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null,
                                ]
                            );

    }
}
