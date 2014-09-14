<?php
namespace Controller\Frontend\WindSpace;

class WindController extends \Controller {
    /*
     usefully header
     "time";"temp";"pressure_0";"pressure";"pressure_a";"U";"wind-direction";"wind-velocity";"ff10";"ff3";"N";"WW";"W1";"W2";"Tn";"Tx";"Cl";"Nh";"H";"Cm";"Ch";"VV";"Td";"RRR";"tR";"E";"Tg";"E'";"sss";
     *
     * */

    public function index(){
        $data=\Maatwebsite\Excel\Facades\Excel::load('/public/data/excel/file.csv', function($reader) {})->toArray();

        $data = array_reverse ((array)$data);
//print_r($data);


        /*** Среднесуточное значение ***/
        $prevData='';
        $avgDay=[];

        foreach($data as $key=>$string){
            /* Дата::d.m.y */
            $currentData=substr($string['time'],0,10);
            $expCurrentData=explode('.',$currentData);

            /* Для первого элемента нельзя сделать +=*/
            if($key==0){
                $avgDay[$expCurrentData[2].'_'.$expCurrentData[1]][(int)$expCurrentData[0]]=$string['temp'];
            }

            /* В текущей дате */
            if($currentData==$prevData){
                $avgDay[$expCurrentData[2].'_'.$expCurrentData[1]][(int)$expCurrentData[0]]+=$string['temp'];
            }

            /* В следующей дате */
            if($currentData!=$prevData){
                $avgDay[$expCurrentData[2].'_'.$expCurrentData[1]][(int)$expCurrentData[0]]=$string['temp'];
            }

            $prevData=substr($string['time'],0,10);
        }
        ksort($avgDay);
//        print_r($avgDay);
//        exit;
        $viewData=[
            'main'=>$data,
            'avgDay'=>$avgDay
        ];

        return \View::make('/frontend/site_wind/Main',$viewData);
    }
}

