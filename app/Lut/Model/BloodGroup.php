<?php

namespace App\Lut\Model;

class BloodGroup
{
    const bloodGroupList =[
        ['id'=>'A+','blood'=>'A+'],
        ['id'=>'A-','blood'=>'A-'],
        ['id'=>'B+','blood'=>'B+'],
        ['id'=>'B-','blood'=>'B-'],
        ['id'=>'AB+','blood'=>'AB+'],
        ['id'=>'AB-','blood'=>'AB-'],
        ['id'=>'O+','blood'=>'O+'],
        ['id'=>'O-','blood'=>'O-'],
    ];


    public static function all()
    {
        return self::bloodGroupList;
    }


}
