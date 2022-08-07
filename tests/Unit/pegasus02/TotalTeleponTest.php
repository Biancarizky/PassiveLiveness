<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class TotalTeleponTest extends TestCase
{
    use WithoutMiddleware;

    public function test_totaltelepon_all_true()
    {
        $data = [
            "trx_id"        => "s",
            "nik"           => "3671121404800005",
            "phone"          => "6281933529333",
        ];

        $respons = $this->post(route('telepon.total'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_totaltelepon_500_invalidparameter()
    {
        $data = [
            "trx_id"        => "s",
            "nik"           => "",
            "phone"          => "6281933529333",
        ];

        $respons = $this->post(route('telepon.total'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'data' => ["result" => null]
                                ]
                            );
    }
}
