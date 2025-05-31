<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contiene extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = ['codigoProducto','codigoIngrediente'];
    public $incrementing = false;
    protected $fillable = ['codigoProducto','codigoIngrediente','cantidad', 'unidad']; // Define los campos que pueden ser asignados masivamente.

    // Relación con producto
    public function producto():BelongsTo
    {
        return $this->belongsTo(Producto::class, 'codigoProducto'); // Una contiene pertenece a un producto.
    }

    // Relación con ingrediente
    public function ingrediente():BelongsTo
    {
        return $this->belongsTo(Ingrediente::class, 'codigoIngrediente'); // Una contiene pertenece a un ingrediente.
    }
}
