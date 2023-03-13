<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsOrderTransactionItem extends Model
{
    protected $fillable = [
        'transaction_id',
        'product_name',
        'price',
        'quantity',
        'total'
    ];

    protected $table = "products_order_transactions_item";

    protected function productOrderTransaction() {
        return $this->belongsTo('App\ProductsOrderTransaction');
    }

}
