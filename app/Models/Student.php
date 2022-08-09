<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification',
        'name',
        'surname',
        'email',
        'phone',
        'birthdate',
        'address',
    ];
}
