<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class AlamatKantorPercentageTest extends TestCase
{
    use WithoutMiddleware;

    public function test_alamatkantorpercentage_all_true(){
        $data = [
            "phone" => "6281933529333",
            "address" => "JAKARTA"
        ];

        $respons = $this->post(route('alamat.kantor.percentage'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_alamatkantorpercentage_invalidparameter(){
        $data = [
            "phone" => "",
            "address" => "JAKARTA"
        ];

        $respons = $this->post(route('alamat.kantor.percentage'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["phone" => "invalid"]
                                ]
                            );
    }
}
