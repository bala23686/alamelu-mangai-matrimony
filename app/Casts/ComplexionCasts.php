<?php

namespace App\Casts;

use App\Models\Master\HoroScopeMaster\HoroScopeMaster;
use App\Models\SubMaster\ComplexionSubMaster\ComplexionSubMaster;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;


class ComplexionCasts implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        return ComplexionSubMaster::whereIn('id', explode(",",$value))->get();

    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return $value;
    }
}
