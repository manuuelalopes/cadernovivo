<?php 
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/verifica_user.php';
verificar_admin(); // Bloqueia quem não for admin
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produto</title>
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
    <?php
    include __DIR__ . '/../includes/header.php' //chama header
    ?>
    <hr>
    <main>
        <!-- forms para informar dados do produto -->
        <h2>Insira os dados do produto</h2>
        <form action="" method="post"> 
            <label for="nome_produto">Nome do produto:</label>
            <input type="text" name="nome_produto" id="nome_produto"><br>
            <label for="preco">Preço:</label>
            <input type="text" name="preco" id="preco"><br>
            <label for="data_validade">Data de Validade:</label>
            <input type="date" name="data_validade" id="data_validade"><br>
            <label for="descricao">Descrição:</label> 
            <input type="text" name="descricao" id="descricao"> <br>
            <label for="quantidade_estoq">Quantidade no Estoque:</label>
            <input type="number" name="quantidade_estoq" id="quantidade_estoq"><br>
            <label for="imagem_url">Imagem URL:</label>
            <input type="text" name="imagem_url" id="imagem_url"><br>
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
        </form>
        <?php //faz a conexao e cadastra os dados do produto
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
        cadastrar_produto($conexao, $_POST['nome_produto'], $_POST['preco'], $_POST['data_validade'], $_POST['descricao'], $_POST['quantidade_estoq'], $_POST['imagem_url']);
        }
        ?>

    </main>
        <hr>
        <?php include __DIR__ . '/../includes/footer.php'?>
</body>
</html>