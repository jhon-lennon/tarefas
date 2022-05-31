<?php
 // include('Protect2.php');
   include('connection.php');

  
  
if(!isset($_SESSION)){
  session_start();
  $_SESSION['id_user'];
  $_SESSION['saldo'];
}
  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Saque</title>
    <link rel="stylesheet" href="painel.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
       
    </style>
  
</head>
<body>
    <header>
        <img src="imgs/logo.png"/>
        <a href="painel.php">Painel</a>
        <a href="logout.php">Sair</a>
    </header>
    <h1 class="h1_saque">Solicite seu saque!</h1>

    <div class="list_payment" id="list">
        
    <div class="container_payment">
        <h2>Seu saldo é R$<?php echo $_SESSION['saldo'];?></h2>
        <form method="POST" action="Processa_saque.php">
            <label>Digite o valor que deseja sacar</label>
         <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'];?>">
          <input id="valor" type="number" name="valor" placeholder="valor" required/>
          <br>
          <input class="btn-color" id="nome" type="hidden" name="nome" placeholder="Nome Completo" value=" <?php echo $_SESSION['nome']; ?>"/>
          <br>
          <input class="btn-color" id="email" type="hidden" name="email" placeholder="E-mail"  value="<?php echo $_SESSION['email'];?> "/>
          
            
          <input class="btn-color" id="pix" type="hidden" name="pix" placeholder="Sua Chave" value=" <?php echo $_SESSION['pix']; ?>"/>
          
          
          <input type="hidden" name="estado" value="Pendente">
          <input type="submit" value="SOLICITAR SAQUE" onclick="enviar()"/>
          <br>
          <br>
        <br>
        <h1>Pix cadastrado:</h1>
      
           <p style="color: green">
                 <?php echo $_SESSION['pix']; ?>
                 </p>
          </form>
        <br>
        1. Os pagamentos são em até 3 dias úteis.
        <br>
        <br>
        2. O mínimo para saque é R$ 15,00 reais.
        <br>
        <br>
        3. Caso tenha perfil desativado, recupere antes de pedir saque.
        <br>
        <br>
        <br>
    </div>
    <br>
    <div class="container_withdraw">
<h3>Lista de Saques Realizados!</h3>
<?php


$query = mysqli_query($conn, "SELECT * FROM saques WHERE id_saque ='". $_SESSION['id_user']."'") or die(mysqli_error());

while($fetch = mysqli_fetch_array($query)){

?>
<br>
<strong>Pagamento</strong>
<p>id: <?php echo $fetch['id']?></p>
<p>Data: <?php echo $fetch['data']?></p>
<p>Valor: <?php echo $fetch['valor']?></p>
<p>status: <?php echo $fetch['estado']?></p>
<br>
<hr>
<?php

}

?>

    </div>
</div>


</script>
<br>
<br>
<footer>
        <p>&copy;SigaMaisBrasil - Todos Os Direitos Reservados.</p>
    </footer>
</body>
</html>