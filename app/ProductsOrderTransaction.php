<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsOrderTransaction extends Model
{
    protected $fillable = [
        'reference_no',
        'mode_of_payment',
    ];

    public function products() {
        return $this->hasMany('App\Products', 'id');
    }

    public function productsOrderItems() {
        return $this->hasMany('App\ProductsOrderTransactionItem', 'transaction_id');
    }
}
