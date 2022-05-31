<?php
include('protect.php');
if(!isset($_SESSION)){
 session_start();

}

?>

 <!-- header antigo
  <header id="header">
    <a id="logo" href=""><img class="img-logo" src="Imagens/Logo.png"/></a>
    <nav id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu">
        <li><a href="painel.html">INÍCIO</a></li>
        <li><a href="Saque.php">SAQUE</a></li>
        <li><a href="suporte.html">CONTATO</a></li>
        <li><a href="logout.php">SAIR</a></li>
      </ul>
    </nav>
  </header>
  -->

<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Socialzey - Painel</title>
     <!-- css links-->
     <link rel="shortcut icon" href="Imagens/Logo.png">
    <link rel="stylesheet" href="style.css">
    <!--boostrap css-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.css" integrity="sha512-Ty5JVU2Gi9x9IdqyHN0ykhPakXQuXgGY5ZzmhgZJapf3CpmQgbuhGxmI4tsc8YaXM+kibfrZ+CNX4fur14XNRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--fonte google-->
  	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
<!-- biblioteca aos-->
 <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
 <!--font awesome-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
   <style>
   *{
     padding:0;
     margin:0;
   }
   body{
     background-color:	#FFFFFF;
   }
   header{
    /* width: 100%;
     background-image: linear-gradient(to right, #6E1A87, #CA12FF, #6E1A87);*/
   }
     img{
       width: 90px;
       height: 90px;
       position: absolute;
       bottom:-40px;
       left: 50px;
     }
     .link-options{
       color:white;
     }
     .box-element{
       display: flex;
       align-items: center;
       width: 100%;
       margin-left:0px;
     }
     .box-model{
       width: 350px;
     }
     .box-model2 {
       width: 350px;
     }
     .box-model3{
       width: 350px;
     }
     footer{
       width: 100%;
       
     }
     .nav-link{
       
     }
     .container{
       width:360px;
       height: 700px;
       background-color: #1E90FF;
     }
   </style>
</head>

<body>
 <header>
      <nav id="main-navbar" class="navbar navbar-expand-lg">
        <a href="" class="navbar-brand">
          <img class="img" src="Imagens/logo.png" alt="logo" id="logo">
          <span id="moviestar-title">Socialzey</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        
 <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              
              <a href="painel.php" class="nav-link">Painel</a>
            </li>
                        <li class="nav-item">
              <a href="Tarefas_realizadas.php" class="nav-link">Histórico de tarefas</a>
              </li>
            <li class="nav-item">
              <a href="Saque.php" class="nav-link">Sacar</a>
              </li>
            <li class="nav-item">
              <a href="atualizacoes.php" class="nav-link">Atualizações</a>
              </li>
                          <li class="nav-item">
              <a href="logout.php" class="nav-link">Sair</a>
              </li>
          </ul>
        </div>
      </nav>
    </header>

  <br>
               <font color="#FF0000">
  <h1 class="text-center">Atualizações</h1>
              </font>
  <?php 
                include_once 'connection.php';
                $query = "SELECT * FROM atualizacoes ORDER BY id DESC ";
                $result = mysqli_query($conn, $query);
                while($array = mysqli_fetch_assoc($result)){
            ?>
            
            <div id="container-tasks" class="container"><br>
               <font color="#FFFFFF">
                <h2><?php echo $array['titulo'];?></h2>
                </font>
                <i class="fas fa-bullhorn fa-2x" style="color:#FBFBEF"></i>
                <br>
                 <font color="#FFFFFF">
                <p><?php echo $array['mensagem'];?></p>
                </font>
                <br>

            
            <br>
            </div>
            <?php } ?>
        </div>
<br>
<br>
<footer class="text-center">
    
    &copy;Socialzey 2022 - Todos os direitos reservados
    </footer>
<script src="main.js"></script>
<!-- Jquery e javascript boostrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.js" integrity="sha512-0agUJrbt+sO/RcBuV4fyg3MGYU4ajwq2UJNEx6bX8LJW6/keJfuX+LVarFKfWSMx0m77ZyA0NtDAkHfFMcnPpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
