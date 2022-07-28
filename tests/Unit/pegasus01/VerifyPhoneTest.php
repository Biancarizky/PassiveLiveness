<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class VerifyPhoneTest extends TestCase
{
    use WithoutMiddleware;

    public function test_verifyphone_all_true()
    {
        $data = [
            'trx_id' => "01",
            'nik' => "1810016008920003",
            'phone' => "6281283693380",
        ];

        $respons = $this->post(route('verify.phone'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_verifyphone_invalidparameter()
    {
        $data = [
            'trx_id' => "01",
            'nik' => "",
            'phone' => "6281283693380",
        ];

        $respons = $this->post(route('verify.phone'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ['nik' => "invalid"]
                                ]
                            );
    }
}
