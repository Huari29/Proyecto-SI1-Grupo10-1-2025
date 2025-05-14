<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class NotaSalida extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'codigo';
    protected $fillable = ['cantidad', 'fechaHora', 'codigoItem']; // Define los campos que pueden ser asignados masivamente.

    // Relación con item
    public function item()
    {
        return $this->belongsTo(Item::class, 'codigoItem',"codigo"); // Una nota de salida pertenece a un item.
    }
}
