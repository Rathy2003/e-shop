<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'order';
    protected $fillable = ["user_id","date_time","total","paid"];

    public function items()
    {
        return $this->hasMany(OrderDetail::class,"order_id","id");
    }
}
