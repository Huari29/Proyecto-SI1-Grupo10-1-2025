<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cliente extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = 'unsignedBigInteger'; // o 'string' si es texto

    protected $fillable = ['codigo']; // Solo la clave primaria, ya que la relación es con 'personas'.

    // Relación con persona
    public function persona():BelongsTo
    {
        return $this->belongsTo(Persona::class, 'id','id');
    }

    // Relación con órdenes
    public function ordens():HasMany
    {
        return $this->hasMany(Orden::class, 'idCliente','id');
    }
}
