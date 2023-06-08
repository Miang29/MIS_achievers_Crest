<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethodInfo extends Model
{
    protected $fillable = [
        'payment_method_image',
        'mobile_no',
        'name',
        'payment_method',
    ];

    public function getImage($getFull = true) {
        return $getFull ? asset("uploads/settings/qr_code/{$this->payment_method_image}") : $this->payment_method_image;
    }
}
 