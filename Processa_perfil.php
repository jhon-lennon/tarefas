<?php
    include_once('connection.php');
    
    $perfil = $_POST['perfil'];
    $genero = $_POST['genero'];
    $codigo = $_POST['codigo'];
    //
    $query = "";
    
    $query = "SELECT * FROM Perfis_pendente WHERE perfil = '".$perfil."'";
    mysqli_query($conn, $query);
    
    $rows = mysqli_affected_rows($conn);
    if($rows > 0){
echo("Ops, essa conta já foi cadastrada");
}
else{
 
    $query = "INSERT INTO Perfis_pendente (perfil,genero,codigo,status) VALUES('".$perfil."', '".$genero."', '".$codigo."', 'Pendente')";
    mysqli_query($conn, $query);
    
    $rows = mysqli_affected_rows($conn);
    
    if($rows > 0){
    header("Location: Conectarcontas.php");
   echo "Seu Perfil está pendente, não tire o código da bio até que seu perfil seja analisado";
}else{
echo("houve um erro!");
}
}
?>