<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Producto extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'codigo'; // Define los campos que pueden ser asignados masivamente.
    public $incrementing = false;
    protected $keyType = 'unsignedBigInteger'; // o 'string' si es texto

    protected $fillable = ['codigo', 'precio', 'codigoTipo', 'idSabor']; // Define los campos que pueden ser asignados masivamente.

    // Relación con item
    public function item()
    {
        return $this->belongsTo(Item::class, 'codigo'); // Un producto pertenece a un item.
    }

    // Relación con tipo
    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'codigoTipo'); // Un producto pertenece a un tipo.
    }

    // Relación con sabor
    public function sabor()
    {
        return $this->belongsTo(Sabor::class, 'idSabor'); // Un producto tiene un sabor.
    }
    //relacion de muchos a muchos
    public function ordens()
    {
        /*
        1ro clase del modelo relacionado
        2da nombre de la tabla pivote intermedia
        3ra fk de esta clase que se encuentra en la clase intermedia
        4ta fk del otro modelo relacionado
        */

        return $this->belongsToMany(Orden::class, 'ordenas',"codigoProductos","nroOrdens"); // Un producto puede estar en muchas ordenes.
    }

    // Relación con menus
    public function menus()
    {
        return $this->hasMany(Menu::class, 'codigoProducto'); // Un producto puede estar en muchos menús.
    }

     public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'contienes',"codigoProductos","codigoIngredientes"); // Un producto puede estar en muchas ordenes.
    }

}
