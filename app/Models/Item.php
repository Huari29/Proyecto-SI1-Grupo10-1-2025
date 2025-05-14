<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Item extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'codigo'; // Define los campos que pueden ser asignados masivamente.
    protected $fillable = ['nombre', 'disponibilidad', 'cantidad']; // Define los campos que pueden ser asignados masivamente.

    // Relación con productos
    public function productos()
    {
        return $this->hasOne(Producto::class, 'codigo','codigo'); // Un item puede estar en muchos productos.
    }

    // Relación con ingredientes
    public function ingredientes()
    {
        return $this->hasOne(Ingresiente::class, 'codigo','codigo'); // Un item puede estar en muchos ingredientes.
    }

    // Relación con nota_salidas
    public function notaSalidas()
    {
        return $this->hasMany(NotaSalida::class, 'codigoItem','codigo');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'codigoItem','codigo');
    }
}
