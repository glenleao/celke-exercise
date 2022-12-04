<?php
include_once './conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Formulário de contato</title>
</head>
<body>
    <div class="container my-5">
    <h2 class="mb-5">Formulário de contato</h2>

    <?php

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados['AddMsgCont'])){

    // var_dump($dados);

    $query_contato = "INSERT INTO contatos (nome, email, assunto, conteudo) VALUES (:nome, :email, :assunto,:conteudo)";
    $add_contato = $conn->prepare($query_contato);
    $add_contato->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $add_contato->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $add_contato->bindParam(':assunto', $dados['assunto'], PDO::PARAM_STR);
    $add_contato->bindParam(':conteudo', $dados['conteudo'], PDO::PARAM_STR);

    $add_contato->execute();

    if($add_contato->rowCount()){
        echo "<span style='color:#4EC994;font-weight:600;'>Mensagem enviada com sucesso</span>";
    }else{
        echo "<span style=color:'#f00;'>Não foi possivel cadastrar</span>";
    }
}


    ?>

    <form action="" method="post">
        <label for="">Nome</label>
        <input type="text" placeholder="Nome completo" name="nome"  required><br><br>

        <label for="">Email</label>
        <input type="email" placeholder="Seu melhor email" name="email"  required><br><br>

        <label for="">Assunto</label>
        <input type="text" placeholder="Assunto da mensagem" name="assunto"  required><br><br>

        <label for="">Conteúdo</label>
        <textarea  rowm="3" cols="50" placeholder="Conteúdo da mensagem" name="conteudo"  required></textarea><br><br>

        <input type="submit" name="AddMsgCont" value="Enviar">
    </div>
    </form>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
</body>
</html>