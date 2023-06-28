<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passengers extends Model
{
    use HasFactory;
    protected $table = 'passengers';

    protected $fillable= [
        'name',
        'contact',
        'image',


    ];


}
