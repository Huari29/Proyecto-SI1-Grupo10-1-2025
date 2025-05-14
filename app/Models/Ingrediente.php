<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ingrediente extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey = 'codigo'; // Define los campos que pueden ser asignados masivamente.
    public $incrementing = false;
    protected $keyType = 'unsignedBigInteger'; // o 'string' si es texto
    // Relación con item
    public function item()
    {
        return $this->belongsTo(Item::class, 'codigo','codigo'); // Un ingrediente pertenece a un item.
    }

    // Relación con productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'contienes', 'codigoIngredientes', 'codigoProductos'); // Un ingrediente puede estar en muchos productos.
    }
    
}
