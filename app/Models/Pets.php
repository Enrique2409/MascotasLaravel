<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    protected $table = 'pets';
    protected $fillable = [
        'name',
        'type',
        'description',
        'age',
        'image'
    ];
}