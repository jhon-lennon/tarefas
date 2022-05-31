<?php
require_once 'conn.php';
$id = $_POST['id'];
$perfil = $_POST['perfil'];
$genero = $_POST['genero'];

$query = "INSERT INTO tb_perfis (id_user, perfil, genero) VALUES ('$id','$perfil','$genero')";
      

$result=mysqli_query($conn,$query);
      
      if($result){
        echo '<script> alert("tarefa cadastrada"); </script>';
        header('Location: Perfis_pendentes.php ');
      }else{
        echo '<script> alert("Usuário não foi cadastrado"); </script>';
      }
    


?>