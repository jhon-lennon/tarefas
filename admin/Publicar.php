<?php

include('conn.php');
if(!isset($_SESSION)){
 session_start();
$_SESSION['id'];
}
include('protect.php');



include('includes/header.php'); 

include('includes/navbar.php'); 
$filtro_sql = "";



if($_POST != NULL){

  $filtro = $_POST["filtro"];
  $filtro_sql = "WHERE id = '$filtro' OR perfil LIKE '%$filtro%' OR data LIKE '%$filtro%'";
}
if(isset($_GET['id'])){

  $id = $_GET['id'];

  $apagar = mysqli_query ($conn, "DELETE FROM atualizacoes WHERE id='$id'");
  if($apagar){
    echo 'cadastro excluido';
  }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard - Publicar</h1>

  </div>

  <!-- Content Row -->
  

    <!-- Earnings (Monthly) Card Example -->

    <!-- Earnings (Monthly) Card Example -->
   

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
<form action="Publicado_sucesso.php" method="POST">
  <label for="titulo">Título</label>
  <input class="form-control" type="text" name="titulo" placeholder="Titulo da Postagem..."/>
  <label for="mensagem">Mensagem</label>
  <textarea class="form-control" name="mensagem" placeholder="Escreva a mensagem..."></textarea>
  <br>
  <button class="btn btn-success" type="submit">Publicar</button>
</form>
<br>
    <!-- Pending Requests Card Example -->
<form method="POST">

  <div class="form-group">

  <h3>Pesquisar Publicações</h3>
  <input type="text" name="filtro" placeholder="pesquisar..." class="form-control" value="<?php echo $_POST['filtro'];?>"/>
  </div>
  <button type="submit" class="btn btn-primary col-md-3" >Pesquisar</button>
</form>
<br>
<table class="table table-bordered">

<thead class="alert-success">

<tr>

<th>id</th>

<th>Título</th>

<th>Mensagem</th>

<th>Data</th>

</tr>

</thead>

<tbody style="background-color:#fff;">

<?php

require 'conn.php';

$query = mysqli_query($conn, "SELECT * FROM atualizacoes  $filtro_sql") or die(mysqli_error());

while($fetch = mysqli_fetch_array($query)){

?>

<tr>
<td><?php echo $fetch['id']?></td>
<td><?php echo $fetch['titulo']?></td>

<td><?php echo $fetch['mensagem']?></td>

<td><?php echo $fetch['data']?></td>

<td>
  <a class="btn btn-danger" href="?id=<?php echo $fetch['id'];?>">Excluir</a>

</tr>

<?php



//include 'update_user.php';



}

?>







</tbody>

</table>

</div>



</div> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/jquery-3.2.1.min.js"></script> 

<script src="js/bootstrap.js"></script> 




  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');

?>