<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // buat mass assigment
    protected $fillable =
    [
        'image',
        'name',
        'email',
        'password'
    ];
}
