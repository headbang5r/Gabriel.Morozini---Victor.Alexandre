<?php
include_once('conexao.php'); 
include('Class/ClassEstado');

if(isset($_POST['submit'])) {
$nome= $_POST['nome'];
$dt_nasc= $_POST['dt_nasc'];
$estado= $_POST['estado'];
$cidade= $_POST['cidade'];
$cpf= $_POST['cpf'];
$email= $_POST['email'];
$senha= $_POST['senha'];

      $result = mysqli_query($conexao, "INSERT INTO usuario(nome,dt_nasc,estado_estado_id,cidade_id,cpf,email,senha) VALUES('$nome','$dt_nasc','$estado','$cidade','$cpf','$email','$senha')");
}

?>