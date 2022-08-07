<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class CheckIdTest extends TestCase
{
    use WithoutMiddleware;

    public function test_checkidtest_all_true()
    {
        $data = [
            "trx_id"        => "s",
            "nik"           => "8883171301083001",
            "name"          => "REI IMAI",
            "birthdate"     => "30-10-1983",
            "birthplace"    => "TOKYO"
        ];

        $respons = $this->post(route('checkid'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_checkidtest_invalidparameter()
    {
        $data = [
            "trx_id"        => "s",
            "nik"           => "",
            "name"          => "REI IMAI",
            "birthdate"     => "30-10-1983",
            "birthplace"    => "TOKYO"
        ];

        $respons = $this->post(route('checkid'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["message" => "Data not found"]
                                ]
                            );
    }
}
