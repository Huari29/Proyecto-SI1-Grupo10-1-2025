<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class NotaVenta extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = ['tipoPago', 'pagado', 'fechaHora', 'total', 'nroMesa', 'idEnvios'];

    // Relación con mesa
    public function mesa():BelongsTo
    {
        return $this->belongsTo(Mesa::class, 'nroMesa');
    }

    // Relación con envio
    public function envio():BelongsTo
    {
        return $this->belongsTo(Envio::class, 'idEnvios');
    }

    // Relación con factura
    public function factura():HasOne
    {
        return $this->hasOne(Factura::class, 'idNotaVenta');
    }
}
