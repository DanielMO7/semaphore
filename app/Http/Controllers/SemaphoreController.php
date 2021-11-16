<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SemaphoreController extends Controller
{
    public function index(Request $res)
    {
        $semaphore = [];
        $sm = [
            's1' => [
                'r' => 0,
                'a' => 0,
                'v' => 0
            ],
            's2' => [
                'r' => 0,
                'a' => 0,
                'v' => 0
            ]
        ];
        $standby = [
            's1' => [
                'r' => 0,
                'a' => 1,
                'v' => 0
            ],
            's2' => [
                'r' => 1,
                'a' => 0,
                'v' => 0
            ]
            ];
        // Secuencia 1
        array_push($semaphore, [
            's1' => [
                 'r' => 1,
                'a' => 0,
                'v' => 0
            ],
            's2' => [
                'r' => 0,
                'a' => 0,
                'v' => 1
            ]
            ]);
            //Secuencia 2 
            array_push($semaphore, [
                's1' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
                ],
                's2' => [
                    'r' => 0,
                    'a' => 0,
                    'v' => 1
            ]
            ]);
            //Secuencia 3
            array_push($semaphore, [
                's1' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
                ],
                's2' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
            ]
            ]);
            //Secuencia 4
            array_push($semaphore, [
                's1' => [
                    'r' => 1,
                    'a' => 1,
                    'v' => 0
                ],
                's2' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
            ]
            ]);
            //Secuencia 5
            array_push($semaphore, [
                's1' => [
                    'r' => 0,
                    'a' => 0,
                    'v' => 1
                ],
                's2' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
            ]
            ]);
            //Secuencia 6
            array_push($semaphore, [
                's1' => [
                    'r' => 0,
                    'a' => 1,
                    'v' => 0
                ],
                's2' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
            ]
            ]);
        $semaphore = json_encode($semaphore);
        #$semaphore = response()->json($semaphore);
        #dd($semaphore);
        return response()->json($semaphore, 200);
    }

    public function semaphore(){
        $sem[] = [
            ['red' => 'HIGH', 'yellow' => 'LOW', 'green'=>'LOW'],
            ['red' => 'LOW', 'yellow' => 'LOW', 'green'=>'HIGH']
        ];
        //SECUENCE 2
        $sem[] = [
            ['red' => 'HIGH', 'yellow' => 'LOW', 'green'=>'LOW'],
            ['red' => 'LOW', 'yellow' => 'HIGH' ,'green'=>'LOW']
        ];
        foreach ($sem as $s){
            echo "Semaforo 1 --> Rojo: {$s[0]['red']} - Amarillo:{$s[0]['yellow']} - Verde:{$s[0]['green']} ";
            echo "Semaforo 2 --> Rojo: {$s[1]['red']} - Amarillo:{$s[1]['yellow']} - Verde:{$s[1]['green']} ";
            //print_r($s);
            Http::get("http://0.0.0.0/input?r1={$s[0]['red']}&r2={$s[1]['red']}");
            sleep(5);
        }
        return $sem;
    }       

    public function get(Request $res){

        
        $arr = json_decode((string)$res->arr);
        
        return response()->json(["len" => count($arr)], 200);
    }
    public function getCount(Request $res){
        $semaphore = [];

        // Secuencia 1
        array_push($semaphore, [
            's1' => [
                 'r' => 1,
                'a' => 0,
                'v' => 0
            ],
            's2' => [
                'r' => 0,
                'a' => 0,
                'v' => 1
            ]
            ]);
            //Secuencia 2 
            array_push($semaphore, [
                's1' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
                ],
                's2' => [
                    'r' => 0,
                    'a' => 0,
                    'v' => 1
            ]
            ]);
            //Secuencia 3
            array_push($semaphore, [
                's1' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
                ],
                's2' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
            ]
            ]);
            //Secuencia 4
            array_push($semaphore, [
                's1' => [
                    'r' => 1,
                    'a' => 1,
                    'v' => 0
                ],
                's2' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
            ]
            ]);
            //Secuencia 5
            array_push($semaphore, [
                's1' => [
                    'r' => 0,
                    'a' => 0,
                    'v' => 1
                ],
                's2' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
            ]
            ]);
            //Secuencia 6
            array_push($semaphore, [
                's1' => [
                    'r' => 0,
                    'a' => 1,
                    'v' => 0
                ],
                's2' => [
                    'r' => 1,
                    'a' => 0,
                    'v' => 0
            ]
            ]);
       /*$response = Http::get($apiUrl, [
            'arr' => json_encode($semaphore),
            'timeGreen' => 10,
            'timeYellow' => 11,
            'timeRed' => 10
        ]);*/
        $semaphore = json_encode($semaphore);
        //dd($response->body());
        //return response()->json($semaphore, 200);
        dd($semaphore);
    }
}
