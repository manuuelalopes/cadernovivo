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
    <title>Atualizar Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
            margin: 20px;
            color: #5a3e36;
        }

        hr {
            border: none;
            border-top: 1px solid #f8d2dc;
            margin: 20px 0;
        }

        main {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        h2 {
            color: #5a3e36;
            text-align: center;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 1.6rem;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            font-size: 0.95rem;
            margin-top: 10px;
            margin-bottom: 5px;
            color: #5a3e36;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #f8d2dc;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            font-size: 1rem;
            box-sizing: border-box;
            background-color: #fff0f5;
            color: #5a3e36;
            outline: none;
            transition: border-color 0.2s, background-color 0.2s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus {
            border-color: #d17088;
            background-color: #ffffff;
        }

        /* Oculta as quebras de linha padrão do form para manter o espaçamento limpo do CSS */
        form br {
            display: none;
        }

        input[type="submit"],
        input[type="reset"] {
            margin-top: 20px;
            padding: 12px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
        }

        input[type="submit"] {
            background-color: #5a3e36;
            color: #ffffff;
        }

        input[type="submit"]:hover {
            background-color: #d17088;
            transform: translateY(-2px);
        }

        input[type="reset"] {
            background-color: #f8d2dc;
            color: #5a3e36;
        }

        input[type="reset"]:hover {
            background-color: #eab2c1;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <hr>
    <main>
        <h2>Atualizar Dados do Usuário</h2>

        <!-- Formulário para digitar o ID e os novos dados -->
        <form action="" method="post"> 
            <label for="id">ID do Usuário a alterar:</label><br>
            <input type="number" name="id" id="id" required><br><br>

            <label for="nome">Novo Nome:</label><br>
            <input type="text" name="nome" id="nome" required><br><br>

            <label for="telefone">Novo telefone</label><br>
            <input type="text" name="telefone" id="telefone" required><br><br>

            <label for="email">Novo E-mail:</label><br>
            <input type="email" name="email" id="email" required><br><br>

            <label for="endereco">Novo endereco:</label><br>
            <input type="text" name="endereco" id="endereco" required><br><br>

            <label for="senha">Nova Senha:</label><br>
            <input type="password" name="senha" id="senha" required><br><br>

            <input type="submit" value="Atualizar Usuário">
        </form>

        <?php 
        // Verifica se o formulário foi enviado via POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $endereco = $_POST['endereco'];
            $senha = $_POST['senha'];

            // Chama a sua função de atualizar
            atualizar_usuario($conexao, $id, $nome, $telefone,  $email, $endereco, $senha);
        }
        ?>

    </main>
    <hr>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>