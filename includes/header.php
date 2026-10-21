<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//var_dump($_SESSION['is_admin'] );
//$isAdmin = isset($_SESSION['is_admin']) 

?>
<header> 
    <style>
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #ecadbd;
            border-radius: 12px; 
        }

        .logo-titulo {
            margin: 0;
            color: #5a3e36;
            font-size: 1.6rem;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #5a3e36;
            font-weight: bold;
            transition: color 0.2s ease;
        }

        nav a:hover {
            color: #d17088;
        }
    </style>

    <nav>
        <h1 class="logo-titulo">CadernoVivo</h1>
    
        <div class="nav-links">
            <a href="/cadernovivo/index.php">Inicio</a>
            <a href="/cadernovivo/app/select.php">Catálogo</a>

            <?php //if ($isAdmin): ?>
                <!-- Links visíveis APENAS para Administradores -->
                <a href="/cadernovivo/app/create.php">Cadastrar</a>
                <a href="/cadernovivo/app/select_w.php">Consultar</a>
                <a href="/cadernovivo/app/update.php">Atualizar</a>
                <a href="/cadernovivo/app/delete.php">Deletar</a>
                <a href="/cadernovivo/pageuser/page_user.php">Opções de Usuario</a>

            <?php //endif; ?>

            <?php //if (!empty($_SESSION['id'])): ?>
                <!-- Se estiver logado, exibe a opção de Sair -->
                <a href="/cadernovivo/login/logout.php">Sair</a>
            <?php //else: ?>
                <!-- Se NÃO estiver logado, exibe Fazer Login -->
                <a href="/cadernovivo/login/login.php">Fazer Login</a>
            <?php //endif; ?>
        </div>
    </nav>
</header>