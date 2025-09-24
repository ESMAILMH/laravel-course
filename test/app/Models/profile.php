<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'birthdate',
        'bio',
    ];
}
