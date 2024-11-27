<!-- resources/views/passageiros.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passageiros do Voo {{ $codigo_voo }}</title>
    <style>
        /* Resetando margens e padding padrão */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            transform: scale(1.05);
        }

        button:focus {
            outline: none;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .btn-container a {
            text-decoration: none;
            margin: 0 10px;
        }

        .btn-container button {
            background-color: #4CAF50;
            color: white;
        }

        .btn-container a:last-child button {
            background-color: #007BFF;
        }

        .btn-container form button {
            background-color: #f44336;
            color: white;
        }

        /* Mensagem de vazio quando não há passageiros */
        p {
            font-size: 1.2rem;
            color: #666;
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <h1>Passageiros do Voo {{ $codigo_voo }}</h1>

    @if($passageiros->isEmpty())
        <p>Não há passageiros para o voo de código {{ $codigo_voo }}.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Número do Assento</th>
                    <th>Status do Check-in</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($passageiros as $passageiro)
                    <tr>
                        <td>{{ $passageiro->nome }}</td>
                        <td>{{ $passageiro->cpf }}</td>
                        <td>{{ $passageiro->numero_assento }}</td>
                        <td>{{ $passageiro->status_checkin }}</td>
                        <td>
                            <!-- Link para editar o passageiro -->
                            <a href="/passageiros/editar/{{ $passageiro->id }}">
                                <button>Editar</button>
                            </a>
                            <!-- Botão para excluir o passageiro -->
                            <form action="/passageiros/excluir/{{ $passageiro->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este passageiro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Botões para ações -->
    <div class="btn-container">
        <!-- Botão para criar um novo passageiro -->
        <a href="/passageiros/criar/{{ $codigo_voo }}">
            <button>Criar Novo Passageiro</button>
        </a>

        <!-- Botão para voltar ao index -->
        <a href="/">
            <button>Voltar</button>
        </a>
    </div>
</body>
</html>
