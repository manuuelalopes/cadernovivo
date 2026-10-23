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