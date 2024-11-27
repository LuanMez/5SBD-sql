<?php

namespace App\Http\Controllers;

use App\Models\Passageiro;
use Illuminate\Http\Request;
use DB;

class PassageiroController extends Controller
{
    // Função para buscar passageiros de um voo específico
    public function buscarPassageiros(Request $request)
    {
        $codigo_voo = $request->input('codigo_voo');

        // Consulta a tabela 'passageiros' para encontrar os passageiros com o 'codigo_voo' específico
        $passageiros = DB::table('passageiros')
            ->where('codigo_voo', $codigo_voo)
            ->select('nome', 'cpf', 'numero_assento', 'status_checkin', 'id')
            ->get();

        // Retorna a view com a lista de passageiros
        return view('passageiros', compact('passageiros', 'codigo_voo'));
    }

    // Função para editar um passageiro
    public function editarPassageiro($id)
    {
        // Consulta o passageiro pelo id
        $passageiro = DB::table('passageiros')->where('id', $id)->first();

        // Retorna a view de edição com os dados do passageiro
        return view('editarPassageiro', compact('passageiro'));
    }

    // Função para atualizar os dados do passageiro
    public function atualizarPassageiro(Request $request, $id)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'numero_assento' => 'required|string|max:10',
            'status_checkin' => 'required|string|max:20',
            'passaporte' => 'required|string|max:20',
            'data_nascimento' => 'required|date',
            'codigo_passagem' => 'required|string|max:20',
        ]);

        // Verificando se o CPF já existe antes de atualizar
        $existeCpf = Passageiro::where('cpf', $request->cpf)
            ->where('id', '!=', $id) // Ignora o passageiro atual
            ->exists();
        if ($existeCpf) {
            return back()->withErrors(['cpf' => 'Já existe um passageiro com esse CPF.'])->withInput();
        }

        // Verificando se o código de passagem já existe antes de atualizar
        $existeCodigoPassagem = Passageiro::where('codigo_passagem', $request->codigo_passagem)
            ->where('id', '!=', $id) // Ignora o passageiro atual
            ->exists();
        if ($existeCodigoPassagem) {
            return back()->withErrors(['codigo_passagem' => 'Já existe um passageiro com esse código de passagem.'])->withInput();
        }

        // Atualiza os dados do passageiro
        DB::table('passageiros')
            ->where('id', $id)
            ->update([
                'nome' => $request->input('nome'),
                'cpf' => $request->input('cpf'),
                'numero_assento' => $request->input('numero_assento'),
                'status_checkin' => $request->input('status_checkin'),
                'passaporte' => $request->input('passaporte'),
                'data_nascimento' => $request->input('data_nascimento'),
                'codigo_passagem' => $request->input('codigo_passagem'),
            ]);

        // Redireciona para a página de passageiros com mensagem de sucesso
        return redirect('/passageiros')->with('success', 'Passageiro atualizado com sucesso!');
    }



    public function excluirPassageiro($id)
    {
        // Exclui o passageiro pelo ID
        DB::table('passageiros')->where('id', $id)->delete();

        // Redireciona para a lista de passageiros com uma mensagem de sucesso
        return redirect('/passageiros')->with('success', 'Passageiro excluído com sucesso!');
    }

    public function criar($codigo_voo)
    {
        return view('criar', ['codigo_voo' => $codigo_voo]);
    }

    // Salvar o novo passageiro no banco
    public function salvar(Request $request)
    {
        // Validação dos dados do formulário
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:passageiros,cpf',
            'data_nascimento' => 'required|date',
            'passaporte' => 'required|string|max:255',
            'numero_assento' => 'required|string|max:10',
            'status_checkin' => 'required|in:0,1',
            'codigo_passagem' => 'required|string|max:255|unique:passageiros,codigo_passagem',
            'codigo_voo' => 'required|string|max:255',
        ], [
            'cpf.unique' => 'Já existe um passageiro com esse CPF.', // Mensagem personalizada para CPF
            'codigo_passagem.unique' => 'Já existe um passageiro com esse código de passagem.' // Mensagem personalizada para código_passagem
        ]);

        // Verificando se o CPF já existe antes de salvar
        $existeCpf = Passageiro::where('cpf', $request->cpf)->exists();
        if ($existeCpf) {
            return back()->withErrors(['cpf' => 'Já existe um passageiro com esse CPF.'])->withInput();
        }

        // Verificando se o código de passagem já existe antes de salvar
        $existeCodigoPassagem = Passageiro::where('codigo_passagem', $request->codigo_passagem)->exists();
        if ($existeCodigoPassagem) {
            return back()->withErrors(['codigo_passagem' => 'Já existe um passageiro com esse código de passagem.'])->withInput();
        }

        // Criação do novo passageiro
        Passageiro::create($dados);

        return redirect("/passageiros/{$dados['codigo_voo']}")->with('success', 'Passageiro criado com sucesso!');
    }




    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'data_nascimento' => 'required|date',
            'passaporte' => 'required|string|max:255',
            'numero_assento' => 'required|string|max:10',
            'status_checkin' => 'required|in:0,1', // 0 ou 1
            'codigo_passagem' => 'required|string|max:255',
            'codigo_voo' => 'required|string|max:255',
        ]);

        // Cria o passageiro no banco de dados
        Passageiro::create($dados);

        // Redireciona para a página de passageiros do voo
        return redirect("/passageiros/{$dados['codigo_voo']}")->with('success', 'Passageiro criado com sucesso!');
    }


    public function index($codigo_voo)
    {
        // Aqui você pega os passageiros do voo com o código $codigo_voo
        $passageiros = Passageiro::where('codigo_voo', $codigo_voo)->get();

        return view('passageiros', compact('passageiros', 'codigo_voo'));
    }
}
