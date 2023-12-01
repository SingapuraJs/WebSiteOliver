<?php

// ----------- ESTABELECENDO CONEXÃO COM O BANCO DE DADOS ----------------------------

$server = $_ENV['DB_HOST'];
$port = $_ENV['DB_PORT'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASSWORD'];
$db = $_ENV['DB_NAME'];

try {
    $pdo = new PDO("mysql:host=$server;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id_usuario INT NOT NULL AUTO_INCREMENT,
        usr_usuario VARCHAR(255) NOT NULL,
        usr_email VARCHAR(255) NOT NULL,
        usr_senha VARCHAR(255) NOT NULL,
        usr_telefone VARCHAR(11) NULL,
        PRIMARY KEY (id_usuario)
    ) ENGINE = InnoDB";

    $pdo->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS agendamento (
            id_agendamento INT PRIMARY KEY AUTO_INCREMENT,
            cliente_agendamento VARCHAR(255) NOT NULL,
            data_agendamento DATE NOT NULL
            );";
    $pdo->exec($sql);
    
} catch (PDOException $e) {
    die("Falha: " . $e->getMessage());
    echo "<div style=\"width: 10px; height: 10px; background-color: red; position: absolute; bottom: 0;\"></div>";
}