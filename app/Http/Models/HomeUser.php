<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class HomeUser extends Model
{
    //
    public $table = 'home_users';
    public $primaryKey = 'uid';
    public $guarded = [];
    public $timestamps = false;
}

