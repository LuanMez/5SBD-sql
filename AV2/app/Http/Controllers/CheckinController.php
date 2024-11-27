<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Passageiro;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function show(Passageiro $passageiro)
    {
        // Busca o checkin do passageiro através do código da passagem
        $checkin = $passageiro->checkinStatus();

        return view('checkins.show', compact('checkin'));
    }

    public function store(Request $request, Passageiro $passageiro)
    {
        // Criação de um novo check-in
        $request->validate([
            'codigo_checkin' => 'required',
            'status' => 'required',
            'data_hora' => 'required|date',
            'assento' => 'required',
        ]);

        $checkin = Checkin::create([
            'codigo_checkin' => $request->codigo_checkin,
            'status' => $request->status,
            'data_hora' => $request->data_hora,
            'assento' => $request->assento,
            'codigo_passagem' => $passageiro->codigo_passagem,
        ]);

        return redirect()->route('checkin.show', ['passageiro' => $passageiro]);
    }
}
