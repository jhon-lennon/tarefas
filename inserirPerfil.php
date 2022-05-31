<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
    include('connection.php');
  //  include('protect.php');
    
?>
<!DOCTYPE html>
<html>
    <head>
        
    <title> Painel - Aprovar Perfis</title>
        
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  
        <style>
            body{

}
            header{
              width: 100%;
            }

form{
  padding:5px;
}
            </style>
    
    </head>
    <body>        
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Celke</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Produtos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
$perfil = $_POST['perfil'];
$nome = $_POST['nome'];
$genero = $_POST['genero'];

$query = "INSERT INTO tb_perfis (perfil,nome,genero) VALUES('".$perfil."', '".$nome."', '".$genero."')";
    mysqli_query($conn, $query);
    
    $rows = mysqli_affected_rows($conn);
    
    if($rows > 0){
   echo "Cadastrado com sucesso!";
//header("Location: Login.php");
}else{
echo("houve um erro!");
}
print_r($perfil, $nome);
?>


        <?php
            
             $query = "SELECT * FROM Perfis_pendente ORDER BY id ASC";
             $result = $conn->query($query);

          ?>
        
        <table class="table">
            
            <thead> <tr> 
                
                <th scope="col">id</th>
                
                <th scope="col">perfil</th> 
                
                <th scope="col">genero</th> 
                
                <th scope="col">Codigo do usuário</th>
                
                
            </thead> 
            
            <tbody> 
                <?php
                    while($user_data = mysqli_fetch_assoc($result)){
             echo "<tr>";
             echo "<td>".$user_data['id']."</td>";
             echo "<td>".$user_data['perfil']."</td>";
             echo "<td>".$user_data['genero']."</td>";
             echo "<td>".$user_data['codigo']."</td>";
             
             
}
                ?>
            </tbody>
       
            
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> 



    </body>
    </html>