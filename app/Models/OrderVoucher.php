<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderVoucher extends Pivot
{
    const UPDATED_AT = null;
    protected $table = 'order_vouchers';
    protected $guarded = ['id'];
}
