<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'category_name',
        'is_perishable',
    ];

    public function products() {
        return $this->hasMany('App\Products', 'category_id');
    }
}
