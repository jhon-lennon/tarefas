<?php
    if(!isset($_SESSION)){
      session_start();
}
if(!isset($_SESSION['id'])){
die("Você precisa estar logado para acessar! <br><a href=\"index.php\">Fazer Login</a>");
//header("Location: Login.php");
}


?>