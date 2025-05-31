<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Mesa extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'nro';
     // No se necesita especificar la tabla ya que 'mesas' es el nombre por defecto en plural.
    protected $fillable = ['nro', 'capacidad']; // Define los campos que pueden ser asignados masivamente.

    // Relación con nota_ventas
    public function notaVentas():HasMany
    {
        return $this->hasMany(NotaVenta::class, 'nroMesa');
    }
}
