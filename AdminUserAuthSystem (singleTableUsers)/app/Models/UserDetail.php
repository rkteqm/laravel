<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table =  'user_details';
    protected $primaryKey =  'id';

    // function user()
    // {
    //     return $this->hasOne('App\Models\User', 'id', 'user_id');
    // }
}
