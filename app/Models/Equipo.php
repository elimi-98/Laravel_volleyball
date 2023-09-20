<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    // Relacion inversa con User
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    // Relacion uno a muchos Equipo-Partido
    public function partidos(){
        return $this->hasMany(Equipo::class, 'equipo_local');
    }
    public function rival(){
        return $this->hasMany(Equipo::class, 'equipo_visitante');
    }
}
