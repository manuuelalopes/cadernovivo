<?php 
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
//verificar_admin();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <?php
    include __DIR__ . '/../includes/header.php'; // chama header
    ?>
    <hr>
    <main>
        <!-- Formulário para informar dados do usuário -->
        <h2>Insira os dados do usuário</h2>
        <form action="" method="post"> 
            <label for="nome">Nome Completo: </label>
            <input type="text" name="nome" id="nome" required><br><br>

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" required><br><br>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required><br><br>

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required><br><br>

            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">


        </form>

        <?php 
        // Verifica se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $endereco = $_POST['endereco'];
            $senha = $_POST['senha'];

            // Chama a função de cadastrar usuário que está no seu functions.php
            cadastra_user($conexao, $nome, $telefone, $email, $endereco, $senha);
        }
        ?>

    </main>
    <hr>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>