<?php
include('connection.php');
session_start();
if (!isset($_SESSION['usuario'])){

    header("Location: /");
}


//function insert($gerar_id){
 // rand(1,20);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGA MAIS BRASIL- Realizar tarefas</title>
    
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--fonte google-->
  	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
<!-- biblioteca aos-->
 <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
 <!--Bootstrap-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.css" integrity="sha512-Ty5JVU2Gi9x9IdqyHN0ykhPakXQuXgGY5ZzmhgZJapf3CpmQgbuhGxmI4tsc8YaXM+kibfrZ+CNX4fur14XNRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
            <!-- <script src="jquery.2.1.3.min.js"></script>-->

        <script>

          function postDados(){
            
            var perfil = document.getElementById('perfil').value;
            var usuario = document.getElementById('usuario').value;
            //var nome = document.getElementById('nome').value;
            var nome = document.getElementById('perfil_query').innerText
            var link = document.getElementById('link').value;
            var id_usuario = document.getElementById('id_user').value;
         
            var status = document.getElementById('status').value;

       $.ajax
      ({
        //Configurações 
        type: 'POST',//methodo utilizado
        dataType: 'json',
        url: 'postdados.php',
        beforeSend: function enviar(){
          $("#resposta").html("<img src='load.gif' id='load'>");
        },
        data: {perfil: perfil, usuario: usuario, nome: nome, link: link, status: status, id_user: id_usuario},
        success: function retornar(retorno) {
        console.log('Retorno de lista perfil:');
        
        $('#resposta').text(retorno.msg);    
        if(typeof retorno.perfil != 'undefined'){
          $('#perfil_query').text(retorno.perfil.nome);
        }else{
          alert("Todas as tarefas foram realizadas ;)")
          window.location.href = "https://sigamaisbrasil.online/Tarefas.php";

        }
        
        //$("#resposta").html(retorno.perfil);
        }
      })
    
      }
          
        </script>
   <style>
   body{
     background-color:#ccd6e1;
   }
.performs{
  width: 400px;
  height: 400px;
  background-color: white;
}
.container-tasks{
  background-color: #fbfffb;
  width: 80%;
  height: 350px;
  margin-left:-100px;
  padding:10px;*/
  
  display: flex;
  flex-direction:column;
  align-items: center;
  margin-left: 1px;
  width: 100%;
  height: 300px;
  /*padding: 10px;
  margin:10px;*/
}
.tasks-line{
  align-items: center;
  /*display:none;*/
}
.btn-cancel{
color: #FFFFFF;
white;
background-color:#FF0000;
padding:12px;
}
.btn-task{
color:white;
      background-image: linear-gradient(to right, #4169E1, #4169E1, #4169E1);
      padding: 12px;
}
.btn-confirm{
  color:white;
      background-image: linear-gradient(to right, #41D47A, #22CE9A, #22CEB9);
      padding: 12px;
}
img{
  width: 130px;
       height: 60px;
       position: absolute;
       bottom:-40px;
       left: 50px;
}
#back{
 /* display: none;*/
}
#form{
 /* display: none;*/
}
@media (max-width: 600px){
    
  .card-task{
      height:500px;
  }
}
}
   </style>

</head>

<body>
  <header>
      <nav id="main-navbar" class="navbar navbar-expand-lg">
        <a href="painel.php" class="navbar-brand">
          
          <span id="moviestar-title">SIGA MAIS BRASIL</span>
        </a>
        <button style="background-color:white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        
 <div class="collapse navbar-collapse" id="navbar">
   
          <ul class="navbar-nav">
            <li class="nav-item">
              
              <a href="painel.php" class="nav-link">Painel</a>
            </li>
                        <li class="nav-item">
              <a href="trocar_saldo.php?id=" class="nav-link"></a>
              </li>
            <li class="nav-item">
              <a href="Saque.php" class="nav-link">Sacar no Pix</a>
              </li>
                          <li class="nav-item">
              <a href="logout.php" class="nav-link">Sair</a>
              </li>
          </ul>
        </div>
      </nav>
    </header>

  <br>
  <div class="tasks text-center">
    <h2 style="color:#FF00FF;"></h2>
    <div class="card-task">
      <br>
 <i class="fab fa-instagram" style="font-size:80px;"></i>
      <br>
      
      <?php
      
