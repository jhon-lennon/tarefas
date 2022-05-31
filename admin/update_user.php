
<div class="modal fade" id="update_modal<?php echo $fetch['id_user']?>" aria-hidden="true">

<div class="modal-dialog">

<div class="modal-content">

<form method="POST" action="update_query.php">

<div class="modal-header">

<h3 class="modal-title">Editar dados</h3>

</div>

<div class="modal-body">

<div class="col-md-2"></div>

<div class="col-md-8">

<div class="form-group">

<label>Saldo</label>

<input type="text" name="saldo" value="<?php echo $fetch['saldo']?>" class="form-control" required="required"/>

</div>
<div class="form-group">

<label>Usuário</label>

<input type="hidden" name="id_user" value="<?php echo $fetch['id_user']?>"/>

<input type="text" name="usuario" value="<?php echo $fetch['usuario']?>" class="form-control" required="required"/>

</div>

<div class="form-group">

<label>nome</label>

<input type="text" name="nome" value="<?php echo $fetch['nome']?>" class="form-control" required="required" />

</div>
<div class="form-group">

<label>Email</label>

<input type="text" name="email" value="<?php echo $fetch['email']?>" class="form-control" required="required"/>

</div>
<div class="form-group">

<label>Chave Pix</label>

<input type="text" name="pix" value="<?php echo $fetch['pix']?>" class="form-control" required="required"/>

</div>
<div class="form-group">

<label>Senha</label>

<input type="password" name="senha" value="<?php echo $fetch['senha']?>" class="form-control" required="required"/>

</div>
</div>

</div>

<div style="clear:both;"></div>

<div class="modal-footer">

<button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Salvar</button>

<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Fechar</button>

</div>

</div>

</form>

</div>

</div>

</div>

