<?php
include('connection.php');
    
    $valor = $_POST['valor = 15'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pix = $_POST['pix'];
    $data = $_POST['data'];
    $query = "INSERT INTO saques (valor,nome,email,pix,data) VALUES('".$valor."', '".$nome."', '".$email."', '".$pix."', '".$data."')";
    mysqli_query($conn, $query);
    
    $rows = mysqli_affected_rows($conn);
    
    if($rows > 0){
   echo "Saque realizado com sucesso!<br>Em até 5 dias você receberar o pagamento.";
}else{
echo("houve um erro!");
}
?>