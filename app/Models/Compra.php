<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Compra extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'compras';

    protected $primaryKey = 'nro';
    
    protected $fillable = ['costo', 'cantidad','IdNotaCompra']; // Define los campos que pueden ser asignados masivamente.

    // Relación con nota_compra
    public function notaCompra():BelongsTo
    {
        return $this->belongsTo(NotaCompra::class, 'IdNotaCompra'); // Una compra pertenece a una nota de compra.
    }

}
