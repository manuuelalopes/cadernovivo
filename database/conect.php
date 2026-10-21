<?php
$host = "192.168.10.60";
$dbname = "cadernovivo";
$user = "cadernovivo";
$pass = "cadernovivo";

try {
    $conexao = new PDO (
        "pgsql:host=$host;
        dbname=$dbname",
        $user,
        $pass
    );
    return $conexao;
} catch (PDOException $e){
    echo "erro: " . $e->getMessage();
}
?>