<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class NegativeListTest extends TestCase
{
    use WithoutMiddleware;

    public function test_negativelistTest_all_true()
    {
        $data = [
            "nik" => "9104010812660005",
            "name" => "COSTAN WARAY",
            "pob" => "NABIRE",
            "dob"=> "1966-12-08"
        ];
        // negative.list

        $respons = $this->post(route('negative.list'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_negativelistTest_invalidparameter()
    {
        $data = [
            "nik" => "",
            "name" => "COSTAN WARAY",
            "pob" => "NABIRE",
            "dob"=> "1966-12-08"
        ];
        // negative.list

        $respons = $this->post(route('negative.list'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ['nik' => 'invalid']
                                ]
                            );
    }
    
}
