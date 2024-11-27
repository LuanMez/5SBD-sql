<!-- resources/views/criar.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Passageiro</title>
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
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-top: 20px;
            text-align: left;
        }

        label {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #555;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        button:focus {
            outline: none;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-buttons a {
            text-decoration: none;
            width: 100%;
        }

        .form-buttons button {
            width: 100%;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: 10px;
        }

        /* Estilo responsivo */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            form {
                padding: 15px;
                width: 90%;
            }

            input, select, button {
                font-size: 1rem;
            }
        }

    </style>
</head>
<body>
    <h1>Criar Novo Passageiro para o Voo {{ $codigo_voo }}</h1>

    <form action="/passageiros/salvar" method="POST">
        @csrf
        <input type="hidden" name="codigo_voo" value="{{ $codigo_voo }}">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br>

        <label for="passaporte">Passaporte:</label>
        <input type="text" id="passaporte" name="passaporte" required><br>

        <label for="numero_assento">Número do Assento:</label>
        <input type="text" id="numero_assento" name="numero_assento" required><br>

        <label for="status_checkin">Status do Check-in:</label>
        <select id="status_checkin" name="status_checkin" required>
            <option value="0">Pendente</option>
            <option value="1">Confirmado</option>
        </select>

        <label for="codigo_passagem">Código da Passagem:</label>
        <input type="text" id="codigo_passagem" name="codigo_passagem" required><br>

        <button type="submit">Criar Passageiro</button>
    </form>

    <div class="form-buttons">
        <a href="/passageiros/{{ $codigo_voo }}">
            <button>Voltar</button>
        </a>
    </div>

    <!-- Exibindo erro do CPF -->
    @if ($errors->has('cpf'))
    <div class="error">
        <strong>{{ $errors->first('cpf') }}</strong>
    </div>
    @endif

    <!-- Exibindo erro do Código da Passagem -->
    @if ($errors->has('codigo_passagem'))
    <div class="error">
        <strong>{{ $errors->first('codigo_passagem') }}</strong>
    </div>
    @endif
</body>
</html>
