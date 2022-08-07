<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class NegativeListTest extends TestCase
{
    use WithoutMiddleware;

    public function test_negativelist_all_true()
    {
        $data = [
            "nik"=> "9104010812660005",
            "name"=> "COSTAN WARAY",
            "pob"=> "NABIRE",
            "dob"=> "1966-12-08"
        ];

        $respons = $this->post(route('negative.list02'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null
                                ]
                            );
    }

    public function test_negativelist_invalidparameter()
    {
        $data = [
            "nik"=> "",
            "name"=> "COSTAN WARAY",
            "pob"=> "NABIRE",
            "dob"=> "1966-12-08"
        ];

        $respons = $this->post(route('negative.list02'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => ["nik" => "invalid"]
                                ]
                            );
    }

    
}
