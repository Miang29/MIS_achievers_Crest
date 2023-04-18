<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardingTransaction extends Model
{
 protected $fillable = [
    'transaction_id',
    'pet_name',
    'variation_id',
    'price',
    'total',
    ];

    protected $table = "boarding_transaction";

    protected function serviceOrderTransaction() {
        return $this->belongsTo('App\serviceOrderTransaction');
    }
}
