<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class IbuTest extends TestCase
{
    use WithoutMiddleware;

    public function test_ibu_all_true()
    {
        $data = [
            "trx_id"        => "s",
            "nik"           => "3205032709940004",
            "mother_name"          => "AAN LISTYANNA",
        ];

        $respons = $this->post(route('ibu'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_ibu_invalidparameter()
    {
        $data = [
            "trx_id"        => "s",
            "nik"           => "",
            "mother_name"   => "AAN LISTYANNA",
        ];

        $respons = $this->post(route('ibu'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["nik" => "invalid"]
                                ]
                            );
    }
}
