<?php
require_once('connection.php');
if(!isset($_SESSION)){
 session_start();
 $_SESSION['id_user'];

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectar Contas</title>
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
    <br>
    <h1 class="accounts">Cadastre suas contas!</h1>
    <div class="container_profile">
     <h2>Regras para serem aceitos:</h2>
     <br>
     <ul>
         <li>1 - foto no perfil.</li>
         <li>2 - nome brasileiro.</li>
         <li>3 - 5 fotos.</li>
         <li>4 - não ter fotos aleatório.</li>
         <li>5 - não pode ter perfil (privado).</li>
         <li>6 - 10 seguidores.</li>
         <li>7 - Após fazer seu cadastro de conta<br>copie e cole na sua bio o seu user:</li>

     </ul>
     <br>
     <form action="Processa_perfil.php" method="POST">
         
        <label>Nome do seu Perfil</label>
        <br>
        <input type="text" name="perfil" placeholder="@perfil" required/>
        <br>
         <label>Gênero</label>
         <br>
        <select name="genero">
          <option></option>
          <option value="masculino">Masculino</option>
          <option value="feminino">Feminino</option>
        </select>
        <br>
        <br>
        <label>Copie o código  e cole na<br> biografia da sua conta.</label>
        <input type="text" name="codigo" value="<?php echo "user:".$_SESSION['usuario'];?>">
        <br>
        <br>
        <input type="submit" value="Conectar Perfil"/>
     </form>
     <p>Obs: Não tire o código do seu perfil até que ele seja aprovado!</p>
    </div>
    <br>
    <div class="profiles">
     
        <h3>Seus Perfis!</h3>
        <?php


//$query = mysqli_query($conn, "SELECT * FROM tb_perfis WHERE id_user ='". $_SESSION['id_user']."'") or die(mysqli_error());
$query = mysqli_query($conn, "SELECT perfil,genero,status FROM Perfis_pendente WHERE codigo = 'user:".$_SESSION['usuario']."'") or die(mysqli_error());

while($fetch = mysqli_fetch_array($query)){

?>
        <p>id: <?php echo $fetch['id']?></p>
        <p>Perfil: <?php echo $fetch['perfil']?>.<a href="https://www.instagram.com/<?php echo $fetch['perfil']?>">Ver perfil</a></p>
        <p>Genero: <?php echo $fetch['genero']?></p>
        <p>Status: <?php echo $fetch['status']?></p>
        <hr>
        <?php
}
?>
    </div>
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
<br>
<br>
<br>
    <footer>
        <p>&copy;SigaMaisBrasil - Todos Os Direitos Reservados.</p>
    </footer>
</body>
</html>