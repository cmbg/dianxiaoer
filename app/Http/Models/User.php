<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public $table = 'admin_users';
    public $primaryKey = 'uid';
    public $guarded = [];
    public $timestamps = false;
}
