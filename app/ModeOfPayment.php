<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModeOfPayment extends Model
{
    use SoftDeletes;

    protected $fillable = [
    'value',
    'name',
    
    ];
   
}
