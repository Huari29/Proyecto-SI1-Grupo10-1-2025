<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tipo extends Model
{
    use HasFactory,SoftDeletes;

     // Si la tabla no sigue la convención de Laravel (plural del modelo), debes definirla.
    // Laravel buscaría 'tipos', que sí coincide, así que podrías omitir esto.
    // protected $table = 'tipos'; // No necesario aquí porque el nombre sigue la convención.

    // Laravel asume que la clave primaria se llama 'id', pero aquí se llama 'codigo'
    protected $primaryKey = 'codigo';

    // Si 'codigo' no es auto-incremental, agrega esta línea (pero en tu migración sí lo es, así que no hace falta)
    // public $incrementing = false;

    // Los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'descripcion',
    ];

    // Relación: Un tipo puede tener muchos productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'codigoTipo');
    }
}
