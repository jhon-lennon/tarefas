<?php
    
    include('conn.php');
    
    if(isset($_POST['email']) || isset($_POST['senha'])){

     if(strlen($_POST['email']) == 0){

       echo "preencha seu e-mail";
}
else if(strlen($_POST['senha']) == 0){
   echo "preencha sua senha";

}else{
$email = $conn->real_escape_string($_POST['email']);
$senha = $conn->real_escape_string($_POST['senha']);

$sql_code = "SELECT * FROM adm WHERE email = '$email' AND senha = '$senha'";
$sql_query = $conn->query($sql_code) or die("Falha na execução:".$mysqli->error);

$quantidade = $sql_query->num_rows;

if($quantidade == 1){
$usuario = $sql_query->fetch_assoc();

if(!isset($_SESSION)){
session_start();
}
$_SESSION['id'] = $usuario['id'];
$_SESSION['nome'] = $usuario['nome'];
$_SESSION['email'] = $usuario['email'];

header("Location: painel.php");
}else{
echo "falha ao logar! E-mail ou senha incorretos";
}
}

}
?>
    


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login - Painel</title>
         <meta charset="UTF-8">
        
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  
        <style>
            body{
width:400px;
}
.container{
margin-left:50%;


}
            .form-group{
           width: 600px;

padding:10px;

}
input{
font-size:20px;
}

.btn{
margin-left:10px;
}

            </style>
    
    </head>
    <body>
        <div class="container">
        <h2>Login</h2>
        
        <form method="POST"> 
            
            <div class="form-group"> 
                
                <label for="exampleInputEmail1">Email</label> 
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small></div>
             <div class="form-group"> 
            <label for="exampleInputPassword1">Password</label> 
            <input type="password" name="senha" class="form-control" id="exampleInputPassword1"></div>
             
             <button type="submit" class="btn btn-primary">Entrar</button> 
            </div>
        </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> 



    </body>
    </html>