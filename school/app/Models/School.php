<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $table =  'schools';
    protected $primaryKey =  'id';

    protected $fillable = [
        'user_id',
        'logo',
        'name',
        'email',
        'password',
        'type',
        'city',
        'description',
    ];
}
