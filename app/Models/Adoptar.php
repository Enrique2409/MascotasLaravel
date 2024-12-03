<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoptar extends Model
{
    protected $table = 'adoptars';
    protected $fillable = ['nombre', 'email', 'telefono', 'direccion', 'mensaje', 'id_mascota'];
    protected $primaryKey = 'id';
    protected $foreignKey = 'id_mascota';

    public $timestamps = false;

    public function pet()
    {
        return $this->belongsTo(Pets::class, 'id_mascota', 'id');
    }
}

