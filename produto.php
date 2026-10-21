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

        /* --- CARD PRINCIPAL DE DETALHES DO PRODUTO --- */
        .container-produto {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .container-produto img {
            width: 100%;
            max-width: 350px;
            height: auto;
            border-radius: 12px;
            object-fit: cover;
        }

        .titulo-produto {
            color: #5a3e36;
            font-size: 1.8rem;
            margin: 20px 0 10px;
        }

        .descricao-produto {
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 20px;
            text-align: justify;
        }

        /* CAIXA DE DESTAQUE DO PREÇO */
        .caixa-preco {
            background-color: #fff0f5;
            border: 2px solid #d17088;
            border-radius: 10px;
            padding: 12px 20px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .valor-preco {
            color: #d17088;
            font-size: 2.2rem;
            font-weight: bold;
            margin: 0;
        }

        .btn-voltar {
            display: inline-block;
            margin-top: 10px;
            color: #5a3e36;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background-color 0.2s;
        }

        .btn-voltar:hover {
            background-color: #f3d0d8;
        }
        .btn-comprar {
        display: inline-block;
        background-color: #d17088;
        color: #ffffff;
        padding: 12px 28px;
        font-size: 1.1rem;
        font-weight: bold;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.2s, transform 0.1s;
        margin-bottom: 15px;
        }

        .btn-comprar:hover {
            background-color: #b85a72;
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/includes/header.php'; ?>

    <main class="container-produto">
        <!-- 1. Imagem no topo -->
        <?php if (!empty($produto['imagem_url'])): ?>
            <img
                src="<?= htmlspecialchars($produto['imagem_url'], ENT_QUOTES, 'UTF-8') ?>"
                alt="<?= htmlspecialchars($produto['nome_produto'], ENT_QUOTES, 'UTF-8') ?>"
            >
        <?php endif; ?>

        <!-- 2. Nome do produto abaixo da imagem -->
        <h1 class="titulo-produto"><?= htmlspecialchars($produto['nome_produto'], ENT_QUOTES, 'UTF-8') ?></h1>

        <!-- 3. Descrição do produto -->
        <?php if (!empty($produto['descricao'])): ?>
            <p class="descricao-produto"><?= nl2br(htmlspecialchars($produto['descricao'], ENT_QUOTES, 'UTF-8')) ?></p>
        <?php else: ?>
            <p class="descricao-produto"><em>Sem descrição disponível para este produto.</em></p>
        <?php endif; ?>

        <!-- 4. Caixa destacada com o preço maior -->
        <div class="caixa-preco">
            <span class="valor-preco">R$ <?= number_format((float) str_replace(',', '.', (string) $produto['preco']), 2, ',', '.') ?></span>
        </div>
        <DIV>
            <a href="comprar/comprar.php?id=<?= $produto['id'] ?>" class="btn-comprar">Comprar</a>
        </DIV>
       

        <div>
            <a href="index.php" class="btn-voltar">← Voltar aos produtos</a>
        </div>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>