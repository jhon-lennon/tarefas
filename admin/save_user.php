
<?php

require_once 'conn.php';



if(ISSET($_POST['save'])){

$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$pix = $_POST['pix'];
$saldo = $_POST['saldo'];


$query = "INSERT INTO tb_usuarios (usuario, nome, email, senha, pix, saldo) VALUES ('$usuario','$nome','$email','$senha','$pix','$saldo')";
      

$result=mysqli_query($conn,$query);
      
      if($result){
        echo '<script> alert("Usuário Cadastrado"); </script>';
        header('Location: index.php ');
      }else{
        echo '<script> alert("Usuário não foi cadastrado"); </script>';
      }
    }
?>
