<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'category_id',
        'product_name',
        'stocks',
        'price',
        'status',
        'description'
    ];

    protected function productCategory() {
        return $this->belongsTo('App\ProductCategory');
    }
}
