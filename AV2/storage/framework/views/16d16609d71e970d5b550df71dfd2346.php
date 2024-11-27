<!-- resources/views/editarPassageiro.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Passageiro</title>
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

        input {
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

        .success {
            color: green;
            font-size: 1rem;
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

            input, button {
                font-size: 1rem;
            }
        }

    </style>
</head>
<body>
    <h1>Editar Passageiro</h1>

    <?php if(session('success')): ?>
        <p class="success"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <form action="/passageiros/editar/<?php echo e($passageiro->id); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo e($passageiro->nome); ?>" required>
        </div>

        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="<?php echo e($passageiro->cpf); ?>" required>
        </div>

        <div>
            <label for="numero_assento">Número do Assento:</label>
            <input type="text" id="numero_assento" name="numero_assento" value="<?php echo e($passageiro->numero_assento); ?>" required>
        </div>

        <div>
            <label for="status_checkin">Status do Check-in:</label>
            <input type="text" id="status_checkin" name="status_checkin" value="<?php echo e($passageiro->status_checkin); ?>" required>
        </div>

        <div>
            <label for="passaporte">Passaporte:</label>
            <input type="text" id="passaporte" name="passaporte" value="<?php echo e($passageiro->passaporte); ?>" required>
        </div>

        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo e($passageiro->data_nascimento); ?>" required>
        </div>

        <div>
            <label for="codigo_passagem">Código da Passagem:</label>
            <input type="text" id="codigo_passagem" name="codigo_passagem" value="<?php echo e($passageiro->codigo_passagem); ?>" required>
        </div>

        <button type="submit">Salvar Alterações</button>
    </form>

    <div class="form-buttons">
        <a href="/passageiros">
            <button>Voltar</button>
        </a>
    </div>

    <!-- Exibindo erro do CPF -->
    <?php if($errors->has('cpf')): ?>
    <div class="error">
        <strong><?php echo e($errors->first('cpf')); ?></strong>
    </div>
    <?php endif; ?>

    <!-- Exibindo erro do Código da Passagem -->
    <?php if($errors->has('codigo_passagem')): ?>
    <div class="error">
        <strong><?php echo e($errors->first('codigo_passagem')); ?></strong>
    </div>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\Luanm\aeroporto\resources\views/editarPassageiro.blade.php ENDPATH**/ ?>