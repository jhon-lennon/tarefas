<?php
include('connection.php');
$perfil = $_POST['perfil'];
$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$link = $_POST['link'];
$status = $_POST['status'];
$id_usuario = $_POST['id_user'];

function atualizar_saldo($cone, $id_usu)
{
  $valor_tarefa = 0.006;
  $sql_saldo =  "UPDATE `tb_usuarios` SET `saldo` =  `saldo`+ " . $valor_tarefa . " WHERE `id_user` = '" . $id_usu . "'"; //adiciona saldo

  mysqli_query($cone, $sql_saldo);
  return;
}

$query1 = "SELECT * FROM tb_tarefas_realizadas2 WHERE perfil = '" . $perfil . "' AND  nome = '" . $nome . "'";
mysqli_query($conn, $query1);
$rows = mysqli_affected_rows($conn);

if ($rows > 0) {
  echo "<strong style='color:red;'>Você já realizou essa tarefa :(<br> </strong>";
} else {

  atualizar_saldo($conn, $id_usuario);

  $query1 = "INSERT INTO tb_tarefas_realizadas2 (perfil,usuario,nome,link,status) VALUES('" . $perfil . "', '" . $usuario . "', '" . $nome . "', '" . $link . "', '" . $status . "')";
  $result = mysqli_query($conn, $query1);

  $rows = mysqli_affected_rows($conn);

  if ($rows > 0) {
    $msg =  "Tarefa realizada com sucesso!";
  }
}

$query = "SELECT DISTINCT tarefa.id, tarefa.nome FROM `tb_tarefas` tarefa WHERE tarefa.nome
    NOT IN (SELECT t_real.nome FROM `tb_tarefas_realizadas2` t_real WHERE t_real.perfil = '$perfil') ORDER BY RAND() LIMIT 1";

$result = mysqli_query($conn, $query);
$array = mysqli_fetch_assoc($result);

$msg = ['perfil' => $array, 'msg' => $msg];

if ($array > 0) {
  echo json_encode($msg);
} else {
  echo json_encode(['nome' => 'null']);
}
