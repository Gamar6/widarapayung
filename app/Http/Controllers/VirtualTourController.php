<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VirtualTourController extends Controller
{
    public function index(Request $request)
    {
        // Contoh scenes statis (bisa disimpan ke DB nanti)
        $scenes = [
            'scene1' => [
                'title' => '1',
                'panorama' => asset('img/360/scene1.jpg'),
                'important' => true,
                'hfov' => 150,
                'yaw' => 0,
                'pitch' => 0,
                'hotSpots' => [
                    // hotspot ke scene2
                    [
                        'pitch' => 0,    // vertical (derajat)
                        'yaw' => 175,     // horizontal (derajat)
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene2'
                    ],
                ],
            ],
            'scene2' => [
                'title' => '2',
                'panorama' => asset('img/360/scene2.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 0,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene1'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene3'
                    ],
                ],
            ],
            'scene3' => [
                'title' => '3',
                'panorama' => asset('img/360/scene3.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 1,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene2'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 181,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene4'
                    ],
                ],
            ],
            'scene4' => [
                'title' => '4',
                'panorama' => asset('img/360/scene4.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => -1,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene3'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene5'
                    ],
                ],
            ],
            'scene5' => [
                'title' => '5',
                'panorama' => asset('img/360/scene5.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => -1,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene4'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene6'
                    ],
                ],
            ],
            'scene6' => [
                'title' => '6',
                'panorama' => asset('img/360/scene6.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => -1,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene5'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 179,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene7'
                    ],
                ],
            ],
            'scene7' => [
                'title' => '7',
                'panorama' => asset('img/360/scene7.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 3,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene6'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 183,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene8'
                    ],
                ],
            ],
            'scene8' => [
                'title' => '8',
                'panorama' => asset('img/360/scene8.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 1,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene7'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 181,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene9'
                    ],
                ],
            ],
            'scene9' => [
                'title' => '9',
                'panorama' => asset('img/360/scene9.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 4.5,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene8'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 184.5,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene10'
                    ],
                ],
            ],
            'scene10' => [
                'title' => '10',
                'panorama' => asset('img/360/scene10.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 1.5,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene9'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 181,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene11'
                    ],
                ],
            ],
            'scene11' => [
                'title' => '11',
                'panorama' => asset('img/360/scene11.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 5,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene10'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 183.5,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene12'
                    ],
                ],
            ],
            'scene12' => [
                'title' => '12',
                'panorama' => asset('img/360/scene12.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 3.5,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene11'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 182.5,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene13'
                    ],
                ],
            ],
            'scene13' => [
                'title' => '13',
                'panorama' => asset('img/360/scene13.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 2,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene12'
                    ],
                    [
                        'pitch' => -2,
                        'yaw' => 181,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene14'
                    ],
                ],
            ],
            'scene14' => [
                'title' => 'Pintu Masuk 1',
                'panorama' => asset('img/360/scene14.jpg'),
                'important' => true,
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 1,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene13'
                    ],
                    [
                        'pitch' => -1,
                        'yaw' => 87,
                        'type' => 'scene',
                        'text' => 'Kiri',
                        'sceneId' => 'scene33'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 181,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene15'
                    ],
                ],
            ],
            'scene15' => [
                'title' => '15',
                'panorama' => asset('img/360/scene15.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 4,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene14'
                    ],
                    [
                        'pitch' => -2,
                        'yaw' => 183,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene16'
                    ],
                ],
            ],
            'scene16' => [
                'title' => '16',
                'panorama' => asset('img/360/scene16.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene15'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene17'
                    ],
                ],
            ],
            'scene17' => [
                'title' => '17',
                'panorama' => asset('img/360/scene17.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -4,
                        'yaw' => 2,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene16'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 179,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene18'
                    ],
                ],
            ],
            'scene18' => [
                'title' => '18',
                'panorama' => asset('img/360/scene18.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 0,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene17'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene19'
                    ],
                ],
            ],
            'scene19' => [
                'title' => '19',
                'panorama' => asset('img/360/scene19.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => -5,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene18'
                    ],
                    [
                        'pitch' => -1,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene20'
                    ],
                ],
            ],
            'scene20' => [
                'title' => '20',
                'panorama' => asset('img/360/scene20.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 9,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene19'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene21'
                    ],
                ],
            ],
            'scene21' => [                  // pintu masuk tengah
                'title' => '21',
                'panorama' => asset('img/360/scene21.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => 3.5,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene20'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 91.5,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene22'
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 163,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene34'
                    ],
                ],
            ],
            'scene22' => [              // jalan kiri
                'title' => '22',
                'panorama' => asset('img/360/scene22.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 0,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene21'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene23'
                    ],
                ],
            ],
            'scene23' => [              // jalan kiri
                'title' => '23',
                'panorama' => asset('img/360/scene23.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -2,
                        'yaw' => 9,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene22'
                    ],
                    [
                        'pitch' => -1,
                        'yaw' => 188,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene24'
                    ],
                ],
            ],
            'scene24' => [              // jalan kiri
                'title' => '24',
                'panorama' => asset('img/360/scene24.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -1,
                        'yaw' => 2,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene23'
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene25'
                    ],
                ],
            ],
            'scene25' => [              // jalan kiri
                'title' => '25',
                'panorama' => asset('img/360/scene25.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -2,
                        'yaw' => 89,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene24'
                    ],
                    [
                        'pitch' => -1,
                        'yaw' => 182.5,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene26'
                    ],
                ],
            ],
            'scene26' => [              // jalan kiri
                'title' => '26',
                'panorama' => asset('img/360/scene26.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -2,
                        'yaw' => 1,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene25'
                    ],
                    [
                        'pitch' => -1,
                        'yaw' => 181,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene27'
                    ],
                ],
            ],
            'scene27' => [              // jalan kiri
                'title' => '27',
                'panorama' => asset('img/360/scene27.jpg'),
                'hfov' => 150,
                'yaw' => 65,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -1,
                        'yaw' => 238,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene26'
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 60,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene29'
                    ],
                ],
            ],
            
            // 'scene28' => [              // jalan kiri
            //     'title' => '28',
            //     'panorama' => asset('img/360/scene28.jpg'),
            //     'hfov' => 150,
            //     'yaw' => 180,
            //     'pitch' => 0,
            //     'hotSpots' => [
            //         [
            //             'pitch' => -3,
            //             'yaw' => 0,
            //             'type' => 'scene',
            //             'text' => 'Kembali',
            //             'sceneId' => 'scene27'
            //         ],
            //         [
            //             'pitch' => 0,
            //             'yaw' => 180,
            //             'type' => 'scene',
            //             'text' => 'Lanjut',
            //             'sceneId' => 'scene29'
            //         ],
            //     ],
            // ],

            'scene29' => [              // jalan kiri
                'title' => '29',
                'panorama' => asset('img/360/scene29.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => 0,
                        'yaw' => 6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene27'
                    ],
                    [
                        'pitch' => -8,
                        'yaw' => 176,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene30'
                    ],
                ],
            ],
            'scene30' => [              // jalan kiri
                'title' => '30',
                'panorama' => asset('img/360/scene30.jpg'),
                'hfov' => 150,
                'yaw' => 90,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 0,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene29'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 89,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene31'
                    ],
                ],
            ],
            'scene31' => [              // jalan kiri
                'title' => '31',
                'panorama' => asset('img/360/scene31.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -1,
                        'yaw' => -3,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene30'
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene32'
                    ],
                ],
            ],
            'scene32' => [              // jalan kiri
                'title' => '32',
                'panorama' => asset('img/360/scene32.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -1,
                        'yaw' => 0.5,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene31'
                    ],
                    [
                        'pitch' => -1,
                        'yaw' => 181,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene33'
                    ],
                ],
            ],
            'scene33' => [              // jalan kiri
                'title' => '33',
                'panorama' => asset('img/360/scene33.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -1,
                        'yaw' => 3,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene32'
                    ],
                    [
                        'pitch' => -2.5,
                        'yaw' => 184,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene14'
                    ],
                ],
            ],
            'scene34' => [
                'title' => '34',
                'panorama' => asset('img/360/scene34.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -2,
                        'yaw' => -10,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene21'
                    ],
                    [
                        'pitch' => -2,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene35'
                    ],
                ],
            ],
            'scene35' => [
                'title' => '35',
                'panorama' => asset('img/360/scene35.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -2,
                        'yaw' => -2,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene34'
                    ],
                    [
                        'pitch' => -2,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene36'
                    ],
                ],
            ],
            'scene36' => [
                'title' => '36',
                'panorama' => asset('img/360/scene36.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 5,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene35'
                    ],
                    [
                        'pitch' => -2,
                        'yaw' => 187,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene37'
                    ],
                ],
            ],
            'scene37' => [          // papan PIW
                'title' => '37',
                'panorama' => asset('img/360/scene37.jpg'),
                'hfov' => 150,
                'yaw' => 105,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 300,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene36'
                    ],
                    [
                        'pitch' => -2,
                        'yaw' => 110,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene38'
                    ],
                    [
                        'pitch' => -2,
                        'yaw' => 20,
                        'type' => 'scene',
                        'text' => 'Kiri',
                        'sceneId' => 'scene84'
                    ],
                    [
                        'pitch' => -2,
                        'yaw' => 210,
                        'type' => 'scene',
                        'text' => 'Kanan',
                        'sceneId' => 'scene80'
                    ],
                ],
            ],
            'scene38' => [
                'title' => '38',
                'panorama' => asset('img/360/scene42.jpg'),
                'hfov' => 150,
                'yaw' => 270,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 75,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene37'   
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 173,
                        'type' => 'scene',
                        'text' => 'Kiri',
                        'sceneId' => 'scene51'       
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 270,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene39'
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 350,
                        'type' => 'scene',
                        'text' => 'Kanan',
                        'sceneId' => 'scene47'
                    ],
                ],
            ],


            // area pantai
            'scene39' => [
                'title' => '39',
                'panorama' => asset('img/360/pantai (3).jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -4,
                        'yaw' => 210,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene38'        // setting back
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 40,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene40'
                    ],
                ],
            ],
            'scene40' => [
                'title' => '40',
                'panorama' => asset('img/360/pantai (4).jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -4,
                        'yaw' => 200,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene39'        // setting back
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 30,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene41'
                    ],
                ],
            ],
            'scene41' => [
                'title' => '41',
                'panorama' => asset('img/360/pantai (5).jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 200,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene40'        // setting back
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 30,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene42'
                    ],
                ],
            ],
            'scene42' => [
                'title' => '42',
                'panorama' => asset('img/360/pantai (6).jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 205,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene41'        // setting back
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 40,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene43'
                    ],
                ],
            ],
            'scene43' => [
                'title' => '43',
                'panorama' => asset('img/360/pantai (7).jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 200,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene42'        // setting back
                    ],
                    [
                        'pitch' => -5,
                        'yaw' => 30,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene44'
                    ],
                ],
            ],
            'scene44' => [
                'title' => '44',
                'panorama' => asset('img/360/pantai (8).jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 210,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene43'        // setting back
                    ],
                    [
                        'pitch' => -5,
                        'yaw' => 40,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene45'
                    ],
                ],
            ],
            'scene45' => [
                'title' => '45',
                'panorama' => asset('img/360/pantai (9).jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 190,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene44'        // setting back
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 30,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene46'
                    ],
                ],
            ],
            'scene46' => [
                'title' => '46',
                'panorama' => asset('img/360/pantai (10).jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 220,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene45'        // setting back
                    ],
                ],
            ],


            // Kanan
            'scene47' => [
                'title' => '47',
                'panorama' => asset('img/360/scene41.jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -6,
                        'yaw' => 182,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene38'
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 5,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene48'
                    ], 
                ],
            ],
            'scene48' => [
                'title' => '48',
                'panorama' => asset('img/360/scene40.jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -4,
                        'yaw' => 178,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene47'
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 0,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene49'
                    ], 
                ],
            ],
            'scene49' => [
                'title' => '49',
                'panorama' => asset('img/360/scene39.jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene48'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 0,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene50'
                    ], 
                ],
            ],
            'scene50' => [
                'title' => '50',
                'panorama' => asset('img/360/scene38.jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 182,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene49'
                    ],
                ],
            ],


            // Kiri
            'scene51' => [
                'title' => '51',
                'panorama' => asset('img/360/scene43.jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => 0,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene38'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene52'
                    ], 
                ],
            ],
            'scene52' => [
                'title' => '52',
                'panorama' => asset('img/360/scene44.jpg'),
                'hfov' => 150,
                'yaw' => 176,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -3,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene51'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 176,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene53'
                    ], 
                ],
            ],
            'scene53' => [
                'title' => '53',
                'panorama' => asset('img/360/scene45.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => 0,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene52'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene54'
                    ], 
                ],
            ],
            'scene54' => [
                'title' => '54',
                'panorama' => asset('img/360/scene46.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -3,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene53'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 176,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene55'
                    ], 
                ],
            ],
            'scene55' => [
                'title' => '55',
                'panorama' => asset('img/360/scene47.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene54'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene56'
                    ], 
                ],
            ],
            'scene56' => [
                'title' => '56',
                'panorama' => asset('img/360/scene48.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -7,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene55'
                    ],
                    [
                        'pitch' => -8,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene75'
                    ], 
                ],
            ],


            'scene57' => [          // bagian anomali
                'title' => '57',
                'panorama' => asset('img/360/scene49.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    // [
                    //     'pitch' => -5,
                    //     'yaw' => -6,
                    //     'type' => 'scene',
                    //     'text' => 'Kembali',
                    //     'sceneId' => 'scene54'
                    // ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene58'
                    ], 
                ],
            ],
            'scene58' => [
                'title' => '58',
                'panorama' => asset('img/360/scene50.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene57'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene59'
                    ], 
                ],
            ],
            'scene59' => [
                'title' => '59',
                'panorama' => asset('img/360/scene51.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene58'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene60'
                    ], 
                ],
            ],
            'scene60' => [
                'title' => '60',
                'panorama' => asset('img/360/scene52.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene59'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene61'
                    ], 
                ],
            ],
            'scene61' => [
                'title' => '61',
                'panorama' => asset('img/360/scene53.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene60'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene62'
                    ], 
                ],
            ],
            'scene62' => [
                'title' => '62',
                'panorama' => asset('img/360/scene54.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene61'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene63'
                    ], 
                ],
            ],
            'scene63' => [
                'title' => '63',
                'panorama' => asset('img/360/scene55.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene62'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene64'
                    ], 
                ],
            ],
            'scene64' => [
                'title' => '64',
                'panorama' => asset('img/360/scene56.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene63'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene65'
                    ], 
                ],
            ],
            'scene65' => [
                'title' => '65',
                'panorama' => asset('img/360/scene57.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene64'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene66'
                    ], 
                ],
            ],
            'scene66' => [
                'title' => '66',
                'panorama' => asset('img/360/scene58.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene65'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene67'
                    ], 
                ],
            ],
            'scene67' => [
                'title' => '67',
                'panorama' => asset('img/360/scene59.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene66'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene68'
                    ], 
                ],
            ],
            'scene68' => [
                'title' => '68',
                'panorama' => asset('img/360/scene60.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene67'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene69'
                    ], 
                ],
            ],
            'scene69' => [
                'title' => '69',
                'panorama' => asset('img/360/scene61.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene68'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene70'
                    ], 
                ],
            ],
            'scene70' => [
                'title' => '70',
                'panorama' => asset('img/360/scene62.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene69'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene71'
                    ], 
                ],
            ],
            'scene71' => [
                'title' => '71',
                'panorama' => asset('img/360/scene63.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene70'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene72'
                    ], 
                ],
            ],
            'scene72' => [
                'title' => '72',
                'panorama' => asset('img/360/scene64.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene71'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene73'
                    ], 
                ],
            ],
            'scene73' => [
                'title' => '73',
                'panorama' => asset('img/360/scene65.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene72'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene74'
                    ], 
                ],
            ],




            'scene74' => [              // jalan pojok kiri
                'title' => '74',
                'panorama' => asset('img/360/scene66.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene73'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene75'
                    ], 
                ],
            ],
            'scene75' => [
                'title' => '75',
                'panorama' => asset('img/360/scene67.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene74'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 85,
                        'type' => 'scene',
                        'text' => 'Kiri',
                        'sceneId' => 'scene56'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene76'
                    ], 
                ],
            ],
            'scene76' => [
                'title' => '76',
                'panorama' => asset('img/360/scene69.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene75'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene77'
                    ], 
                ],
            ],
            'scene77' => [
                'title' => '77',
                'panorama' => asset('img/360/scene70.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene76'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene78'
                    ], 
                ],
            ],
            'scene78' => [
                'title' => '78',
                'panorama' => asset('img/360/scene71.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene77'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene79'
                    ], 
                ],
            ],
            'scene79' => [
                'title' => '79',
                'panorama' => asset('img/360/scene72.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene78'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene80'
                    ], 
                ],
            ],
            'scene80' => [
                'title' => '80',
                'panorama' => asset('img/360/scene73.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene79'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene81'
                    ], 
                ],
            ],
            'scene81' => [
                'title' => '81',
                'panorama' => asset('img/360/scene74.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene80'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene82'
                    ], 
                ],
            ],
            'scene82' => [
                'title' => '82',
                'panorama' => asset('img/360/scene75.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene81'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene83'
                    ], 
                ],
            ],
            'scene83' => [
                'title' => '83',
                'panorama' => asset('img/360/scene76.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene82'
                    ],
                    [
                        'pitch' => -4,
                        'yaw' => 175,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene84'
                    ], 
                ],
            ],
            'scene84' => [
                'title' => '84',
                'panorama' => asset('img/360/scene77.jpg'),
                'hfov' => 150,
                'yaw' => 180,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -5,
                        'yaw' => -6,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene83'
                    ],
                    // [
                    //     'pitch' => -4,
                    //     'yaw' => 175,
                    //     'type' => 'scene',
                    //     'text' => 'Lanjut',
                    //     'sceneId' => 'scene85'
                    // ], 
                ],
            ],
        ];
    $firstScene = $request->query('scene', 'scene1'); // default: scene1
    return view('widarapayung', compact('scenes', 'firstScene'));
    }
}