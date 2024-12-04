<?php

namespace App\Http\Controllers;

use App\Models\Passageiro;
use Illuminate\Http\Request;

class PassageiroController extends Controller
{
    public function index()
    {
        return Passageiro::all();
    }

    public function store(Request $request)
    {
        // Valida os dados recebidos
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string',
            'data_nascimento' => 'required|date',
            'passaporte' => 'nullable|string',
            'numero_assento' => 'nullable|string',
            'status_checkin' => 'required|boolean',
            'codigo_passagem' => 'required|string',
            'codigo_voo' => 'required|integer',
        ]);

        // Verifica se já existe um passageiro com o mesmo CPF ou código de passagem
        $passageiroExistente = Passageiro::where('cpf', $validatedData['cpf'])
            ->orWhere('codigo_passagem', $validatedData['codigo_passagem'])
            ->first();

        if ($passageiroExistente) {
            return response()->json([
                'message' => 'Já existe um passageiro com este CPF ou código de passagem.'
            ], 400);
        }

        // Cria um novo passageiro
        $passageiro = Passageiro::create($validatedData);

        // Retorna o passageiro criado
        return response()->json($passageiro, 201);
    }


    public function update(Request $request, $id)
    {
        // Valida os dados recebidos
        $validatedData = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'cpf' => 'sometimes|required|string|unique:passageiros,cpf,' . $id, // Ignora o CPF do próprio registro
            'data_nascimento' => 'sometimes|required|date',
            'passaporte' => 'nullable|string',
            'numero_assento' => 'nullable|string',
            'status_checkin' => 'sometimes|required|boolean',
            'codigo_passagem' => 'sometimes|required|string',
            'codigo_voo' => 'sometimes|required|integer',
        ]);

        // Busca o passageiro pelo ID
        $passageiro = Passageiro::findOrFail($id);

        // Atualiza os dados do passageiro
        $passageiro->update($validatedData);

        // Retorna o registro atualizado
        return response()->json($passageiro);
    }


    public function destroy($id)
    {
        // Busca o passageiro pelo ID
        $passageiro = Passageiro::findOrFail($id);

        // Exclui o registro
        $passageiro->delete();

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Passageiro deletado com sucesso'], 204);
    }
}
