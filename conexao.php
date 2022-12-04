<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "celke";

try{
 $conn = new PDO("mysql:host=$host;dbname=". $dbname, $user, $pass);
//  echo "Conexão realizada com sucesso.";
} catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não foi realizado. Erro gerado ". $err->getMessage();
}