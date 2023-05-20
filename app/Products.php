<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'product_name',
        'stocks',
        'price',
        'status',
        'description'
    ];

    public function productCategory() {
        return $this->belongsTo('App\ProductCategory','category_name');
    }

    protected function productOrderTransaction() {
        return $this->belongsTo('App\ProductsOrderTransaction');
    }
}
