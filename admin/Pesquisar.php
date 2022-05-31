<?php

require_once('conn.php');
$pagina = (isset($_GET['pagina']))? $_GET['pagina']:1;
$valor_pesquisar = $_GET['pesquisar'];
?>
 

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  

</head>

<body>

<nav class="navbar navbar-default">

<div class="container-fluid">

<a class="navbar-brand" href="https://sourcecodester.com">Painel adm</a>

</div>

</nav>

<div class="col-md-3"></div>

<div class="col-md-6 well">

<h3 class="text-primary">Painel administrativo ZeySocial</h3>

<hr style="border-top:1px dotted #ccc;"/>

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add usuário</button>

<br /><br />

<form action="Pesquisar.php" method="GET">
  <div class="form-group">
  <h3>Pesquisar usuário</h3>
  <input type="search" name="pesquisar" placeholder="pesquisar..." class="form-control"/>
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

$query = mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE usuario LIKE '%$pesquisar%'") or die(mysqli_error());

while($fetch = mysqli_fetch_array($query)){

?>

<tr>
<td><?php echo $fetch['id_user']?></td>
<td><?php echo $fetch['usuario']?></td>

<td><?php echo $fetch['nome']?></td>

<td>R$<?php echo $fetch['saldo']?></td>

<td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $fetch['id_user']?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>

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

<h3 class="modal-title">Add User</h3>

</div>

<div class="modal-body">

<div class="col-md-2"></div>

<div class="col-md-8">
<div class="form-group">

<label>Usuário</label>

<input type="text" name="usuario" class="form-control" required="required"/>

</div>
<div class="form-group">

<label>nome</label>

<input type="text" name="nome" class="form-control" required="required"/>

</div>

<div class="form-group">

<label>Email</label>

<input type="text" name="email" class="form-control" required="required" />

</div>
<div class="form-group">

<label>Senha</label>

<input type="text" name="senha" class="form-control" required="required" />

</div>
<div class="form-group">

<label>Pix</label>

<input type="text" name="pix" class="form-control" required="required" />

</div>
<div class="form-group">



<input type="hidden" name="saldo" class="form-control" value="0.00"/>

</div>
</div>
</div>

<div style="clear:both;"></div>

<div class="modal-footer">

<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>

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

</body> 

</html>