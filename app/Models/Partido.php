<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo; 

class Partido extends Model
{
    use HasFactory;
    protected $guarded = [];
    // Relación inversa con Equipo
    public function equipo_local(){
        return $this->belongsTo(Equipo::class, 'equipo_local');
    }
    //Relación inversa con Partido
    public function equipo_visitante() {
        return $this->belongsTo(Equipo::class,'equipo_visitante');
    }
}
