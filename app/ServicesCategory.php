<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesCategory extends Model
{
    protected $fillable = [
        'service_category_name',
    ];

    public function services() {
        return $this->hasMany('App\Services', 'service_category_id');
    }

}
