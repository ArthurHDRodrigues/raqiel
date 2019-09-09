<?php
include "../backEnd/mysqlAPI/tecnicoCommands/checkLogin.php";
include "../Classes/cht/chtController.php";
include "../backEnd/mysqlAPI/chtCommands/getCht.php";
include "../Classes/searchToken/searchTokenVisual.php";
include "../Classes/cht/chtVisual.php";
require "../backEnd/connect.inc.php";
require '../Classes/comment/commentVisual.php';
require "../backEnd/mysqlAPI/commentCommands/getComment.php";
include "../Classes/comment/commentModel.php";
require "../Classes/tecnico/tecnicoModel.php";
require "../Classes/tecnico/tecnicoVisual.php";

if(isset($_POST['user']) && isset($_POST['passwd'])){
  if(checkLogin($_POST['user'],md5($_POST['passwd']))){
    $tecnico = mysqli_real_escape_string($connection,$_POST['user']);
    $passwd = md5( mysqli_real_escape_string($connection,$_POST['passwd']));
    setcookie('user', $tecnico, time() + (86400 * 30), "/"); # 86400 = 1 dia
    setcookie('passwd', $passwd, time() + (86400 * 30), "/"); # 86400 = 1 dia
  }
  else{
    header('Location: login.php');
    exit();
  }
}
else{
  if(isset($_COOKIE['user']) && isset($_COOKIE['passwd'])) {
    if(checkLogin($_COOKIE['user'],$_COOKIE['passwd'])){
      $tecnico = $_COOKIE['user'];
      $passwd = $_COOKIE['passwd'];
    }
    else{
      header('Location: login.php');
      exit();
    }
  }
  else{
    header('Location: login.php');
    exit();
  }
}
      $_SESSION["user"] = $tecnico;
      $_SESSION["passwd"] = $passwd;

      $list = [];
      $tel = False;
      $note = False;
      if(isset($_POST['naoatendido'])){
        array_push($list,0);
      }
      if(isset($_POST['atendendo'])){
        array_push($list,1);
      }
      if(isset($_POST['suspenso'])){
        array_push($list,3);
      }
      if(isset($_POST['atendido'])){
        array_push($list,2);
      }

      if(isset($_POST['Telefonia'])){
        $tel = True;
      }
      if(isset($_POST['Notebook'])){
        $note = True;
      }


?>
<html>
<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <title>SI</title>

</head>
<body>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="cht-tab" data-toggle="tab" href="#cht" role="tab" aria-controls="cht" aria-selected="false">Chamados</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="todo-tab" data-toggle="tab" href="#todo" role="tab" aria-controls="todo" aria-selected="true">ToDo</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="senha-tab" data-toggle="tab" href="#senha" role="tab" aria-controls="senha" aria-selected="false">Perfil</a>
    </li>
  </ul>


  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade" id="todo" role="tabpanel" aria-labelledby="todo">
      <center><h2>Lista De Coisas a fazer</h2></center>
      <h3> Melhorias do Sistema de Chamado </h3>
      <ul>
	<li>Evitar injeção do lado do usuario</li>
        <li>Sistema de email</li>
        <li>sistema de filtro automatico</li>
        <li>sistema de tag</li>
          warsaw
      <li>sistema prioridade</li>
      <li>limpar código</li>
      <li>fazer caber mais cht em tela</li>
      <li>migrar p sistema de icones do bootstra(https://getbootstrap.com/docs/3.3/components/)</li>
      <li> melhor sistema de lista de coisas a fazer</li>

      </ul>

    </div>
    <div class="tab-pane fade show active" id="cht" role="tabpanel" aria-labelledby="cht">
      <center><h2>Lista de Chamados</h2></center>

      <?php
      #pega chamados
      $chtController = new chtController;
      $chamados = $chtController->carregarCht($list,$tel,$note);
      $chtVisual = new chtVisual;
      $searchBar = new searchTokenVisual;

      $searchBar->printSearchBar();

      $n = sizeof($chamados);
      for($i = 0 ; $i < $n ; $i++){
        $chtVisual->printCht($chamados[$i],$_SESSION["user"]);
      }?>
  </div>
  <div class="tab-pane fade" id="senha" role="tabpanel" aria-labelledby="senha">
    <?php
    $ModelTec = new tecnicoModel($_SESSION["user"],$passwd);
    $VisualTec = new tecnicoVisual();
    $VisualTec->printTecnicoSection($ModelTec);
    ?>
  </div>
</div>
</body>
</html>
