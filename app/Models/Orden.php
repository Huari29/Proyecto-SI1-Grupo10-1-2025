<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Orden extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'nro';
    protected $fillable = ['fechaOrden', 'subTotal', 'idCliente', 'idEmpleado', 'idEstadoOrden'];

    // Relación con cliente
    public function cliente():BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    // Relación con empleado
    public function empleado():BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }

    // Relación con estado_orden
    public function estadoOrden():BelongsTo
    {
        return $this->belongsTo(EstadoOrden::class, 'idEstadoOrden');
    }

    public function productos():BelongsToMany
    {
        return $this->belongsToMany(Producto::class,"ordenas","nroOrdens","codigoProductos");
    }

    public function notaVenta():BelongsTo
    {
        return $this->belongsTo(NotaVenta::class, 'idNotaVenta'); // Una compra pertenece a una nota de compra.
    }
}
