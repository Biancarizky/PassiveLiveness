<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class VerifyMotherTest extends TestCase
{
    use WithoutMiddleware;

    public function test_verifymother_all_true()
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

    public function test_verifymother_invalidparameter()
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
