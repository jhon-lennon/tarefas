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
  $filtro_sql = "WHERE id = '$filtro' OR usuario LIKE '%$filtro%' OR pix LIKE '%$filtro%'";
}

?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard - Saques Pendentes</h1>

  </div>

  <!-- Content Row -->
  

    <!-- Earnings (Monthly) Card Example -->

    <!-- Earnings (Monthly) Card Example -->
   

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 ">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center ">
            <div class="col mr-2 ">
              
              <div class="row no-gutters align-items-center ">
                Pendentes
                <div class="col-auto">
                  
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    
                  </div>
                </div>
              </div>
            </div>
            
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

<th>Nome</th>
<th>Email</th>
<th>Valor</th>

<th>Pix</th>

<th>Data</th>
<td>Estado</td>
</tr>

</thead>

<tbody style="background-color:#fff;">

<?php

require 'conn.php';

$query = mysqli_query($conn, "SELECT * FROM saques $filtro_sql") or die(mysqli_error());

while($fetch = mysqli_fetch_array($query)){

?>

<tr>
<td>Nome do usuário<strong><?php echo $fetch['nome']?></strong></td>
<td>com o email<strong><?php echo $fetch['email']?>"</strong></td>
<td>Pediu saque no valor de <strong>R$<?php echo $fetch['valor']?></strong></td>

<td>no pix <strong><?php echo $fetch['pix']?>"</strong></td>

<td>Na data: <strong><?php echo $fetch['data']?></strong></td>
<td>Situação <strong><?php echo $fetch['estado']?></strong></td>
<td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $fetch['id_user']?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>

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