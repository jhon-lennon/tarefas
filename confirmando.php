<?php
include('connection.php');
$perfil = $_POST['perfil'];
$usuario = $_POST['usuario']; 
$nome = $_POST['nome'];
$link = $_POST['link'];
$id_tarefa = $_POST['id_tarefa'];
$status = $_POST['status'];

$valor_tarefa = 0.01;

$sql = "SELECT * FROM `tb_tarefas_realizadas` WHERE `id_tarefa` = '{$id_tarefa}' AND `id_perfil` = '{$perfil}'";
$res = mysqli_query($conn, $sql);

if($res && mysqli_num_rows($res) == 0){

    $query = "INSERT INTO tb_tarefas_realizadas (id_tarefa,id_perfil,usuario,nome,link,status, perfil) VALUES('".$id_tarefa."', '".$perfil."', '".$usuario."', '".$nome."', '".$link."', '".$status."', (SELECT perfil FROM `Perfis_pendente` WHERE `id` = ".$perfil."
    ));";
    // UPDATE `tb_usuarios` SET `saldo` =  `saldo`+ ".$valor_tarefa." WHERE `tb_usuarios`.`usuario` = '".$usuario."'; //adiciona saldo do usuario
    $result = mysqli_query($conn,$query);
        
    $rows = mysqli_affected_rows($conn);
        
    if($rows > 0){
        echo "Confirmado com sucesso!";
        header("Location: Tarefas.php");
    }else{
        echo("houve um erro!");
    }
}
else{
    echo "Tarefa já realizada";
}

?>