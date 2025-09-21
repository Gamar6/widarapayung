<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VirtualTourController extends Controller
{
    public function index()
    {
        // Contoh scenes statis (bisa disimpan ke DB nanti)
        $scenes = [
            'scene1' => [
                'title' => '1',
                'panorama' => asset('img/360/scene1.jpg'),
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
                'title' => '14',
                'panorama' => asset('img/360/scene14.jpg'),
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


            // trotoar pinggir
            'scene37' => [
                'title' => '37',            // papan PIW
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
                        'sceneId' => 'scene36'        // setting back  
                    ],
                    [
                        'pitch' => -2,
                        'yaw' => 110,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene38'
                    ],
                ],
            ],
            'scene38' => [
                'title' => '38',
                'panorama' => asset('img/360/pantai (2).jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 210,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene37'        // setting back
                    ],
                    [
                        'pitch' => -3,
                        'yaw' => 40,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene39'
                    ],
                ],
            ],
            'scene39' => [
                'title' => '39',
                'panorama' => asset('img/360/pantai (3).jpg'),
                'hfov' => 150,
                'yaw' => 40,
                'pitch' => 0,
                'hotSpots' => [
                    [
                        'pitch' => -3,
                        'yaw' => 0,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene39'        // setting back
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene37'
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
                        'pitch' => -3,
                        'yaw' => 0,
                        'type' => 'scene',
                        'text' => 'Kembali',
                        'sceneId' => 'scene39'        // setting back
                    ],
                    [
                        'pitch' => 0,
                        'yaw' => 180,
                        'type' => 'scene',
                        'text' => 'Lanjut',
                        'sceneId' => 'scene37'
                    ],
                ],
            ],
        ];

        return view('widarapayung', compact('scenes'));
    }
}