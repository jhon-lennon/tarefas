<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGA MAIS BRASIL</title>
    <!-- css links-->
    <link rel="stylesheet" href="style.css">
     <link rel="shortcut icon" href="Imagens/Logo.png">
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
   justify-content: center;
   
    }
    div.container{
    
      display:flex;
      flex-direction:column;
      background-color: white;
      width:400px;
      height: 700px;
      margin-top: 50px;
      margin-left:450px;
      border-radius:5%;
      box-shadow:0px 0px 20px 0px #636767;
    }
    .container label{
      margin-left: 25%;
      font-size:20px;
     
    }
    .container input[type="text"], input[type="password"], input[type="email"]{
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
      margin-left: 30%;
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
       
       
       
    }
    .container p{
      margin-left: 110px;
    }
    .btn{
      background-image: linear-gradient(to right, #005AFF,#0065FF ,#0065FF);
      color:white;
      border:none;
      border-radius:5px;
      padding:10px 25px;
      width: 240px;
      margin-left: 22%;
    }
    @media (max-width: 600px){
     div.container{
      display:flex;
      flex-direction:column;
      background-color: white;
      width:400px;
      height: 700px;
      margin-top: 50px;
      margin-left:30px;
      border-radius:5%;
      box-shadow:0px 0px 20px 0px #636767;
    }
    }
</style>
</head>

<body>
<div class="container">
  <h1>SE CADASTRE</h1>
  <br>
  <form method="POST" action="processa.php">
      <label>Nome</label>
    <input type="text" name="nome" placeholder="Nome completo" required/>
    <br>
    <br>
    <label>Usuário</label>
    <input type="text" name="usuario" placeholder="Username" required/>
    <br>
    <br>
      <label>Email</label>
    <input type="email" name="email" placeholder="email" required/>
    <br>
    <br>
      <label>Senha</label>
    <input type="password" name="senha" placeholder="Password" required/>
    <br>
    <label>Chave Pix</label>
    <input type="text" name="pix" placeholder="chave" required/>
    <input type="submit" value="CRIAR CONTA"/>
  </form>
<a href="Login.php" class="btn">JÁ TENHO UMA CONTA</a>
 <br>
</div>
<br>
</body>

</html>