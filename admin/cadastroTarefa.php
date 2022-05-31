
<?php

require_once 'conn.php';

$nome = $_POST['nome'];
$link = $_POST['link'];
$quantidade = $_POST['quantidade'];



$query = "INSERT INTO tb_tarefas (nome, link, quantidade) VALUES ('$nome','$link','$quantidade')";
      

$result=mysqli_query($conn,$query);
      
      if($result){
        echo '<script> alert("tarefa cadastrada"); </script>';
        header('Location: Cadastrar_tarefas.php ');
      }else{
        echo '<script> alert("Usuário não foi cadastrado"); </script>';
      }
    
?>
