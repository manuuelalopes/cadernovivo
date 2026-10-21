<?php
require_once __DIR__ . '/includes/functions.php';

// Lê o ID enviado pela URL e valida que seja um número inteiro.
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400);
    exit('ID do produto inválido ou não informado.');
}

$sql = "SELECT * FROM produtos WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->execute(['id' => $id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    http_response_code(404);
    exit('Produto não encontrado.');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($produto['nome_produto'], ENT_QUOTES, 'UTF-8') ?></title>
    <style>
     body {
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
            margin: 20px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            width: 120px;
            height: auto;
            border-radius: 12px;
        }

        nav a {
            text-decoration: none;
            color: #5a3e36;
            font-weight: bold;
        }

        nav a:hover {
            color: #d17088;
        }

    
        /* --- ESTILOS DOS PRODUTOS MAIS VENDIDOS --- */
        .secao-produtos {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 10px;
        }

        .secao-produtos h2 {
            color: #5a3e36;
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }

        /* Grid responsiva para os cards */
        .grid-produtos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        /* Design de cada Card de Produto */
        .card-produto {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-produto:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(209, 112, 136, 0.2);
        }

        .card-produto img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        

        .card-produto .btn-comprar:hover {
            background-color: #d17088;}
</style>
</head>
<body>
   <?php  include __DIR__ . '/includes/header.php'; 
    ?>
    <h1><?= htmlspecialchars($produto['nome_produto'], ENT_QUOTES, 'UTF-8') ?></h1>

    <?php if (!empty($produto['imagem_url'])): ?>
        <img
            src="<?= htmlspecialchars($produto['imagem_url'], ENT_QUOTES, 'UTF-8') ?>"
            alt="<?= htmlspecialchars($produto['nome_produto'], ENT_QUOTES, 'UTF-8') ?>"
            style="max-width: 400px;"
        >
    <?php endif; ?>

    <p>R$ <?= number_format((float) str_replace(',', '.', (string) $produto['preco']), 2, ',', '.') ?></p>

    <a href="index.php">Voltar aos produtos</a>
    <?php  include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
