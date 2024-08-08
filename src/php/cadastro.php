<?php
include_once('conexao.php'); 


$sql_code_states = "SELECT * FROM estado ORDER BY nome_estado ASC";
$sql_query_states = $conn->query($sql_code_states) or die($conn->error);

$estado= $GET['estado'];

?>
        <?php while($estado = $sql_query_states->fetch_assoc()) { ?> 
<?php if(isset($_GET['estado']) && $_GET['estado'] == $estado['estado_id']) echo "selected"; ?> value="<?php echo $estado['estado_id']; ?>"><?php echo $estado['nome_estado']; ?></option>
        <?php } ?>
     <?php if(isset($_GET['estado'])) { ?>
        <?php 
        $selected_state = $conn->real_escape_string($GET['estado']);
        
        $sql_code_cities = "SELECT * FROM cidades WHERE estado_id = '$selected_state' ORDER BY nome_cidade";
        $cidade= $GET['cidade'];
        
        $sql_query_cities = $conn->query($sql_code_cities) or die($conn->error);
        while($cidade = $sql_query_cities->fetch_assoc()) { ?>
        <?php echo $cidade['cidade_id']; ?>"><?php echo $cidade['nome_cidade']; ?></option>
   
        <?php } ?>
        <?php } ?>
<?php
        if(isset($_POST['submit'])) {
        $nome= $_POST['nome'];
        $dt_nasc= $_POST['dt_nasc'];
        $cpf= $_POST['cpf'];
        $email= $_POST['email'];
        $senha= $_POST['senha'];

      $result = mysqli_query($conn, "INSERT INTO usuario(nome, dt_nasc, estado_estado_id, cidade_id, cpf, email, senha) VALUES('$nome', '$dt_nasc', '$estado', '$cidade', '$cpf', '$email', '$senha')");

}
?>