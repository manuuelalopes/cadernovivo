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
    <title>Consultar Usuário</title>
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
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <hr>
    <main>
        <h2>Buscar Usuário por E-mail</h2>

        <!-- Formulário que envia o e-mail -->
        <form action="" method="post">
            <label for="email">Digite o E-mail:</label>
            <input type="email" name="email" id="email" required>
            <input type="submit" value="Buscar">
        </form>

        <br>

        <?php 
        // Verifica se o e-mail foi informado no formulário
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            
            // Chama funçao consulta_user
            $usuario = consulta_user($conexao, $email);

            if ($usuario) {
            ?>
                <h3>Usuário Encontrado:</h3>
                <p><strong>ID:</strong> <?php echo $usuario['id']; ?></p>
                <p><strong>E-mail:</strong> <?php echo $usuario['email']; ?></p>
            <?php 
            } else {
                echo "<p>Nenhum usuário encontrado com o e-mail <strong>$email</strong>.</p>";
            }
        }
        ?>

    </main>
    <hr>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>