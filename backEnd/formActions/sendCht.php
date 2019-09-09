<?php

/*
Pagina responsavel por receber o questionario do index.php e em seguida construir o chamado. Caso tudo esteja OK o submete.
*/
require "../mysqlAPI/chtCommands/submitCht.php";

include "../../Classes/cht/chtModel.php"; //para new cht

$nome = $_POST['nome'];
$email = $_POST['email'];
$ramal = $_POST['ramal'];
$usrsetor = $_POST['usrsetor'];
$bloco = $_POST['bloco'];
$sala = $_POST['sala'];
$patrimonio = $_POST['patrimonio'];
$sol = $_POST['sol'];

$tipo = 0;
if (isset($_POST['notebook'])){$tipo = 1;}
if (isset($_POST['telefonia'])){ $tipo = 2;}
if ( isset($_POST['telefonia']) AND isset($_POST['notebook']) ){ $tipo = 3;}

$atendimento_na_ausencia = $_POST['atendimento_na_ausencia'];
$horario_preferencial = $_POST['horario_preferencial'];
$sala = $bloco . '-' . $sala;

# INICIO verifica erros nos dados
$msgerro = "Erro! Verifique os dados digitados.";
if(!preg_match('(@ime.usp.br)', $email) ){
  $msgerro= $msgerro ."<br>Utilize seu email do IME".$email;
  mensagemerro($msgerro);
}
if (strlen($nome)<2){
  $msgerro= $msgerro ."<br>Nome não foi informado.";
  mensagemerro($msgerro);
}
if (strlen($sala)<2){
  $msgerro= $msgerro ."<br>Número da sala não foi informado.";
  mensagemerro($msgerro);
}
if (strlen($email)<2){
  $msgerro= $msgerro ."<br>E-mail não foi informado.";
  mensagemerro($msgerro);
}
# FIM verifica erros nos dados

#INICIO envia chamado
$cht = new chtModel(['DEFAULT',$nome,$email,$ramal,$sala,$usrsetor,$sol,$tipo,0,'data_e_hora',$patrimonio,$atendimento_na_ausencia,$horario_preferencial]);
  //'id', 'data' e 'hora' são configurados automaticamente no mysql_stuff
submitCht($cht);
#FIM envia chamado

function mensagemerro($msgerro){
    echo "<font color = 'red' face= 'verdana' size='4'>".$msgerro."</font>";
    exit;
}
?>
<html>
<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<title>SI</title></head>
<body>
  <div class="container">
  <center><h2>IME/USP<br>SI - Chamado Técnico</h2><hr>

    <h3>Parabéns! Seu pedido de chamado técnico foi enviado!</h3></center>
  <div class="container">

      <div class = "row">
        <div class="col-sm">
          Nome:
        </div>
        <div class="col-sm">
          <?php echo $nome?>
        </div>

        <div class="col-sm">
          E-mail:
        </div>
        <div class="col-sm">
          <?php echo $email?>
        </div>
      </div>

      <div class = "row">
        <div class="col-sm">
          Ramal:
        </div>
        <div class="col-sm">
          <?php echo $ramal?>
        </div>

        <div class="col-sm">
          Setor:
        </div>
        <div class="col-sm">
          <?php echo $usrsetor?>
        </div>
      </div>

      <div class = "row">
        <div class="col-sm">
          Sala e Bloco:
        </div>
        <div class="col-sm">
          <?php echo $sala?></div>
        <div class="col-sm">
          Nº de patrimônio:
        </div>
        <div class="col-sm">
          <?php echo $patrimonio?></div>
      </div>

      <div class = "row">
        <div class="col-sm">Solicitação:<?php echo $sol?></div>
      </div>
  </div>
</div>
</body>
</html>
