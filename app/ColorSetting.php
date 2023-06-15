<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColorSetting extends Model
{
   use SoftDeletes;
    protected $fillable = [
    'value',
    'name',
    ];

     public function petsInformations() {
        return $this->hasMany('App\PetsInformation', 'colors');
    }

}
