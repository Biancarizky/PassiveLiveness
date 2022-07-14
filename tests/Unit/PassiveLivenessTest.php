<?php

namespace Tests\Unit;

use Tests\TestCase;

class PassiveLivenessTest extends TestCase
{
    public function test_passiveLiveness_validation_success_data_passed_true(){
        $data = [
            'files' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\1207231807920002_ASK2207040002591673_MATCH_88.5_LIVENESS_100.jpg'), 'public/test-files/1207231807920002_ASK2207040002591673_MATCH_88.5_LIVENESS_100.jpg', null, null, true),
            'trx_id' => "01",
        ];
        

        $respons = $this->post(route('upload.unittest'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'data' => ['passed' => true]  
                                ]
                            );
      
        
    }

    public function test_passiveLiveness_validation_success_data_passed_false(){
        $data = [
            'files' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\Instagram_icon.jpg'), 'public/test-files/Instagram_icon.jpg', null, null, true),
            'trx_id' => "01",
        ];
        

        $respons = $this->post(route('upload.unittest'), $data);
        $respons->assertJson(
                                [
                                    'status' => 200, 
                                    'data' => ['passed' => false]    
                                ]
                            );
      
        
    }

    public function test_passiveLiveness_validation_invalid_photo(){
        $data = [
            'files' => "",
            'trx_id' => "01",
        ];
        

        $respons = $this->post(route('upload.unittest'), $data);
        $respons->assertJson(
                                [
                                    'status' => 1001, 
                                    'message' => 'invalid parameter'
                                ]
                            );
      
        
    }

    public function test_passiveLiveness_validation_invalid_trx_id(){
        $data = [
            'files' => new \Illuminate\Http\UploadedFile(resource_path('..\public\test-files\1207231807920002_ASK2207040002591673_MATCH_88.5_LIVENESS_100.jpg'), 'public/test-files/1207231807920002_ASK2207040002591673_MATCH_88.5_LIVENESS_100.jpg', null, null, true),
            'trx_id' => "",
        ];
        

        $respons = $this->post(route('upload.unittest'), $data);
        $respons->assertJson(
                                [
                                    'status' => 1001, 
                                    'message' => 'invalid parameter'
                                ]
                            );
      
        
    }

}
