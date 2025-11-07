<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payment";

    protected $fillable = ["user_id","md5_hash","amount","status"];
}
