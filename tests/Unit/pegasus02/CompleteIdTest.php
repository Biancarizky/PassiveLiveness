<?php

namespace Tests\Unit\pegasus02;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class CompleteIdTest extends TestCase
{
    use WithoutMiddleware;

    public function test_completeid_all_true()
    {
        $data = [
            "trx_id"=> "01",
            "nik"=> "3175044109890002",
            "name"=> "JELITA SEPTRIASA",
            "birthdate"=> "01-09-1989",
            "birthplace"=> "JAKARTA",
            "address"=> "JL. TEBET BARAT RAYA NO.20 A",
            "selfie_photo" => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\selfi.jpg'), 'public/test-files/selfi.jpg', null, null, true),
                    
        ];

        $respons = $this->post(route('completeid'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'errors' => null    
                                ]
                            );
    }

    // public function test_completeid_invalidparameter()
    // {
    //     $data = [
    //         "trx_id"=> "01",
    //         "nik"=> "",
    //         "name"=> "JELITA SEPTRIASA",
    //         "birthdate"=> "01-09-1989",
    //         "birthplace"=> "JAKARTA",
    //         "address"=> "JL. TEBET BARAT RAYA NO.20 A",
    //         "selfie_photo" => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\selfi.jpg'), 'public/test-files/selfi.jpg', null, null, true),
                    
    //     ];

    //     $respons = $this->post(route('completeid'), $data);
    //     $respons->assertJson(
    //                             [
    //                                 'status' => 200, 
    //                                 'errors' => ["nik"=> "invalid"]    
    //                             ]
    //                         );
    // }

    public function test_completeid_invalidparameter(){
        $data = [
            "trx_id" => "01",
            "nik" => "JELITA SEPTRIASA",
            "name" => "01-09-1998",
            "birthdate" => "JAKARTA",
            "birthplace" => "JL. TEBET BARAT RAYA NO.20 A",
        ];
    }

    

    
}
