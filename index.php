<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar tamanho de arquivos com PHP</title>
</head>
<body>
    <?php
    // receber valores de todos os campos
    $dados=filter_input_array(INPUT_POST,FILTER_DEFAULT);
    if(!empty($dados['EnviarArquivo'])){
        // var_dump($dados);
        $arquivo=$_FILES['arquivo'];
        var_dump($arquivo['size']);

        if($arquivo['size'] > (1024*1024*2)){
            echo "<p>Erro tamanho máximo do arquivo é de 2Mb</p>";
        }

    }
    ?>

<h1>Validar tamanho de arquivo com PHP</h1>
<!-- enctype multipart = quando for trabalhar com arquivo ou imagem -->
<form action="" method="post" enctype="multipart/form-data">
    <label for="">Arquivo:</label>
    <input type="file" name="arquivo" id="arquivo"><br><br>
    <input type="submit" name="EnviarArquivo" value="enviar">

</form>
    
</body>
</html>