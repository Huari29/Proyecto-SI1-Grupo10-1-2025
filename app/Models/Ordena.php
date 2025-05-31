<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ordena extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey = ['nroOrden', 'codigoProducto'];

    // Desactivamos el autoincremento y clave primaria única
    public $incrementing = false; // Porque la PK es compuesta
    
    protected $table = 'ordenas';

    protected $fillable = [
        'nroOrdens',
        'codigoProductos',
        'cantidad',
        'precio'
    ];

    // Relaciones
    public function orden():BelongsTo
    {
        return $this->belongsTo(Orden::class, 'nroOrdens', 'nro');
    }

    public function producto():BelongsTo
    {
        return $this->belongsTo(Producto::class, 'codigoProductos', 'codigo');
    }
}
