<?php
$host = 'localhost';
$dbname = 'Produtos';
$user = 'root'; 
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Função para inserir produto
function inserirProduto($pdo, $nome, $valor) {
    $sql = "INSERT INTO produtos (nome, valor) VALUES (:nome, :valor)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':valor', $valor);
    if ($stmt->execute()) {
        echo "Produto inserido com sucesso!<br>";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    } else {
        echo "Erro ao inserir o produto.<br>";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    }
}

// Função para consultar produtos
function consultarProdutos($pdo) {
    $sql = "SELECT * FROM produtos";
    $stmt = $pdo->query($sql);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($produtos) {
        foreach ($produtos as $produto) {
            echo "ID: " . $produto['id'] . " | Nome: " . $produto['nome'] . " | Valor: " . $produto['valor'] . "<br>";
        }
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    } else {
        echo "Nenhum produto encontrado.";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    }
}

// Função para modificar um produto
function modificarProduto($pdo, $id, $nome, $valor) {
    $sql = "UPDATE produtos SET nome = :nome, valor = :valor WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':valor', $valor);
    if ($stmt->execute()) {
        echo "Produto atualizado com sucesso!<br>";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    } else {
        echo "Erro ao atualizar o produto.<br>";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    }
}

// Função para remover um produto
function removerProduto($pdo, $id) {
    $sql = "DELETE FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        echo "Produto removido com sucesso!";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    } else {
        echo "Erro ao remover o produto.";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    }
}

// Verifica a ação do usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    
    switch ($action) {
        case 'Inserir':
            // Exibe formulário de inserção
            echo '
                <form method="POST" action="crud_produto.php">
                    Nome: <input type="text" name="nome"><br>
                    Valor: <input type="text" name="valor"><br>
                    <input type="submit" name="action" value="Salvar">
                </form>
            ';
            break;
        case 'Salvar':
            // Insere produto
            if (isset($_POST['nome']) && isset($_POST['valor'])) {
                inserirProduto($pdo, $_POST['nome'], $_POST['valor']);
            }
            break;
        case 'Consultar':
            // Consulta e exibe produtos
            consultarProdutos($pdo);
            break;
        case 'Modificar':
            // Exibe formulário de modificação
            echo '
                <form method="POST" action="crud_produto.php">
                    ID do produto: <input type="text" name="id"><br>
                    Novo Nome: <input type="text" name="nome"><br>
                    Novo Valor: <input type="text" name="valor"><br>
                    <input type="submit" name="action" value="Atualizar">
                </form>
            ';
            // Exibindo a consulta
            consultarProdutos($pdo);
            break;
        case 'Atualizar':
            // Modifica produto
            if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['valor'])) {
                modificarProduto($pdo, $_POST['id'], $_POST['nome'], $_POST['valor']);
            }
            break;
        case 'Remover':
            // Exibe formulário de remoção
            echo '
                <form method="POST" action="crud_produto.php">
                    ID do produto: <input type="text" name="id"><br>
                    <input type="submit" name="action" value="Deletar">
                </form>
            ';
            // Exibindo a consulta
            consultarProdutos($pdo);
            break;
        case 'Deletar':
            // Remove produto
            if (isset($_POST['id'])) {
                removerProduto($pdo, $_POST['id']);
            }
            break;
    }
}
?>
