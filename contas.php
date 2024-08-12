<?php
session_start();
include_once ('src/php/conexao.php');
if ((isset($_SESSION['email']) === true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php'); /*Qualquer coisa mude aqui*/
}
$sql = "SELECT * FROM usuario ORDER BY id DESC";

$result = $conn->query($sql);

print_r($result);

$id = $result; // Exemplo: ID do usuário que você quer recuperar a imagem
$sql = "SELECT foto FROM usuario WHERE id = id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($foto);
$stmt->fetch();
$stmt->close();
$conn->close();

// Se a imagem existir, exibi-la
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/index-contas.css">
    <link rel="stylesheet" href="src/css/style-contas.css">
    <link rel="stylesheet" href="src/css/responsivo-contas.css">
    <link href="https://fonts.cdnfonts.com/css/eingrantch-mono" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/milestone-one" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/codygoon" rel="stylesheet">
    <title>Vanguard | Lista de usuários</title>
    <link rel="shortcut icon" href="src/imagem/icones/escudo.png" type="image/x-icon">
</head>

<body>
    <header class="cabecalho">
        <div class="logo">
            <img src="src/imagem/logos/VanguardLogo - titulo.png" alt="Logo da Vanguard" />
        </div>

        <button id="OpenMenu">&#9776;</button>

        <nav id="menu">
            <button id="CloseMenu">X</button>
            <ul class="menu">
                <li>
                    <a href="dashboard.html">Dashboard</a>

                </li>
                <li>
                    <a href="avaliar.html">Avaliações</a>
                </li>
                <li>
                    <a class="btn-servicos" href="servicos.html" target="_blank">Serviços</a>
                </li>
                <li>
                    <a href="produtos.html" target="_blank">Produtos</a>
                </li>
                <li>
                    <a href="perfil.html">perfil</a>
                </li>
                <li>
                    <a class="btn-login" href="login.html">logout</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="home">

        <div class="container">
            <div class="area">
                <h2 class="titulo">Lista de usuários</h2>
                <form class="formulario" id="crud-form">
                    <input type="hidden" id="user-id"> <!-- Campo oculto para o ID do carro -->
                    <input type="text" id="nome" placeholder="nome">
                    <input type="text" id="email" placeholder="email">
                    <input type="text" id="senha" placeholder="senha">
                    <input type="number" id="cpf" placeholder="cpf">
                    <input type="file" id="foto" placeholder="aqui ó">

                    <button type="button" onclick="createOrUpdate()">Salvar</button>
                </form>

                <section>
                    <tr class="tabela">
                        <th scope="col">#</thc>
                        <th scope="col">nome</thc>
                        <th scope="col">email</thc>
                        <th scope="col">senha</thc>
                        <th scope="col">cpf</thc>
                        <th scope="col">foto</thc>
                    </tr>
                    <?php
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $user_data['id'] . "</td>";
                        echo "<td>" . $user_data['nome'] . "</td>";
                        echo "<td>" . $user_data['email'] . "</td>";
                        echo "<td>" . $user_data['senha'] . "</td>";
                        echo "<td>" . $user_data['cpf'] . "</td>";
                        $imgData = base64_encode($user_data['foto']);
                        echo "<td><img src='data:image/png;base64,{$imgData}' alt='Foto' width='100'></td>";
   
                     } 
                     ?>
            </div>
        </div>
        </section>
    </main>
    <footer class="rodape">

    </footer>
    <script src="src/crud/contas.js"></script>
</body>
</html>