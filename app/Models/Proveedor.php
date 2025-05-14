<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'codigo';
    protected $fillable = ['descripcion', 'telefono', 'ubicacion']; // Define los campos que pueden ser asignados masivamente.
}
