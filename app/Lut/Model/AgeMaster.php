<?php

namespace App\Lut\Model;

class AgeMaster
{

    const AgeList =[

        ['id'=>18,'age'=>'18'],
        ['id'=>20,'age'=>'20'],
        ['id'=>21,'age'=>'21'],
        ['id'=>22,'age'=>'22'],
        ['id'=>23,'age'=>'23'],
        ['id'=>24,'age'=>'24'],
        ['id'=>25,'age'=>'25'],
        ['id'=>26,'age'=>'26'],
        ['id'=>27,'age'=>'27'],
        ['id'=>28,'age'=>'28'],
        ['id'=>29,'age'=>'29'],
        ['id'=>30,'age'=>'30'],
        ['id'=>31,'age'=>'31'],
        ['id'=>32,'age'=>'32'],
        ['id'=>33,'age'=>'33'],
        ['id'=>34,'age'=>'34'],
        ['id'=>35,'age'=>'35'],
        ['id'=>36,'age'=>'36'],
        ['id'=>37,'age'=>'37'],
        ['id'=>38,'age'=>'38'],
        ['id'=>39,'age'=>'39'],
        ['id'=>40,'age'=>'40'],
        ['id'=>41,'age'=>'41'],

    ];


    public static function all()
    {
        return self::AgeList;
    }


}
