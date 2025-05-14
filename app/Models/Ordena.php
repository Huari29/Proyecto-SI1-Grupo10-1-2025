<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ordena extends Model
{
    use HasFactory,SoftDeletes;

    // Desactivamos el autoincremento y clave primaria única
    public $incrementing = false;
    protected $primaryKey = null; // Laravel ignora esto cuando usamos clave compuesta

    protected $table = 'ordenas';

    protected $fillable = [
        'nroOrdens',
        'codigoProductos',
        'cantidad',
        'precio'
    ];

    // Relaciones
    public function orden()
    {
        return $this->belongsTo(Orden::class, 'nroOrdens', 'nro');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'codigoProductos', 'codigo');
    }
}
