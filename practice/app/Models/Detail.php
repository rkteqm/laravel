<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table =  'details';
    protected $primaryKey =  'id';

    function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
