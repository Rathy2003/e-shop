<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use softDeletes;
    protected $table = 'user_cart';
    protected $fillable = ["product_id", "user_id", "quantity"];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
