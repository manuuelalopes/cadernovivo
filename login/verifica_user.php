<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Garante apenas que o usuário esteja logado
 */
function verificar_autenticado() {
    if (!isset($_SESSION['id'])) {
        header("Location: /cadernovivo/login/login.php");
        exit();
    }
}

/**
 * Garante que o usuário esteja logado E seja administrador
 */
function verificar_admin() {
    verificar_autenticado(); // Primeiro checa se está logado
    $isAdmin = isset($_SESSION['is_admin']) ;
    //$isAdmin = isset($_SESSION['is_admin']) && ($_SESSION['is_admin'] === true || $_SESSION['is_admin'] === 't' || $_SESSION['is_admin'] == 1);

    if (!$isAdmin) {
        http_response_code(403);
        exit('Acesso negado: Você não tem permissão para acessar esta página.');
    }
}
?>