<?php

$hostname = "localhost";
$db = "vanguard";
$user = "root";
$pass = "";

$conn =  mysqli_connect('localhost', 'root', '', 'vanguard');

$mysqli = new mysqli($hostname, $user, $pass, $db);
if($mysqli->connect_errno) {
    die("Falha na conexão com o banco de dados");
}

try {
    $pdo = new PDO('mysql:host=' . $hostname . ';dbname=' . $db, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   catch (PDOException $err) {
    echo "Houve um erro no banco de dados" . $err->getMessage();
    exit;
}


