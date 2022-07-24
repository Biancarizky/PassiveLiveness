<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class TestVerifyMother extends TestCase
{
    use WithoutMiddleware;

    public function test_verify_mother_data_filled_true()
    {
        $data = [
            "trx_id"=> "01",
            "nik"=> "1207020510930002",
            "mother_name"=> "RITA LIMBONG",
            
        ];

        $respons = $this->post(route('verify.mother'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'data' => ['result' => true],
                                ]
                            );

    }

    public function test_verify_mother_not_nik_true()
    {
        $data = [
            "trx_id"=> "01",
            "nik"=> "",
            "mother_name"=> "RITA LIMBONG",
            
        ];

        $respons = $this->post(route('verify.mother'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'data' => ['result' => null],
                                ]
                            );

    }
}
