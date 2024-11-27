<!-- resources/views/formulario.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Passageiros</title>
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin-top: 20px;
        }

        label {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #555;
            display: block;
        }

        input[type="number"] {
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
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        button:focus {
            outline: none;
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

            input[type="number"], button {
                font-size: 1rem;
            }
        }

    </style>
</head>
<body>
    <h1>Digite o Código do Voo para Buscar os Passageiros</h1>

    <!-- Formulário para buscar passageiros -->
    <form action="/passageiros" method="POST">
        <?php echo csrf_field(); ?>
        <label for="codigo_voo">Código do Voo:</label>
        <input type="number" name="codigo_voo" id="codigo_voo" required>
        <button type="submit">Buscar Passageiros</button>
    </form>
</body>
</html>
<?php /**PATH C:\Users\Luanm\aeroporto\resources\views/formulario.blade.php ENDPATH**/ ?>