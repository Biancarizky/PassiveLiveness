<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class AlamatRumahPercentageTest extends TestCase
{
    use WithoutMiddleware;

    public function test_alamatrumahpercentage_all_true()
    {
        $data = [
            "phone"=> "6281933529333",
            "address"=> "JAKARTA"
        ];

        $respons = $this->post(route('alamat.rumah.percentage'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_alamatrumahpercentage_invalidparameter()
    {
        $data = [
            "phone"=> "",
            "address"=> "JAKARTA"
        ];

        $respons = $this->post(route('alamat.rumah.percentage'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["phone" => "invalid"]
                                ]
                            );
    }
}
