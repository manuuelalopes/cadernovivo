 <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();}

//Trava de Segurança: Apenas administradores podem acessar esta página
//$isAdmin = isset($_SESSION['is_admin']) && filter_var($_SESSION['is_admin'], FILTER_VALIDATE_BOOLEAN);
$isAdmin = !empty($_SESSION['is_admin']);
if (!$isAdmin) {
   http_response_code(403);
    exit('Acesso negado: Você não tem permissão para acessar esta página.');}
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários - Caderno Vivo</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff0f5;
            color: #5a3e36;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container-admin {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(209, 112, 136, 0.12);
            text-align: center;
            width: 90%;
        }

        .container-admin h1 {
            color: #b25877;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .container-admin p {
            color: #7a5462;
            margin-bottom: 30px;
        }

        /* Grid de Botões */
        .grid-botoes {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
        }

        /* Estilo dos Botões Rosas */
        .btn-rosa {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px 20px;
            background-color: #d17088;
            color: #ffffff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(209, 112, 136, 0.25);
            transition: all 0.2s ease-in-out;
        }

        .btn-rosa:hover {
            background-color: #b25877;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(178, 88, 119, 0.35);
        }

        .btn-rosa:active {
            transform: translateY(0);
        }

        /* Botão para voltar */
        .btn-voltar {
            display: inline-block;
            margin-top: 30px;
            color: #b25877;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .btn-voltar:hover {
            color: #8c3854;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container-admin">
        <h1>Painel do Administrador</h1>
        <p>Selecione uma das opções abaixo para gerenciar os usuários cadastrados:</p>

        <div class="grid-botoes">
            <a href="/cadernovivo/usuario/create_user.php" class="btn-rosa">Cadastrar Usuário</a>
            <a href="/cadernovivo/usuario/select_user.php" class="btn-rosa">Listar Usuários</a>
            <a href="/cadernovivo/usuario/select_w_user.php" class="btn-rosa">Procurar Usuário</a>
            <a href="/cadernovivo/usuario/update_user.php" class="btn-rosa">Atualizar Usuário</a>
            <a href="/cadernovivo/usuario/delete_user.php" class="btn-rosa">Deletar Usuário</a>
        </div>

        <a href="/cadernovivo/index.php" class="btn-voltar">← Voltar para a Página Inicial</a>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>