<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigoPassagem',
        'classe',
        'preco',
        'data_compra',
        'status',
        'codigo_checkin',
    ];

    public function passageiro()
    {
        return $this->hasOne(Passageiro::class, 'codigo_passagem', 'codigoPassagem');
    }
}
