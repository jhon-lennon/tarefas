<?php
include('conn.php');
//include('protect.php');

if(!isset($_SESSION)){
 session_start();
$_SESSION['id'];
}
include('protect.php');
include('includes/header.php'); 

include('includes/navbar.php'); $filtro_sql = "";

if($_POST != NULL){

  $filtro = $_POST["filtro"];
  $filtro_sql = "WHERE id_user = '$filtro' OR usuario LIKE '%$filtro%'";
}
if(isset($_GET['id'])){


  $id = $_GET['id'];

  $apagar = mysqli_query ($conn, "DELETE FROM tb_usuarios WHERE id='$id'");
  if($apagar){
    echo 'cadastro excluido';
  }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">apinel</h1>
    
  </div>
<h3 class="text-primary">Seja bem vindo(a) de volta, <?php echo $_SESSION['nome'];?></h3>
  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de usuários Registrados</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

               <h4>Total:</h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Usuários online</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">10%</div>
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
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<div class="col-md-3"></div>

<div class="col-md-6 well">

<h3 class="text-primary">Painel administrativo siga mais brasil</h3>

<hr style="border-top:1px dotted #ccc;"/>

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add usuário</button>

<br /><br />

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

<th>#id</th>

<th>usuário</th>

<th>nome</th>

<th>saldo</th>
<td>Ação</td>
</tr>

</thead>

<tbody style="background-color:#fff;">

<?php

require 'conn.php';

$query = mysqli_query($conn, "SELECT * FROM tb_usuarios $filtro_sql") or die(mysqli_error());

while($fetch = mysqli_fetch_array($query)){

?>

<tr>
<td><?php echo $fetch['id_user']?></td>
<td><?php echo $fetch['usuario']?></td>

<td><?php echo $fetch['nome']?></td>

<td>R$<?php echo $fetch['saldo']?></td>

<td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $fetch['id_user']?>"><span class="glyphicon glyphicon-edit"></span> Editar</button></td>
   <td> <a class="btn btn-danger" href="?id=<?php echo $fetch['id'];?>">Excluir</a></td>
</tr>

<?php



include 'update_user.php';



}

?>

</tbody>

</table>

</div>

<div class="modal fade" id="form_modal" aria-hidden="true">

<div class="modal-dialog">

<div class="modal-content">

<form method="POST" action="save_user.php">

<div class="modal-header">

<h3 class="modal-title">Adicionar Usuário</h3>

</div>

<div class="modal-body">

<div class="col-md-2"></div>

<div class="col-md-8">
<div class="form-group">

<label>Usuário</label>

<input type="text" name="usuario" class="form-control" placeholder="Usuário" required="required"/>

</div>
<div class="form-group">

<label>nome</label>

<input type="text" name="nome" class="form-control" placeholder="Nome Completo" required="required"/>

</div>

<div class="form-group">

<label>Email</label>

<input type="text" name="email" class="form-control" placeholder="Seu@gmail.com" required="required" />

</div>
<div class="form-group">

<label>Senha</label>

<input type="password" name="senha" class="form-control" placeholder="Senha" required="required" />

</div>
<div class="form-group">

<label>Pix</label>

<input type="text" name="pix" class="form-control" placeholder="Chave pix" required="required" />

</div>
<div class="form-group">



<input type="hidden" name="saldo" class="form-control" value="0.00"/>

</div>
</div>
</div>

<div style="clear:both;"></div>

<div class="modal-footer">

<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Cadastrar</button>

<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Fechar</button>

</div>

</div>

</form>

</div>

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