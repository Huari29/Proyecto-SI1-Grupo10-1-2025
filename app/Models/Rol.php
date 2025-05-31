<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rol extends Model
{
    use HasFactory,SoftDeletes;
    // Si no se necesita especificar el nombre de la tabla, Laravel lo hace automáticamente
    // con el plural del nombre del modelo. Así que no es necesario declarar '$table'.
    // protected $table = 'rols'; // No es necesario porque Laravel usa 'rols' por convención.

    protected $fillable = ['descripcion']; // Define los campos que pueden ser asignados masivamente.

    public function users():HasMany
    {
        return $this->hasMany(User::class, 'idRol'); // Un producto tiene un sabor.
    }

    // Esta tabla no tiene claves foráneas, solo tiene 'id' que es clave primaria por defecto.
}
