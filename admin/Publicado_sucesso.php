<?php
    include_once('conn.php');
    
    $titulo = $_POST['titulo'];
    $mensagem = $_POST['mensagem'];
    $query = "";
 
    $query = "INSERT INTO atualizacoes (titulo,mensagem) VALUES('".$titulo."', '".$mensagem."')";
    mysqli_query($conn, $query);
    
    $rows = mysqli_affected_rows($conn);
    
    if($rows > 0){
   echo "Publicado com sucesso!";
header("Location: Publicar.php");
}else{
echo("houve um erro!");
}

?>