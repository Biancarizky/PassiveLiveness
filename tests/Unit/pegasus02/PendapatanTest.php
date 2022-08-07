<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class PendapatanTest extends TestCase
{
    use WithoutMiddleware;

    public function test_pendapatan_all_true()
    {
        $data = [
            "trx_id"=> "pendapatannik01",
            "npwp"=> "889119541151000",
            "nik"=> "3321042108830002",
            "income"=> 1000000,
            "name"=> "HARYANTO",
            "birthdate"=> "21-08-1983",
            "birthplace"=> "DEMAK"
        ];

        $respons = $this->post(route('pendapatan'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_pendapatan_invalidparameter()
    {
        $data = [
            "trx_id"=> "pendapatannik01",
            "npwp"=> "889119541151000",
            "nik"=> "",
            "income"=> 1000000,
            "name"=> "HARYANTO",
            "birthdate"=> "21-08-1983",
            "birthplace"=> "DEMAK"
        ];

        $respons = $this->post(route('pendapatan'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["nik"=> "invalid"]
                                ]
                            );
    }
}
