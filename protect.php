<?php
    if(!isset($_SESSION)){
      session_start();
}
if(!isset($_SESSION['id_user'])){
//die("Você precisa estar logado para acessar! <br><a href=\"Login.php\">Fazer Login</a>");
header("Location: Login.php");
}


?>