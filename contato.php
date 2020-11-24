<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "full_stack_eletron";


$conn = mysqli_connect($servername , $username , $password , $database);

if (!$conn){
    die("A conexão Falhou".mysqli_connect_error());
};

if(isset($_POST['nome']) && isset($_POST['msg'])){
    $nome = $_POST['nome'];
    $msg = $_POST['msg'];
    
    $sql = "insert into comentarios (nome, msg) values ('$nome' , '$msg')";
    $result = $conn->query($sql);
    
}

?>  

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="./estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <!-- Menu-->
    <?php
        include('menu.html')
    ?>    

    <!-- Fim do Menu-->

    
    <div class="container">
    <h2>Contato</h2>
    <hr>
    <div class="formas-contatos-box">
    <div class="contato">
        <img src="./imagens/email.png" width="40px">
                contato@fullstackeletro.com
    </div>

    <div class="contato">
        <img src="./imagens/whatsapp.png" width="40px">
                (11)99999-9999
    </div>
    </div>



    </div>

    <!-- 
    <form action="" method="post">
        Nome: <br>
        <input type="text" name="nome" style="width:500px"><br>
        Mensagem: <br>
        <input type="text" name="msg" style="width:500px"><br>
        <input type="submit" name="submit" value="Enviar"><br>

    </form>

    -->

    <div class=container>
    <form method="post">
  <div class="form-group">
    <label for="nome">Nome</label>
    <input name="nome" type="text" class="form-control" placeholder="Digite seu Nome">
  </div>

  <div class="form-group">
    <label for="msg">Mensagem</label>
    <textarea class="form-control" name="msg" rows="4"></textarea>
    <small class="form-text text-muted">Escreva um elogio, faça uma elogio ou peça uma informação</small>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
</form>
</div>



    <div class="container resposta_msg">
    <?php
            $sql = "select * from comentarios";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    echo "Data: ", $rows['datahoje'], "<br>";
                    echo "Nome: ", $rows['nome'], "<br>";
                    echo "Mensagem: ", $rows['msg'], "<br>";
                    echo "<hr>";
                }
            }else{
                echo "Nenhum comentário ainda";
            }
    
    ?>
    
    </div>
    

<?php
        include('rodape.html')
    ?>
    
</body>
</html>