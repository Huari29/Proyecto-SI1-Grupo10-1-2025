<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sabor extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['descripcion']; // Define los campos que pueden ser asignados masivamente.

    // Relación con productos
    public function productos():HasMany
    {
        return $this->hasMany(Producto::class, 'idSabor'); // Un sabor puede estar en muchos productos.
    }
}
