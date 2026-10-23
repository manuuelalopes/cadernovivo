<?php
session_start();
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
verificar_autenticado(); // Apenas exige login
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Conta - Caderno Vivo</title>
    <style>
        .conta-card {
            max-width: 500px;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            border: 2px solid #f6d8e5;
            border-radius: 12px;
        }
        .conta-card h1 { color: #b25877; font-size: 1.5rem; }
        .info-group { margin-bottom: 12px; }
        .info-group label { font-weight: bold; color: #7a5462; display: block; }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <main class="conta-card">
        <?php $usuario = consulta_user($conexao, $email);?> 
        <h1>Minha Conta</h1>
        <p>Bem-vindo(a), <?= htmlspecialchars($usuario['$nome']) ?>!</p>
        <hr style="margin: 15px 0; border: none; border-top: 1px solid #f6d8e5;">

        <div class="info-group">
            <label>E-mail:</label>
            <span><?= htmlspecialchars($usuario['email']) ?></span>
        </div>

        <div class="info-group">
            <label>Telefone:</label>
            <span><?= htmlspecialchars($usuario['telefone']) ?></span>
        </div>

        <div class="info-group">
            <label>Endereço:</label>
            <span><?= htmlspecialchars($usuario['endereco']) ?></span>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>

    