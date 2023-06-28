<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $table = 'passenger';

    protected $fillable= [
        'name',
        'email',
        'phone',
        'image',


    ];

}
