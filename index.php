<?php 
require_once __DIR__ . '/includes/functions.php'; // Certifique-se de incluir as funções/conexão aqui se não estiverem no header
include __DIR__ . '/includes/header.php'; 

// Busca os produtos no banco de dados
$produtos = cartela_produtos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadernoVivo</title>
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

        /* --- ESTILOS DO BANNER PRINCIPAL --- */
        .banner-principal {
            max-width: 1200px;
            margin: 20px auto;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .banner-principal img {
            width: 100%;
            height: auto;
            max-height: 350px;
            object-fit: cover;
            display: block;
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

        .card-produto h3 {
            color: #5a3e36;
            font-size: 1.1rem;
            margin: 8px 0;
        }

        .card-produto .preco {
            color: #d17088;
            font-size: 1.2rem;
            font-weight: bold;
            margin: 10px 0;
        }

        .card-produto .btn-comprar {
            display: inline-block;
            background-color: #5a3e36;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .card-produto .btn-comprar:hover {
            background-color: #d17088;
        }
    </style>
</head>

<body>
     <div class="banner-principal">
        <img src="https://via.placeholder.com/1200x350/f8d7da/5a3e36?text=Novidades+da+Semana" alt="Banner de Promoção CadernoVivo">
        </div>

    <main class="secao-produtos">
        <h2>Produtos Mais Vendidos</h2>
        <div class="grid-produtos">
            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="card-produto">
                        <img src="<?= htmlspecialchars($produto['imagem_url']) ?>" alt="<?= htmlspecialchars($produto['nome_produto']) ?>">
                        <h3><?= htmlspecialchars($produto['nome_produto']) ?></h3>
                        <?php
                        $preco = (float) str_replace(',', '.', (string) $produto['preco']);
                        ?>
                        <p class="preco">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                        <a href="produto.php?id=<?= (int) $produto['id'] ?>" class="btn-comprar">Ver Detalhes</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; grid-column: 1 / -1;">Nenhum produto cadastrado no momento.</p>
            <?php endif; ?>
        </div>

    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>