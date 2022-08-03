<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class HomeAddressPercentageTest extends TestCase
{
    use WithoutMiddleware;

    public function test_homeaddresspercentagetest_invalidparameter()
    {
        $data = [
            "trx_id" => "1234567890",
            "phone" => "6281283693380",
            "address" => ""
        ];

        $respons = $this->post(route('verify.income'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    // 'errors' => null
                                ]
                            );
    }
}
