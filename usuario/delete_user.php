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
    <title>Deletar Usuário</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
            margin: 20px;
            color: #5a3e36;
        }

        main {
            max-width: 500px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        h1 {
            color: #5a3e36;
            font-size: 1.8rem;
            margin-top: 0;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: center;
        }

        label {
            font-weight: bold;
            font-size: 1rem;
            color: #5a3e36;
        }

        input[type="number"] {
            width: 100%;
            max-width: 300px;
            padding: 10px 12px;
            border: 1px solid #f8d2dc;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            font-size: 1rem;
            box-sizing: border-box;
            background-color: #fff0f5;
            color: #5a3e36;
            outline: none;
            text-align: center;
            transition: border-color 0.2s, background-color 0.2s;
        }

        input[type="number"]:focus {
            border-color: #d17088;
            background-color: #ffffff;
        }

        /* Oculta o <br> para manter o espaçamento limpo via Flexbox */
        form br {
            display: none;
        }

        input[type="submit"] {
            width: 100%;
            max-width: 300px;
            margin-top: 10px;
            padding: 12px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            background-color: #d17088;
            color: #ffffff;
            transition: background-color 0.2s, transform 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #b5566e;
            transform: translateY(-2px);
        }
        </style>
</head>


<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <hr>
    <main>
        <h2>Excluir Usuário</h2>
        
        <form action="" method="post"> 
            <label for="id">ID do Usuário:</label>
            <input type="number" name="id" id="id" required><br><br>

            <input type="submit" value="Deletar Usuário">
        </form>

        <?php 
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'];
            
            // Chama a função de deletar
            deletar_usuario($conexao, $id);
        }
        ?>

    </main>
    <hr>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>