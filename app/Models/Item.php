<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Item extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['codigo', 'nombre', 'disponibilidad', 'cantidad']; // Define los campos que pueden ser asignados masivamente.

    // Relación con productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'codigo'); // Un item puede estar en muchos productos.
    }

    // Relación con ingredientes
    public function ingredientes()
    {
        return $this->hasMany(Ingresiente::class, 'codigo'); // Un item puede estar en muchos ingredientes.
    }

    // Relación con nota_salidas
    public function notaSalidas()
    {
        return $this->hasMany(NotaSalida::class, 'codigoItem');
    }
}
