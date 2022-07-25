<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class TestworkAddressPercentage extends TestCase
{
    use WithoutMiddleware;

    public function test_testwork_address_percentage_true()
    {
        $data = [
            "trx_id"=> "1234567890",
            "phone"=> "6285156415793",
            "address"=> "JL. KEMANGGISAN ILIR III"
        ];

        $respons = $this->post(route('work.address.percentage'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }
}
