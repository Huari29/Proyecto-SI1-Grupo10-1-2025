<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Factura extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'codigoControl';
    protected $fillable = ['monto', 'fechaHora', 'idNotaVenta']; // Define los campos que pueden ser asignados masivamente.

    // Relación con nota_venta
    public function notaVenta()
    {
        return $this->belongsTo(NotaVenta::class, 'idNotaVenta');
    }
}
