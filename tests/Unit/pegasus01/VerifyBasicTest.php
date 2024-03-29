<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class VerifyBasicTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use WithoutMiddleware;


    public function test_verifybasic_all_true()
    {
        $data = [
            "trx_id"=> "01",
            "nik"=> "8883171301083001",
            "name"=> "REI IMAI",
            'birthdate'=> "10-30-1983",
            'birthplace' => "TOKYO",
            
        ];

        $respons = $this->post(route('verify.basic'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'data' => ['name' => true],
                                ]
                            );

    }

    public function test_verifybasic_datanotfound()
    {
        $data = [
            "trx_id"=> "01",
            "nik"=> "",
            "name"=> "REI IMAI",
            'birthdate'=> "10-30-1983",
            'birthplace' => "TOKYO",
            
        ];

        $respons = $this->post(route('verify.basic'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ['message' => "Data not found"],
                                ]
                            );

    }
}
