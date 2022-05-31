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

  $apagar = mysqli_query ($conn, "DELETE FROM tb_tarefas WHERE id='$id'");
  if($apagar){
    echo 'cadastro excluido';
  }
}?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard - Ações</h1>

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

    <!-- Pending Requests Card Example -->
<form method="POST">

  <div class="form-group">

  <h3>Pesquisar usuário</h3>
  <input type="text" name="filtro" placeholder="pesquisar..." class="form-control" value="<?php echo $_POST['filtro'];?>"/>
  </div>
  <button type="submit" class="btn btn-primary col-md-3" >Pesquisar</button>
</form>
<br>
<table class="table table-bordered">

<thead class="alert-success">

<tr>

<th>Perfil</th>

<th>Usuário</th>

<th>Link</th>

<th>Data</th>
<td>Ação</td>
</tr>

</thead>

<tbody style="background-color:#fff;">

<?php

require 'conn.php';

$query = mysqli_query($conn, "SELECT * FROM tb_tarefas_realizadas2 $filtro_sql") or die(mysqli_error());

while($fetch = mysqli_fetch_array($query)){

?>

<tr>
<td>O perfil: <strong><?php echo $fetch['perfil']?></strong></td>
<td>do usuário: <strong><?php echo $fetch['usuario']?></strong></td>

<td>Realizou a tarefa: <strong><a href="<?php echo $fetch['link']?>"><?php echo $fetch['nome']?></a></a></strong></td>

<td>Na data: <strong><?php echo $fetch['data']?></strong></td>
 <td> <a class="btn btn-danger" href="?id=<?php echo $fetch['id'];?>">Excluir</a></td>
</tr>

<?php



include 'update_user.php';



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