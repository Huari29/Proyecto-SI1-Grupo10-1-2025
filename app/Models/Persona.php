<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Persona extends Model
{
    use HasFactory,SoftDeletes;
    
    // Laravel por defecto usa 'personas' como nombre de la tabla (plural de 'Persona')
    // protected $table = 'personas'; // No es necesario ya que Laravel usa 'personas'.

    protected $fillable = ['carnet', 'nombre']; // Define los campos que pueden ser asignados masivamente.

    // Relaciones
    public function empleados()
    {
        return $this->hasOne(Empleado::class, 'id');
    }

    public function clientes()
    {
        return $this->hasOne(Cliente::class, 'id');
    }

    public function telefonos()
    {
        return $this->hasMany(Telefono::class, 'idPersona');
    }

    public function emails()
    {
        return $this->hasMany(Email::class, 'idPersona');
    }
}
