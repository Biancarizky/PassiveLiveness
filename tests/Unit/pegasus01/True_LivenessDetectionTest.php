<?php

namespace Tests\Unit\pegasus01;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class True_LivenessDetectionTest extends TestCase
{
    use WithoutMiddleware;

    public function test_livenessdetectiondigidata_2gesture_smallsize_1()
    {
        $data = [
            'file' => [
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-9-20220714202326.jpeg'), 'public/uploads/liveness_liveness-2280-5-9-20220714202326.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-10-20220714202327.jpeg'), 'public/uploads/liveness_liveness-2280-5-10-20220714202327.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-11-20220714202328.jpeg'), 'public/uploads/liveness_liveness-2280-5-11-20220714202328.jpeg', null, null, true),
                        
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-12-20220714202329.jpeg'), 'public/uploads/liveness_liveness-2280-5-12-20220714202329.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-13-20220714202330.jpeg'), 'public/uploads/liveness_liveness-2280-5-13-20220714202330.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-14-20220714202331.jpeg'), 'public/uploads/liveness_liveness-2280-5-14-20220714202331.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-15-20220714202332.jpeg'), 'public/uploads/liveness_liveness-2280-5-15-20220714202332.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-16-20220714202333.jpeg'), 'public/uploads/liveness_liveness-2280-5-16-20220714202333.jpeg', null, null, true),
                        // asset('uploads/liveness_liveness-2280-5-9-20220714202326.jpeg')
                    ],
            'gestures_set' => "5",
        ];

        $respons = $this->post(route('liveness.detection'), $data);
        $respons->assertJson(
                                [
                                    "_passed" => true
                                    // 'response' => ['_passed' => false]    
                                ]
                            );
    }

    public function test_livenessdetectiondigidata_2gesture_smallsize_2()
    {
        $data = [
            'file' => [
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-9-20220714202326.jpeg'), 'public/uploads/liveness_liveness-2280-5-9-20220714202326.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-10-20220714202327.jpeg'), 'public/uploads/liveness_liveness-2280-5-10-20220714202327.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-11-20220714202328.jpeg'), 'public/uploads/liveness_liveness-2280-5-11-20220714202328.jpeg', null, null, true),
                        
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-12-20220714202329.jpeg'), 'public/uploads/liveness_liveness-2280-5-12-20220714202329.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-13-20220714202330.jpeg'), 'public/uploads/liveness_liveness-2280-5-13-20220714202330.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-14-20220714202331.jpeg'), 'public/uploads/liveness_liveness-2280-5-14-20220714202331.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-15-20220714202332.jpeg'), 'public/uploads/liveness_liveness-2280-5-15-20220714202332.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-16-20220714202333.jpeg'), 'public/uploads/liveness_liveness-2280-5-16-20220714202333.jpeg', null, null, true),
                        // asset('uploads/liveness_liveness-2280-5-9-20220714202326.jpeg')
                    ],
            'gestures_set' => "5",
        ];

        $respons = $this->post(route('liveness.detection'), $data);
        $respons->assertJson(
                                [
                                    "_passed" => true
                                    // 'response' => ['_passed' => false]    
                                ]
                            );
    }

    public function test_livenessdetectiondigidata_2gesture_smallsize_3()
    {
        $data = [
            'file' => [
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-9-20220714202326.jpeg'), 'public/uploads/liveness_liveness-2280-5-9-20220714202326.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-10-20220714202327.jpeg'), 'public/uploads/liveness_liveness-2280-5-10-20220714202327.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-11-20220714202328.jpeg'), 'public/uploads/liveness_liveness-2280-5-11-20220714202328.jpeg', null, null, true),
                        
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-12-20220714202329.jpeg'), 'public/uploads/liveness_liveness-2280-5-12-20220714202329.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-13-20220714202330.jpeg'), 'public/uploads/liveness_liveness-2280-5-13-20220714202330.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-14-20220714202331.jpeg'), 'public/uploads/liveness_liveness-2280-5-14-20220714202331.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-15-20220714202332.jpeg'), 'public/uploads/liveness_liveness-2280-5-15-20220714202332.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-16-20220714202333.jpeg'), 'public/uploads/liveness_liveness-2280-5-16-20220714202333.jpeg', null, null, true),
                        // asset('uploads/liveness_liveness-2280-5-9-20220714202326.jpeg')
                    ],
            'gestures_set' => "5",
        ];

        $respons = $this->post(route('liveness.detection'), $data);
        $respons->assertJson(
                                [
                                    "_passed" => true
                                    // 'response' => ['_passed' => false]    
                                ]
                            );
    }

    public function test_livenessdetectiondigidata_2gesture_smallsize_4()
    {
        $data = [
            'file' => [
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-9-20220714202326.jpeg'), 'public/uploads/liveness_liveness-2280-5-9-20220714202326.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-10-20220714202327.jpeg'), 'public/uploads/liveness_liveness-2280-5-10-20220714202327.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-11-20220714202328.jpeg'), 'public/uploads/liveness_liveness-2280-5-11-20220714202328.jpeg', null, null, true),
                        
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-12-20220714202329.jpeg'), 'public/uploads/liveness_liveness-2280-5-12-20220714202329.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-13-20220714202330.jpeg'), 'public/uploads/liveness_liveness-2280-5-13-20220714202330.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-14-20220714202331.jpeg'), 'public/uploads/liveness_liveness-2280-5-14-20220714202331.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-15-20220714202332.jpeg'), 'public/uploads/liveness_liveness-2280-5-15-20220714202332.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-16-20220714202333.jpeg'), 'public/uploads/liveness_liveness-2280-5-16-20220714202333.jpeg', null, null, true),
                        // asset('uploads/liveness_liveness-2280-5-9-20220714202326.jpeg')
                    ],
            'gestures_set' => "5",
        ];

        $respons = $this->post(route('liveness.detection'), $data);
        $respons->assertJson(
                                [
                                    "_passed" => true
                                    // 'response' => ['_passed' => false]    
                                ]
                            );
    }

    public function test_livenessdetectiondigidata_2gesture_smallsize_5()
    {
        $data = [
            'file' => [
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-9-20220714202326.jpeg'), 'public/uploads/liveness_liveness-2280-5-9-20220714202326.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-10-20220714202327.jpeg'), 'public/uploads/liveness_liveness-2280-5-10-20220714202327.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-11-20220714202328.jpeg'), 'public/uploads/liveness_liveness-2280-5-11-20220714202328.jpeg', null, null, true),
                        
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-12-20220714202329.jpeg'), 'public/uploads/liveness_liveness-2280-5-12-20220714202329.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-13-20220714202330.jpeg'), 'public/uploads/liveness_liveness-2280-5-13-20220714202330.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-14-20220714202331.jpeg'), 'public/uploads/liveness_liveness-2280-5-14-20220714202331.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-15-20220714202332.jpeg'), 'public/uploads/liveness_liveness-2280-5-15-20220714202332.jpeg', null, null, true),
                        new \Illuminate\Http\UploadedFile(resource_path('..\public\uploads\liveness_liveness-2280-5-16-20220714202333.jpeg'), 'public/uploads/liveness_liveness-2280-5-16-20220714202333.jpeg', null, null, true),
                        // asset('uploads/liveness_liveness-2280-5-9-20220714202326.jpeg')
                    ],
            'gestures_set' => "5",
        ];

        $respons = $this->post(route('liveness.detection'), $data);
        $respons->assertJson(
                                [
                                    "_passed" => true
                                    // 'response' => ['_passed' => false]    
                                ]
                            );
    }


}
