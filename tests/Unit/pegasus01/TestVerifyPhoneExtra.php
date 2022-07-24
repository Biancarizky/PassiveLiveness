<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class TestVerifyPhoneExtra extends TestCase
{
    use WithoutMiddleware;

    public function test_verify_phone_true()
    {
        $data = [
            'trx_id' => "01",
            'nik' => "1810016008920003",
            'phone' => "6281283693380",
        ];

        $respons = $this->post(route('verify.phone.extra'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'data' => ['result' => true]
                                ]
                            );
    }

    // public function test_verify_phone_not_nik_true()
    // {
    //     $data = [
    //         'trx_id' => "01",
    //         'nik' => "",
    //         'phone' => "6281283693380",
    //     ];

    //     $respons = $this->post(route('verify.phone.extra'), $data);
    //     $respons->assertJson(
    //                             [
    //                                 'status' => 200, 
    //                                 'errors' => ['message' => "Internal Server Error"]
    //                             ]
    //                         );
    // }
}
