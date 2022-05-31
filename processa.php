<?php
    include_once('connection.php');
    
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $pix = $_POST['pix'];
    $saldo = $_POST['saldo'];
    $query = "";
    
    $query = "SELECT * FROM tb_usuarios WHERE usuario = '".$usuario."' OR email = '".$email."'";
    mysqli_query($conn, $query);
    
    $rows = mysqli_affected_rows($conn);
    if($rows > 0){
echo("Ops, usuário já está cadastrado!");
}
else{
 
    $query = "INSERT INTO tb_usuarios (nome,usuario,email,senha,pix,saldo) VALUES('".$nome."', '".$usuario."', '".$email."', '".$senha."', '".$pix."', '".$saldo."')";
    mysqli_query($conn, $query);
    
    $rows = mysqli_affected_rows($conn);
    
    if($rows > 0){
   //echo "Cadastrado com sucesso!";
header("Location: Login.php");
}else{
echo("houve um erro!");
}
}
?>