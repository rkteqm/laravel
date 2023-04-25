<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use HasFactory;
    protected $table =  'user_details';
    protected $primaryKey =  'id';

    protected $fillable = [
        'user_id',
        'profile_pic',
        'gender',
        'dob',
        'address',
        'city',
        'state',
        'country',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
