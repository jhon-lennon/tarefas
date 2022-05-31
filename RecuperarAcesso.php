<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Socialzey - Recuperar acesso</title>
    <link rel="stylesheet" href="style.css"/>
    
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
   background-image: linear-gradient(to right, #6E1A87, #CA12FF, #6E1A87);
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
    .container input[type="email"]{
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
      margin-left: 33%;
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
    .container a{
     
       color:#2061E5;
       font-size: 15px;
       margin-left: 110px;
    }
    .container p{
      margin-left: 110px;
    }
    </style>
</head>

<body>
<div class="container">
  <h1>Recuperar Acesso</h1>
  <br>
  <form method="post">
    
    <label>Email</label>
    <br>
    <input type="email" name="emailacesso" placeholder="email" required/>
    <br>
  
   <input type="submit" value="RECUPERAR"/>
   <br>
   <br>
    <p>Não tem uma conta?</p><a href="Cadastro.html">Criar conta agora</a>
  </form>
</div>
<script src="main.js"></script>
</body>

</html>