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
    <title>Prestadores de Serviço</title>
</head>
<body>
    <div class="container my-5">
    <h2 class="mb-5">Prestadores de Serviço</h2>

    <?php

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados['AddMsgCont'])){

    // var_dump($dados);

    $query_contato = "INSERT INTO prestadores (empresa, telefone, celular, email, website, contato) VALUES (:empresa, :telefone, :celular, :email, :website, :contato)";
    $add_contato = $conn->prepare($query_contato);
    $add_contato->bindParam(':empresa', $dados['empresa'], PDO::PARAM_STR);
    $add_contato->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
    $add_contato->bindParam(':celular', $dados['celular'], PDO::PARAM_STR);
    $add_contato->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $add_contato->bindParam(':website', $dados['website'], PDO::PARAM_STR);
    $add_contato->bindParam(':contato', $dados['contato'], PDO::PARAM_STR);

    $add_contato->execute();

    if($add_contato->rowCount()){
        echo "<span style='color:#4EC994;font-weight:600;'>Mensagem enviada com sucesso</span>";
    }else{
        echo "<span style=color:'#f00;'>Não foi possivel cadastrar</span>";
    }
}


    ?>

    <form action="" method="post">
        <label for="">Empresa</label>
        <input type="text" placeholder="Nome da empresa" name="empresa"  required><br><br>

        <label for="">Telefone</label>
        <input type="tel" placeholder="telefone" name="telefone" ><br><br>

        <label for="">Celular</label>
        <input type="tel" placeholder="Celular de contato" name="celular" ><br><br>

        <label for="">Email</label>
        <input type="email" placeholder="Email de contato" name="email"  required><br><br>

        <label for="">Website</label>
        <input type="text" placeholder="Website" name="website"  required><br><br>

        <label for="">Contato</label>
        <input type="text" placeholder="Pessoa de contato" name="contato"  required><br><br>

        

        <input type="submit" name="AddMsgCont" value="Enviar">
    </div>
    </form>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
</body>
</html>