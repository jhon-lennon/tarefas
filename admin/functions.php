<?php
function getIp(){
  return $_SERVER['REMOTE_ADDR'];
}
function getTime(){
  date_default_timezone_set('America/Pernambuco');
  return date() + (60*10);
}
function verifica_ip_online($conn){
  $ip = getIp();
  $query = $conn->prepare("SELECT * FROM usuarios_on WHERE ip = ?");
  $query->bind_param("s", $ip);
  $query->execute();
  return $query->get_result()->num_rows;
}
function deleta_linhas($conn){
  $tempo = getTime() - (60*20);
  $query = $conn->prepare("DELETE FROM usuarios_on WHERE tempo < ?");
  $query->bind_param("s", $tempo);
  $query->execute();
}
function grava_ip_online($conn){
  deleta_linhas($conn);
  $ip = getIp();
  $tempo = getTempo();
  if(verifica_ip_online($conn) <= 0){
    
  }
}
?>