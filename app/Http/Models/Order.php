<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    //
    public $table = 'order';
    public $primaryKey = 'oid';
    public $guarded = [];
    public $timestamps = false;
}
