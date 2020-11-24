<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "full_stack_eletron";


$conn = mysqli_connect($servername , $username , $password , $database);

if (!$conn){
    die("A conexão Falhou".mysqli_connect_error());
};


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Full Stack Eletro</title>
    <link rel="stylesheet" href="./estilo.css">
    <script src="./js/funcoes.js "></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>
    <!-- Menu-->
    <?php
        include('menu.html')
    ?>    

    <!-- Fim do Menu-->
    <header>
        <h2>Produtos</h2>
    </header>
    
    <hr>

    <section class="categorias">
        <h3>Categorias</h3>
                <ul>
                    <li class="linha-produtos" onclick="exibir_todos('geladeira')">todos (12)</li>
                    <li class="linha-produtos" onclick="exibir_categoria('geladeira')">Geladeiras (3)</li>
                    <li class="linha-produtos" onclick="exibir_categoria('fogão')">Fogões (2)</li>
                    <li class="linha-produtos" onclick="exibir_categoria('microondas')">Microondas (3)</li>
                    <li class="linha-produtos" onclick="exibir_categoria('lava roupas')">Lavadora de roupas (2)</li>
                    <li class="linha-produtos" onclick="exibir_categoria('lava louças')">Lava louças (2)</li>
                    
                </ul>
    </section>



    <div class="produtos">

    <?php

    $sql = "select * from tb_produtos";
    $result = $conn->query($sql);

    if($result->num_rows > 0){

    while($rows = $result->fetch_assoc()){

    ?>


<div class="box-produtos" id="<?php echo $rows["categoria"] ?>" style="display: inline-block">
        <img class="imagem_produtos"  src="<?php echo $rows["imagem"] ?>" width="120px" onclick="destaque(this)">
        <br>
        <p class="descrição"><?php echo $rows["descricao"] ?></p>
        <hr>
        <p class="descrição"><strike>R$<?php echo $rows["preco"] ?></strike></p>
        <p class="preço">R$<?php echo $rows["precofinal"] ?></p>
        </div>

<?php
    }

    }else{
    echo "Nenhum produto cadastrado";
    }

    ?>



</div>
   

<?php
        include('rodape.html')
    ?> 
   
</body>
</html>