<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Envio extends Model
{
    use HasFactory,SoftDeletes;
    
     protected $fillable = ['descripcion']; // Define los campos que pueden ser asignados masivamente.

    // Relación con nota_ventas
    public function notaVentas()
    {
        return $this->hasOne(NotaVenta::class, 'idEnvios');
    }
}
