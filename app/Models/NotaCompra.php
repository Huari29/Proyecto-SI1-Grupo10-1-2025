<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class NotaCompra extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'nota_compras';

    protected $fillable = ['fechaHora', 'total', 'codigoProveedor']; // Define los campos que pueden ser asignados masivamente.
    
    public function compras()
    {
        return $this->hasMany(Compra::class, 'IdNotaCompra');
    }

    // Relación con proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'codigoProveedor'); // Una nota de compra pertenece a un proveedor.
    }
}
