<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
verificar_autenticado(); // Apenas exige login

// 1. Tratamento de Erro: Valida se o ID foi informado e se é um número inteiro válido
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400);
    exit('Erro 400: ID do produto inválido ou não fornecido.');
}

try {
    // 2. Tratamento de Erro: Consulta segura ao banco de dados utilizando Prepared Statements
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute(['id' => $id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    // 3. Tratamento de Erro: Verifica se o produto realmente existe no banco
    if (!$produto) {
        http_response_code(404);
        exit('Erro 404: Produto não encontrado.');
    }

} catch (PDOException $e) {
    // 4. Tratamento de Erro: Falha de conexão ou erro na consulta SQL
    http_response_code(500);
    error_log("Erro no banco de dados: " . $e->getMessage()); // Grava o erro nos logs do servidor
    exit('Erro interno no servidor ao processar a compra. Tente novamente mais tarde.');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar - <?= htmlspecialchars($produto['nome_produto'], ENT_QUOTES, 'UTF-8') ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
            margin: 20px;
        }
        .container-checkout {
            max-width: 500px;
            margin: 40px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            text-align: center;
        }
        .preco {
            font-size: 1.5rem;
            color: #d17088;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <main class="container-checkout">
        <h1>Finalizar Compra</h1>
        <p>Você está prestes a adquirir:</p>
        <h2><?= htmlspecialchars($produto['nome_produto'], ENT_QUOTES, 'UTF-8') ?></h2>
        <p class="preco">R$ <?= number_format((float) str_replace(',', '.', (string) $produto['preco']), 2, ',', '.') ?></p>
        
        <!-- Formulário ou fluxo de pagamento aqui -->
        
        <p><a href="../index.php">Cancelar e voltar</a></p>
        <p><a href="/comprar/pix.php">Gerar Codigo PIX </a></p>
    </main>
</body>
</html>