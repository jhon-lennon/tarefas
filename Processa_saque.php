<?php
include('connection.php');
  session_start();
 $_SESSION['id_user'];
  $_SESSION['saldo'];

if($_SESSION['saldo'] - $_POST['valor'] < 0){
  echo 'Você não pode sacar mais do que'.$_SESSION ['saldo'];
}else{ 
$valor = $_POST['valor'];
$query = "UPDATE tb_usuarios SET `saldo` = saldo -$valor WHERE id_user = '".$_SESSION['id_user']."'"; mysqli_query($conn, $query);

$rows = mysqli_affected_rows($conn); 
if($rows > 0){ $_SESSION['saldo'] = $_SESSION['saldo'] - $_POST['valor']; 
$id_user = $_POST['id_user'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$pix = $_POST['pix'];
$estado = $_POST['estado'];

$query = "INSERT INTO saques (id_saque,valor,nome,email,pix,estado) VALUES($id_user,'$valor', '$nome', '$email', '$pix', '$estado')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_affected_rows($conn);
header("Location: Saque.php");
}

else{ 
  
  echo "error";
  
} 
}
?>