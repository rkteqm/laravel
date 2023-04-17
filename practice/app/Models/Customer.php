<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table =  'customers';
    protected $primaryKey =  'id';

    // mutator for set attribute
    // This is mutator for auto-capitalalize the first letter of country example "india"->"India"
    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = ucwords($value);
    }
    
    // accessor for get attribute to modify data while accesing time
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    // accessor for get attribute to modify data while accesing time
    // public function getDobAttribute($value)
    // {
    //     return date("d-M-Y", strtotime($value));
    // }
}
