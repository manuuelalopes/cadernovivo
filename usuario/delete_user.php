<?php 
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/verifica_user.php';
verificar_admin();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuário</title>
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