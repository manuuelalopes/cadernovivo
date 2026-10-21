<?php 
require_once  __DIR__ . '/../database/conect.php';
//CADASTRAR PRODUTOS
function cadastrar_produto($conexao,$nome_produto,$preco,$data_validade,$descricao,$quantidade_estoq,$imagem_url){
         $sql = "INSERT INTO produtos (nome_produto, preco, data_validade, descricao, quantidade_estoq, imagem_url) VALUES (:nome_produto, :preco, :data_validade, :descricao, :quantidade_estoq, :imagem_url)";

        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":nome_produto", $nome_produto);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindParam(":data_validade", $data_validade);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":quantidade_estoq", $quantidade_estoq);
            $stmt->bindParam(":imagem_url", $imagem_url);
            $stmt->execute();
            echo "Produto adicionado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
 }
 
//DELETA PRODUTO
function apagar ($conexao, $id){
        $sql = "DELETE FROM produtos WHERE id = :id";
        try{
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo "Produto $id removido com sucesso! ";
        } catch (PDOException $e){
            echo"Erro: " .$e->getMessage(); 
        }
        };


//CONSULTAR PRODUTO 
function consultar($conexao, $id){

$sql = "SELECT nome_produto, preco, data_validade, descricao, quantidade_estoq, imagem_url FROM produtos WHERE id = :id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt ->bindParam(":id", $id);
        $stmt->execute();

        $produtos =$stmt->fetch (PDO::FETCH_ASSOC);
        echo"Nome do produto: {$produtos['nome_produto']} <br>";
        echo"Preço: {$produtos['preco']} <br>";
        echo"data_validade: {$produtos['data_validade']} <br>";
        echo"descricao: {$produtos['descricao']} <br>";
        echo"quantidade_estoq: {$produtos['quantidade_estoq']} <br>";
        $img = $produtos['imagem_url'];
        echo"<img src='$img' alt='Descrição da imagem' width=200px height=200px /><br>";
        echo "<hr>";
        } catch (PDOException $e){
            echo"Erro: " .$e->getMessage(); 
        }
     }

//ATUALIZAR PRODUTO 

function atualizar($conexao, $id,$nome_produto,$preco,$data_validade,$descricao,$quantidade_estoq,$imagem_url){
         $sql = "UPDATE  produtos SET nome_produto = :nome_produto, preco = :preco, data_validade = :data_validade, descricao = :descricao, quantidade_estoq = :quantidade_estoq, imagem_url = :imagem_url WHERE id = :id";

        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome_produto", $nome_produto);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindParam(":data_validade", $data_validade);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":quantidade_estoq", $quantidade_estoq);
            $stmt->bindParam(":imagem_url", $imagem_url);
            $stmt->execute();
            echo "Produto atualizado!";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
 }

// Cartela de produtos 
function cartela_produtos(PDO $conexao): array
{
    $sql = "SELECT * FROM produtos";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// ---------------------------------------------------------------//
//FUNÇOES LOGIN 

//LOGIN
function cadastra_user($conexao, $nome, $telefone, $email, $endereco, $senha, ){
         $sql = "INSERT INTO usuarios (nome, telefone, email, endereco, senha) VALUES (:nome, :telefone, :email, :endereco, :senha)";

        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":senha", $senha);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

} //CONSULTA SÓ UM USER

function consulta_user($conexao, $email){
    // Corrigido: sem a vírgula depois de 'senha'
    $sql = "SELECT id, email, senha FROM usuarios WHERE email = :email";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return null;
    }
}
// CONSULTA TODOS OS USERS 
function listar_usuarios($conexao) {
    $sql = "SELECT id, email, telefone FROM usuarios";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return [];
    }
}

// ATUALIZAR USER
function atualizar_usuario($conexao, $id, $nome, $telefone, $email, $endereco, $senha) {
    $sql = "UPDATE usuarios SET nome = :nome, telefone = :telefone, email = :email, endereco = :endereco, senha = :senha WHERE id = :id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":endereco", $endereco);
        $stmt->bindParam(":senha", $senha);
        $stmt->execute();
        echo "Usuário atualizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

//DELETAR USER 
function deletar_usuario($conexao, $id) {
    $sql = "DELETE FROM usuarios WHERE id = :id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo "Usuário excluído com sucesso!";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
//----------------------------------------------
//FUNCTION ESPECIAL PARA USO DO INDEX (FIZ PARA NÃO PRECISAR ALTERAR CARTELA_PRODUTOS)
// Função nova exclusiva para a Vitrine/Página Inicial
function listar_produtos_loja($conexao) {
    $sql = "SELECT * FROM produtos ORDER BY id DESC";
    
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}
 ?>