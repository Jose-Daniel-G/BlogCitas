<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $fillable = [
        'paciente_id',
        'doctor_id',
        'fecha_pago',
        'monto',
        'descripcion',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
