<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Telefono extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['nroTelefono', 'idPersona']; // Define los campos que pueden ser asignados masivamente.

    // Relación con persona
    public function persona():BelongsTo
    {
        return $this->belongsTo(Persona::class, 'idPersona'); // Un teléfono pertenece a una persona.
    }
}
