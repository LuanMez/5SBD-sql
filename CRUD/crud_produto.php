<?php
// Carrega as dependências instaladas pelo Composer
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

// Inicializa o Eloquent ORM e configura a conexão com o banco de dados
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'Produtos',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Configura o Eloquent ORM como global e inicializa
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Define o modelo Produto que representa a tabela "produtos"
class Produto extends Model {
    protected $table = 'produtos'; // Nome da tabela no banco de dados
    public $timestamps = false;    // Desativa o controle de timestamps (created_at, updated_at)
    protected $fillable = ['nome', 'valor']; // Campos que podem ser preenchidos em massa
}

// Função para inserir produto
function inserirProduto($nome, $valor) {
    $produto = Produto::create([
        'nome' => $nome,
        'valor' => $valor,
    ]);
    if ($produto) {
        echo "Produto inserido com sucesso!<br>";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    } else {
        echo "Erro ao inserir o produto.<br>";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    }
}

// Função para consultar produtos
function consultarProdutos() {
    $produtos = Produto::all(); // Pega todos os produtos da tabela
    if ($produtos->count() > 0) {
        foreach ($produtos as $produto) {
            echo "ID: " . $produto->id . " | Nome: " . $produto->nome . " | Valor: " . $produto->valor . "<br>";
        }
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    } else {
        echo "Nenhum produto encontrado.<br>";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    }
}

// Função para modificar um produto
function modificarProduto($id, $nome, $valor) {
    $produto = Produto::find($id);
    if ($produto) {
        $produto->nome = $nome;
        $produto->valor = $valor;
        $produto->save();
        echo "Produto atualizado com sucesso!<br>";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    } else {
        echo "Erro ao atualizar o produto.<br>";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    }
}

// Função para remover um produto
function removerProduto($id) {
    $produto = Produto::find($id);
    if ($produto) {
        $produto->delete();
        echo "Produto removido com sucesso!<br>";
        echo '<a href="index.html"><button>Voltar à página inicial</button></a>';
    } else {
        echo "Erro ao remover o produto.<br>";
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
                inserirProduto($_POST['nome'], $_POST['valor']);
            }
            break;
        case 'Consultar':
            // Consulta e exibe produtos
            consultarProdutos();
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
            // Lista produtos para facilitar a escolha
            consultarProdutos();
            break;
        case 'Atualizar':
            // Modifica produto
            if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['valor'])) {
                modificarProduto($_POST['id'], $_POST['nome'], $_POST['valor']);
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
            // Lista produtos para facilitar a escolha
            consultarProdutos();
            break;
        case 'Deletar':
            // Remove produto
            if (isset($_POST['id'])) {
                removerProduto($_POST['id']);
            }
            break;
    }
}
?>
