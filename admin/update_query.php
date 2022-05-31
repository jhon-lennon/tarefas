
<?php

require_once 'conn.php';



if(isset($_POST['update'])){

$id_user = $_POST['id_user'];

$usuario = $_POST['usuario'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$pix = $_POST['pix'];
$saldo = $_POST['saldo'];



 mysqli_query($conn, "UPDATE `tb_usuarios` SET `usuario` = '$usuario', `nome` = '$nome', `email` = '$email', `senha` = '$senha', `pix` = '$pix', `saldo` = '$saldo' WHERE `id_user` = '$id_user'") or die(mysqli_error());


header("location: Painel.php");

}

?>