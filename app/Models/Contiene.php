<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contiene extends Model
{
    use HasFactory,SoftDeletes;
    public $incrementing = false;
    protected $primaryKey = null; // Laravel ignora esto cuando usamos clave compuesta
    protected $fillable = ['codigoProducto', 'codigoIngrediente', 'cantidad', 'unidad']; // Define los campos que pueden ser asignados masivamente.

    // Relación con producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'codigoProducto'); // Una contiene pertenece a un producto.
    }

    // Relación con ingrediente
    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class, 'codigoIngrediente'); // Una contiene pertenece a un ingrediente.
    }
}