$query  = mysqli_query($conn, "
SELECT * FROM tb_perfis WHERE id_user ='". $_SESSION['id_user']."'");
?>
  <form>
            <select id="perfil" name="perfil">
            <option> <?php echo "--Seleciona o perfil-" ?></option>
            <?php
                
                $u      = $_SESSION['usuario'];
               
                $stmt    = "SELECT * FROM Perfis_pendente WHERE codigo = 'user:{$u}' AND status = 'Aprovado' ";
                $result  = mysqli_query($conn, $stmt);
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option> {$row['perfil']} </option>";
                }
            ?>
            <?php
              while($array= mysqli_fetch_array($query)){ ?>
              <?php if($array < 1){
                
              ?>

<?php } ?>
<option value="<?= $array['perfil'];?>">
<?php echo $array['perfil'];?>
      </option>
                  <?php } ?>
            </select>
      <p>POR FAVOR ESCOLHA O PERFIL PARA GANHAR DINHEIRO FAÇA LOGIN NO SEU APP OU NAVEGADOR CASO NÃO ESTEJA LOGADO COM Ó PERFIL NÃO SERÁ CONTABILIZADO O SEUS GANHOS.</p>
      <button type="button" id="go__tasks">GANHE AGORA</button>
      <br>
      <br>
      <br>
      <p style="color:#0064c9">ATENÇÃO: É PROIBIDO DEIXAR DE SEGUIR, CASO ISSO OCORRA, VOCÊ PERDERÁ SALDO!</p>
    </div>
  </div>
  
<br>
<div id="__tasks" style="display: none;">              <?php 
               include_once 'connection.php';
               
   $query = "SELECT nome, link FROM tb_tarefas ORDER BY RAND() LIMIT 1";
   $result = mysqli_query($conn, $query);
        
        while($array = mysqli_fetch_assoc($result)){
          
           
            ?>
            <div class="text-center" style="padding:5px;">
            <div class="alert alert-primary" role="alert">
            As tarefas realizadas serão  validadas em até  24 horas por favor aguarde.
            </div>
            <span >
              <strong id="resposta" style="color:green">
              </strong>
            </span>
            </div>
            <div id="back" class="tasks-line text-center">
             
            <div id="container-tasks" class="container-tasks">
                
 <i class="fab fa-instagram" style="font-size:60px;"></i>
                 <br>
                    <p id='perfil_query'></p>
                    <p style="display: none" id='perfil_link'></p>
                 <br>

                <a onclick="window.open(document.getElementById('perfil_link').innerText)" target="_blank" class="btn-task">REALIZAR TAREFAS</a>
                <br>
                <br>
                

<input type="hidden" id="usuario" name="usuario" value="<?= $_SESSION['usuario']?>">
<input type="hidden" id="id_user" name="id_usuario" value="<?= $_SESSION['id_user']?>">

<input id="nome" type="hidden" name="nome"
value="<?= $array['nome']?>">
<input id="link" type="hidden" name="link" value="<?=$array['link']?>">
<input id="status" type="hidden" name="status" value="Pendente">
          
            <input class="btn btn-success"  type="button" value="Confirmar" onclick="postDados();"/>
            
          </form>
            </div>
            </div>
 
            <?php }
            ?>
        </div>
  
  
  </div>

  <script>

    $('#perfil_query')

   document.querySelector("#go__tasks").addEventListener('click', function() {
     
    var perfil = document.getElementById('perfil').value;
 
                if(perfil != '--Seleciona o perfil-'){
                  document.querySelector("#__tasks").style = "display: block";
                }else{
                  alert('Não existe perfil selecionado ou tarefas')
                }
    });
   
    $('#perfil').change(function(event){
    let perfil = event.currentTarget.value;
    //alert(perfil);
    call_perfil(perfil);
 });
 
 function call_perfil(perfil){
    
      $.ajax({
	    type: 'POST', dataType: "json", cache: false,
      url: 'execut_query.php',
      data: {perfil: perfil},
      success: function retornar(retorno) {
        console.log('Retorno de lista perfil:');
        console.log(retorno);

        if(retorno.nome == "null"){
          alert('Não existe tarefas para '+ perfil+"!")
          //window.location.href = "https://sigamaisbrasil.online/Tarefas.php";
        }
        
        $('#perfil_query').text(retorno.nome);
        $('#perfil_link').text(retorno.link);
        },
        error: function (erro) {
            console.log('Error:',erro);
	          //trtar erro aqui
        }
    });
 }

  </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.js" integrity="sha512-0agUJrbt+sO/RcBuV4fyg3MGYU4ajwq2UJNEx6bX8LJW6/keJfuX+LVarFKfWSMx0m77ZyA0NtDAkHfFMcnPpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
