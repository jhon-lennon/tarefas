<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "zeyinsta_sigaja";
 
try {
    $conn = new mysqli($host,$user,$pass,$dbname);
   //echo "Conexão com banco de dados realizado com sucesso!";
} catch (Exception $ex) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso!";
}


    