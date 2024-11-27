<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    use HasFactory;

    // Definindo os campos que podem ser preenchidos
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

    // Relacionamento com a tabela Passagem
    public function passagem()
    {
        return $this->hasOne(Passagem::class, 'codigoPassagem', 'codigo_passagem');
    }

    // Método para verificar o status do check-in do passageiro
    public function checkinStatus()
    {
        // Obtém o código da passagem e retorna o status do checkin
        return $this->passagem->checkin()->first()->status ?? 'Sem Check-in';
    }
}
