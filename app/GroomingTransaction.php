<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroomingTransaction extends Model
{
   protected $fillable = [
    'transaction_id',
    'pet_name',
    'variation_id',
    'price',
    'total',
];
protected $table = "grooming_transaction";

    protected function serviceOrderTransaction() {
        return $this->belongsTo('App\serviceOrderTransaction');
    }
}
