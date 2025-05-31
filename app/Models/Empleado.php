<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Empleado extends Model
{
    use HasFactory,SoftDeletes;

    // No es necesario declarar '$table' ya que Laravel lo infiere automáticamente
    // de la convención de plural del modelo, es decir, 'empleados'.
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInteger'; // o 'string' si es texto
    protected $fillable = ['id', 'direccion']; // Define los campos que pueden ser asignados masivamente.

    // Relación con persona
    public function persona():BelongsTo
    {
        return $this->belongsTo(Persona::class, 'id');
    }

    // Relación con usuario
    public function user():HasMany
    {
        return $this->hasMany(User::class, 'idEmpleado');
    }

    // Relación con órdenes
    public function ordens():HasMany
    {
        return $this->hasMany(Orden::class, 'idEmpleado');
    }
}
