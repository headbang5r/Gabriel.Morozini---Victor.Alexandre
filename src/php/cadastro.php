<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];

    // Validações básicas
    if (!$nome || !$email || !$senha || !$cpf || !$estado || !$cidade) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    // Prepara a instrução SQL para inserir o cadastro no banco de dados
    $sql = "INSERT INTO usuarios (nome, email, senha, cpf, estado_id, cidade_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssii", $nome, $email, $senha, $cpf, $estado, $cidade);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao realizar o cadastro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>