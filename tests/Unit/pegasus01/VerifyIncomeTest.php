<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class VerifyIncomeTest extends TestCase
{
    use WithoutMiddleware;

    public function test_verifyincometest_all_true()
    {
        $data = [
            "trx_id"        => "income01",
            "nik"           => "3674062703920007",
            "income"        => "5000000",
            "name"          => "MUHAMMAD ADENAN PALAMANI",
            "birthdate"     => "27-03-1992",
            "birthplace"    => "JAKARTA"
        ];

        $respons = $this->post(route('verify.income'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_verifyincometest_invalidparameter()
    {
        $data = [
            "trx_id"        => "income01",
            "nik"           => "",
            "income"        => "5000000",
            "name"          => "MUHAMMAD ADENAN PALAMANI",
            "birthdate"     => "27-03-1992",
            "birthplace"    => "JAKARTA"
        ];

        $respons = $this->post(route('verify.income'), );
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["nik"=> "invalid"]
                                ]
                            );
    }
}
