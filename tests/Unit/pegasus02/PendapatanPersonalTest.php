<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class PendapatanPersonalTest extends TestCase
{
    use WithoutMiddleware;

    public function test_pendapatanpersonal_all_true()
    {
        $data = [
            "trx_id"=> "",
            "npwp"=> "026562397515000",
            "income"=> 10000000
        ];

        $respons = $this->post(route('pendapatan.perseroan'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_pendapatanpersonal_invalidparameter()
    {
        $data = [
            "trx_id"=> "",
            "npwp"=> "",
            "income"=> 10000000
        ];

        $respons = $this->post(route('pendapatan.perseroan'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["npwp"=> "invalid"]
                                ]
                            );
    }
}
