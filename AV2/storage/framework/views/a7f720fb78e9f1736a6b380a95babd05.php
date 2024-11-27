<!-- resources/views/editar.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Passageiro</title>
</head>
<body>
    <h1>Editar Passageiro</h1>

    <!-- Formulário para atualizar o passageiro -->
    <form action="<?php echo e(url('/passageiros/' . $id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> <!-- Usado para enviar uma requisição PUT -->

        <!-- Aqui você vai colocar os campos de entrada para o passageiro -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required>
        
        <label for="numero_assento">Número do Assento:</label>
        <input type="text" name="numero_assento" id="numero_assento" required>
        
        <label for="status_checkin">Status do Check-in:</label>
        <input type="checkbox" name="status_checkin" id="status_checkin">
        
        <label for="codigo_voo">Código do Voo:</label>
        <input type="number" name="codigo_voo" id="codigo_voo" required>
        
        <button type="submit">Atualizar Passageiro</button>
    </form>
</body>
</html>
<?php /**PATH C:\Users\Luanm\aeroporto\resources\views/editar.blade.php ENDPATH**/ ?>