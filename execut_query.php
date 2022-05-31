<?php 

if (isset($_POST['perfil'])) {
    $perfil = $_POST['perfil'];
}
else
{
    echo json_encode(['Dados N enviados']);
    exit();
}
    
    include_once('connection.php');
    
    $query = "SELECT DISTINCT tarefa.id, tarefa.nome, tarefa.link FROM `tb_tarefas` tarefa WHERE tarefa.nome
    NOT IN (SELECT t_real.nome FROM `tb_tarefas_realizadas2` t_real WHERE t_real.perfil = '$perfil') ORDER BY RAND() LIMIT 1";
    
    $result = mysqli_query($conn, $query);
    $array = mysqli_fetch_assoc($result);

    if($array > 0){
        echo json_encode($array);
    }
    else{
        echo json_encode(['nome' => 'null']);
    }
    