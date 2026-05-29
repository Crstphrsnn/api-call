<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Columns that are allowed to be saved via POST or PUT
    protected $fillable = [
        'name',
        'email',
        'course',
    ];
}
