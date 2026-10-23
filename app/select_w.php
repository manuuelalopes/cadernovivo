<?php require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
//verificar_admin(); // Bloqueia quem não for admin
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
            margin: 20px;
            color: #5a3e36;
        }

        h1 {
            color: #5a3e36;
            text-align: center;
            font-size: 1.8rem;
            margin-top: 30px;
            margin-bottom: 0;
        }

        main {
            max-width: 500px;
            margin: 20px auto 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: center;
            margin-bottom: 15px;
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
            background-color: #5a3e36;
            color: #ffffff;
            transition: background-color 0.2s, transform 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #d17088;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?>
    <h1>Consultar Produto</h1>
    <main>
            <form action="" method="post">
                <label for="id">ID do produto: </label>
                <input type="number" name="id" id="id" placeholder="Insira o ID para consultar" required><br>
                <input type="submit" value="Consultar">
            </form>
             <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        consultar($conexao, $_POST['id']); 
        }
        ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>