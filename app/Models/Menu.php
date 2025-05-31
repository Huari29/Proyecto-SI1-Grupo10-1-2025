<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Menu extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'codigo';
    protected $fillable = ['dia', 'precio', 'codigoProducto']; // Define los campos que pueden ser asignados masivamente.

    // Relación con producto
    public function producto():belongsTo
    {
        return $this->belongsTo(Producto::class, 'codigoProducto'); // Un menú pertenece a un producto.
    }
}
