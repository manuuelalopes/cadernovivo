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
    <title>Lista de Usuários</title>
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
    <hr>
    <main>
        <h2>Lista de Usuários Cadastrados</h2>

        <?php 
        // Executa a função do SELECT sem WHERE
        $usuarios = listar_usuarios($conexao);

        // Verifica se existem usuários no banco
        if (!empty($usuarios)) {
        ?>
            <table border="1" cellpadding="8" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php 
        } else {
            echo "<p>Nenhum usuário encontrado.</p>";
        }
        ?>

    </main>
    <hr>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>