<?php
require_once('connection.php');
if(!isset($_SESSION)){
 session_start();
 $_SESSION['id_user'];

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGA MAIS BRASIL- Histórico de tarefas</title>
    


  <link rel="stylesheet" href="style.css">
    
    <!--fonte google-->
    
  	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
<!-- biblioteca aos-->

 <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
 <!--font awesome-->
 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
   <!--Bootstrap-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.css" integrity="sha512-Ty5JVU2Gi9x9IdqyHN0ykhPakXQuXgGY5ZzmhgZJapf3CpmQgbuhGxmI4tsc8YaXM+kibfrZ+CNX4fur14XNRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  body{
    background-color: #c0c0c0;
  }
.card-profile{
 height: 800px;
}
.card-connect{
  height: 700px;
  padding: 5px;
}
form{
  padding: 5px;
}
img{
  width: 60px;
       height: 60px;
       position: absolute;
       bottom:-40px;
       left: 50px;
}
select{
padding:5px;
  border:none;
  background-color: aliceblue;
}
</style>
</head>

<body>
 <header>
      <nav id="main-navbar" class="navbar navbar-expand-lg">
        <a href="painel.php" class="navbar-brand">
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

   <h2>Todas as suas tarefas validadas</h2>
              <table class="table table-bordered">

<thead class="alert-success">

<tr>

<th>#id</th>

<th>link</th>

<th>Ação</th>
</tr>

</thead>

<tbody style="background-color:#fff;">

<?php



$query = mysqli_query($conn, "SELECT * FROM tb_tarefas_realizadas2 WHERE id_tarefa ='". $_SESSION['id_user']."'") or die(mysqli_error());

while($fetch = mysqli_fetch_array($query)){

?>

<tr>
<td><?php echo $fetch['id']?></td>
<td><a href="<?php echo $fetch['link']?>">Ver link</a></td>


<td><button class="btn btn-danger" data-toggle="modal" type="button" data-target="#update_modal<?php echo $fetch['id_user']?>"><span class="glyphicon glyphicon-edit"></span> Excluir</button></td>

</tr>

<?php



//include 'update_user.php';



}

?>

</tbody>

</table>        
              
             
          
  
  </div>
  <script src="main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.js" integrity="sha512-0agUJrbt+sO/RcBuV4fyg3MGYU4ajwq2UJNEx6bX8LJW6/keJfuX+LVarFKfWSMx0m77ZyA0NtDAkHfFMcnPpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
