<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Address  extends Model
{
    //
     public $table = 'address';
    public $primaryKey = 'id';
    public $guarded = [];
    public $timestamps = false;
}
