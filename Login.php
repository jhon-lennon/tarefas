<?php
    include('connection.php');
    
    if(isset($_POST['email']) || isset($_POST['senha'])){

     if(strlen($_POST['email']) == 0){

       echo "preencha seu e-mail";
}
else if(strlen($_POST['senha']) == 0){
   echo "preencha sua senha";

}else{
$email = $conn->real_escape_string($_POST['email']);
$senha = $conn->real_escape_string($_POST['senha']);

$sql_code = "SELECT * FROM tb_usuarios WHERE email = '$email' AND senha = '$senha'";
$sql_query = $conn->query($sql_code) or die("Falha na execução:".$mysqli->error);

$quantidade = $sql_query->num_rows;

if($quantidade == 1){
$usuario = $sql_query->fetch_assoc();

if(!isset($_SESSION)){
session_start();
}
$_SESSION['id_user'] = $usuario['id_user'];
$_SESSION['email'] = $usuario['email'];
$_SESSION['senha'] = $usuario['senha'];
$_SESSION['usuario'] = $usuario['usuario'];
$_SESSION['pix'] = $usuario['pix'];
$_SESSION['saldo'] = $usuario['saldo'];
header("Location: painel.php");
}else{
  
  //header("Location: Login.php");
echo "<p style='color:white;'>falha ao logar! E-mail ou senha incorretos";

}
}

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGA MAIS BRASIL - Entrar</title>
    <link rel="stylesheet" href="style.css"/>
     <link rel="shortcut icon" href="Imagens/Logo.png">
    <!-- css links-->
    <link rel="stylesheet" href="style.css">
    
    <!--fonte google-->
  	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
<!-- biblioteca aos-->
 <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
 <!--font awesome-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
    }
    body{
    background-color:#0290c7;
   display:flex;
   
   justify-content: center;
   
    }
    div.container{
    
      display:flex;
      flex-direction:column;
      background-color: white;
      width:400px;
      height: 600px;
      margin-top: 50px;
      border-radius:5%;
      box-shadow:0px 0px 20px 0px #636767;
    }
    .container label{
      margin-left: 25%;
      font-size:20px;
     
    }
    .container input[type="email"], input[type="password"]{
      border-radius:5px;
      border:none;
      outline: none;
      color:black;
      font-size: 15px;
      padding:12px;
      margin-left: 20%;
      border:none;
      box-shadow: 0px 2px #20E598;
     
    }
    .container input[type="submit"]{
      font-size: 15px;
      color:white;
      background-image: linear-gradient(to right, #41D47A, #22CE9A, #22CEB9);
       padding:10px 30px;
      margin-left: 37%;
      border:none;
      border-radius:5px;
      margin-top: 60px;
    }
    .container input[type="submit"]:hover{
      background-image: linear-gradient(to right, white, ghostwhite, white);
      color: green;
    }
    .container h1{
      padding:5px;
      box-shadow: 0px 5px #20E598;
      width: 90px;
    }
   
    
    .container p{
      margin-left:130px;
    }
    .btn{
      background-image: linear-gradient(to right, #005AFF,#0065FF ,#0065FF);
      color:white;
      border:none;
      border-radius:5px;
      padding:10px 25px;
      width: 240px;
      margin-left: 28%;
    }
    .btn2{
      background-image: linear-gradient(to right, #FF0035,#FF0000 ,#FF0000);
      color:white;
      border:none;
      border-radius:5px;
      padding:10px 25px;
      width: 240px;
      margin-left: 28%;
    }
    </style>
</head>

<body>
<div class="container">
  
  <h1>Login</h1>
  <br>
  <form method="POST" action="">
    
    <label>Seu E-mail</label>
    <br>
    <input type="email" name="email" placeholder="email" required/>
    <br>
   <br><label>Sua Senha</label>
    <br>
    <input type="password" name="senha"
    placeholder="Password" required/>
    <br>

   <input type="submit" name="submit" value="ENTRAR"/>
   <br>
   <br>
    <p>Não tem uma conta?</p>
    <br>
    <a class="btn" href="Cadastro.php">CRIAR CONTA</a>
    <br>
    <br>
    <a class="btn2" href="RecuperarAcesso.php">ESQUECI MINHA SENHA</a>
  </form>
    
</div>
<script src="main.js">="suportezeyinsta@gmail.com"</script>
</body>

</html>
