
<?php
include('connection.php');
if(!isset($_SESSION)){
      session_start();
}
include('protect.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siga Mais Brasil - Painel</title>
    <link rel="stylesheet" href="painel.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<body>
   <header>
       <img src="imgs/logo.png"/>
       <a href="painel.php">Painel</a>
       <a href="logout.php">Sair</a>
   </header>
   <div class="cards">
       <div class="card_one">
           <div class="user"><i class="fa-solid fa-user"></i></div>
           <p>olá,<br>
            <?php echo $_SESSION['usuario'];?>
           </p>
           </div>
           <br>
       <div class="card_two">
        <div class="balance"><i class="fa-solid fa-money-bill-1-wave"></i></div>
        <p>Saldo<br>
        R$ <?php echo $_SESSION['saldo'];?></p>
        </div>
        <br>
      <div class="card_three">
        <div class="total"><i class="fa-solid fa-building-columns"></i></div>
        <p>Receba pelo<br>Pix</p>
        </div>
   </div>
   <div class="container">
     <h2>Comece por aqui</h2>
     <div class="options">
      <a href="Conectarcontas.php">Conectar Contas</a>
      <a href="Tarefas.php">Realizar tarefas</a>
      <a href="Saque.php">Fazer saque</a>
     </div>
   </div>
   <div class="updates">
       <h2>ATUALIZAÇÕES</h2>
       <?php 
       include_once 'connection.php';
       $query = "SELECT * FROM atualizacoes ORDER BY id DESC ";
       $result = mysqli_query($conn, $query);
       while($array = mysqli_fetch_assoc($result)){
   ?>
       <div class="messages">
        <br>
        <h3><?php echo $array['id'];?> - <?php echo $array['titulo'];?></h3>
        <br>
        <p>Publicado em: <?php echo $array['data'];?></p>
        <p><?php echo $array['mensagem'];?></p>
    </div>
    <?php } ?>
   </div>
   
   
  <!-- <footer>
       <p>&copy;Siga Mais Brasil - Todos Os Direitos Reservados.</p>
   </footer>-->
   <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <footer>
        <p>&copy;SigaMaisBrasil - Todos Os Direitos Reservados.</p>
    </footer>
</body>
</html>