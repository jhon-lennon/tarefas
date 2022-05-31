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
  //$apagar = mysqli_query ($conn, "DELETE FROM Perfis_pendente WHERE id='$id'");
  $aprovar = mysqli_query ($conn, "UPDATE Perfis_pendente SET status = 'Aprovado' WHERE id='$id'");
  //if($apagar){
    //echo 'cadastro excluido';
  //}
  if($aprovar){
    echo 'cadastro aprovado';
  }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard - Perfis pendentes</h1>

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
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Aguardando</div>
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
<hr style="border-top:1px dotted #ccc;"/>
     <?php
      
$query  = mysqli_query($conn, "
SELECT * FROM tb_perfis");
?>
<form method="POST" action="cadastrarPerfil.php">

  <select name="id">
              
            <?php
              while($array= mysqli_fetch_array($query)){
              
              ?>

<option value="<?php echo $array['id_user'];?>">
<?php echo $array['id_user'];?>
      </option>
                  <?php } ?>
            </select>
   
 
  <br>
    <label for="link">Nome do Perfil</label>
  <input class="form-control" type="perfil" name="perfil" placeholder="instagram.com/@usuario"/>
  <br>
    <label for="quantidade">Gênero</label>
   <select name="genero">
     <option value="Masculino">Masculino</option>
     <option value="Feminino">Feminino</option>
   </select>
   <br>
  <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Cadastrar Perfil</button>
</form>
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

<th>id</th>

<th>Perfil</th>

<th>Gênero</th>

<th>Código</th>

<th>Status</th>

<th>Data</th>
</tr>

</thead>

<tbody style="background-color:#fff;">

<?php

require 'conn.php';

$query = mysqli_query($conn, "SELECT * FROM Perfis_pendente $filtro_sql") or die(mysqli_error());

while($fetch = mysqli_fetch_array($query)){

?>

<tr>
<td><?php echo $fetch['id']?></td>
<td><?php echo $fetch['perfil']?></td>

<td><?php echo $fetch['genero'] ?></td>

<td><?php echo $fetch['codigo']?></td>

<td><?php echo $fetch['status']?></td>

<td><?php echo $fetch['data']?><a class="btn btn-danger" href="?id=<?php echo $fetch['id'];?>">Excluir</a><a class="btn btn-success" href="?id=<?php echo $fetch['id'];?>">Aprovar</a></td></td>


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