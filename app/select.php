<?php require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
//verificar_admin(); // Bloqueia quem não for admin
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartela de produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
            margin: 20px;
            color: #5a3e36;
        }

        main {
            max-width: 900px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            line-height: 1.6;
        }

        main hr {
            border: none;
            border-top: 1px solid #f8d2dc;
            margin: 15px 0;
        }

        h2 {
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
            margin: 20px;
            color: #5a3e36;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <header>
        <h2>Cartela de Produtos</h2>
    </header>
    <main>
        <?php
        cartela_produtos($conexao);
        ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>

</html>