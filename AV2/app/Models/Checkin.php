<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_checkin',
        'status',
        'data_hora',
        'assento',
        'codigo_passagem',
    ];

    // Relacionamento com a tabela Passagem
    public function passagem()
    {
        return $this->belongsTo(Passagem::class, 'codigo_passagem', 'codigoPassagem');
    }
}
