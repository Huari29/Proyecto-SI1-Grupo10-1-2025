<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Email extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['email', 'idPersona']; // Define los campos que pueden ser asignados masivamente.

    // Relación con persona
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'idPersona'); // Un email pertenece a una persona.
    }
}
