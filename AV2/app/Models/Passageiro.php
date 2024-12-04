<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    use HasFactory;

    protected $table = 'passageiros';

    // Campos que podem ser preenchidos via métodos como create() ou update()
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'passaporte',
        'numero_assento',
        'status_checkin',
        'codigo_passagem',
        'codigo_voo',
    ];
}
