<?php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passageiro; // Modelo do Passageiro

class PassagemController extends Controller
{
    public function obterTodosPassageirosVoo($codigo_voo)
    {
        // Obter todos os passageiros do voo usando Eloquent (relacionamento entre Passagem e Passageiro)
        $passageiros = Passageiro::whereHas('passagem', function ($query) use ($codigo_voo) {
            $query->where('codigo_voo', $codigo_voo);
        })->get();

        // Retornar os passageiros para a view
        return view('passageiros.index', compact('passageiros'));
    }
}

