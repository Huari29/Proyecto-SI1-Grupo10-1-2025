<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EstadoOrden extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = ['estado']; // Define los campos que pueden ser asignados masivamente.

    public function ordens():HasMany
    {
        return $this->hasMany(Orden::class, 'idEstadoOrden');
    }
}
