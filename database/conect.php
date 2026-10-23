<?php

// Configuração do endereço IP do servidor onde o banco de dados PostgreSQL está hospedado
$host = "192.168.10.60";

// Nome do banco de dados da aplicação
$dbname = "cadernovivo";

// Usuário padrão do banco de dados PostgreSQL
$user = "cadernovivo";

// Senha de acesso ao banco de dados
$pass = "cadernovivo";

try {

    // Instancia a conexão com o banco de dados PostgreSQL via driver PDO ('pgsql')
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
    );

} catch (PDOException $e) {

    // Caso ocorra alguma falha na conexão, captura a exceção e exibe a mensagem de erro
    echo "Erro: " . $e->getMessage();

}

?>