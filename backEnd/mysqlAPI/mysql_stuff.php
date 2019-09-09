<?php

/********************************************\
|API de mysql, usado em sendCht.php e adm.php|
\********************************************/

function submitCht($cht){
  /*
  Recebe um objeto da classe cht e o insere no banco de dados informado no config.php
  */

  $today = getdate();
  $date = $today["mday"]."/".$today["mon"]."/".$today["year"]."_".$today["hours"].":".$today["minutes"].":".$today["seconds"];

  require "./inc/connect.inc.php";
  $sql = "INSERT INTO ". $db_cht ." VALUES (DEFAULT,'$cht->nome','$cht->email','$cht->ramal','$cht->sala','$cht->usrsetor','$cht->sol','$cht->tipo','$cht->status',STR_TO_DATE('$date','%d/%m/%Y_%H:%i:%s'),'$cht->patrimonio','$cht->atendimento_na_ausencia','$cht->horario_preferencial')";

  mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");
}


function getCht($status = [], $tel = False, $note = False){
  /*
  Pega chamados do banco de dados filtrados de acordo com o $status.
  */

  require "../inc/connect.inc.php";
  require "../inc/config.php";

  if($status == []){
      $sql = "SELECT * FROM ". $db_cht." WHERE status != 2";
      if($tel AND $note){
        $sql = $sql." AND tipo = 3";
      }
      else{
        if($note) $sql = $sql." AND tipo = 1";
        if($tel) $sql = $sql." AND tipo = 2";
      }
    }
  else{
    $sql = "SELECT * FROM ".$db_cht." WHERE ( ";

    $n = sizeof($status);
    for($i = 0 ; $i < $n-1 ; $i++){
      $sql = $sql."status = ".$status[$i]." or ";
    }
    $sql = $sql."status = ".$status[$n-1]." )";

    if($tel AND $note){
      $sql = $sql." and tipo = 3";
    }
    else{
      if($note){
        $sql = $sql." and tipo = 1";
      }
      if($tel){
        $sql = $sql." and tipo = 2";
      }
    }
    }

    $sql_result = mysqli_query($connection, $sql) or die ("Nao foi possivel extrair os dados");

  $return = array();
  while($row = mysqli_fetch_row($sql_result)){
    $chamado = new chtModel($row);
    array_push($return,$chamado);
  }
  return $return;
}

function checkLogin($user,$passwd){
  /*
  devolve true caso haja o $user informado e se sua senha esta correta
  false, caso contrario
  */
  require "../inc/connect.inc.php";
  require "../inc/config.php";
  $query="SELECT nome FROM ".$db_func." WHERE nome='$user' and senha= '$passwd'";
  if(mysqli_num_rows(mysqli_query($connection, $query)) != 0){
     $return = True;
  }
  else{
    $return = False;
  }
  return $return;
}

function submitComment($comment){
  /*
  Recebe um objeto da comment e o insere no banco de dados informado no config.php
  */

  $today = getdate();
  $date = $today["mday"]."/".$today["mon"]."/".$today["year"]."_".$today["hours"].":".$today["minutes"].":".$today["seconds"];

  require "../inc/connect.inc.php";
  #STR_TO_DATE('$date','%d/%m/%Y_%H:%i:%s')
  $sql = "INSERT INTO ". $db_comment ." VALUES (DEFAULT,'$comment->numCht','$comment->tecnico','$comment->comment')";

  mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");
}

function getComments($numCht){

  require "../inc/connect.inc.php";
  require "../inc/config.php";
  $query="SELECT * FROM ".$db_comment." WHERE numCht=".$numCht;
  $sql_result = mysqli_query($connection, $query) or die ("Nao foi possivel extrair os dados");

  $log = array();
  while($row = mysqli_fetch_row($sql_result)){
    $comment = new commentModel($row);
    array_push($log,$comment);
  }

  return $log;
}

function changeStatus($numCht,$status){
  require "../inc/connect.inc.php";
  require "../inc/config.php";
  $sql = "UPDATE ". $db_cht ." SET status = ". $status ." WHERE numero = ".$numCht;
  mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");

}

function updatePasswd($nome, $newPasswd){
  require "../inc/connect.inc.php";
  require "../inc/config.php";
  $sql = "UPDATE ". $db_func ." SET senha = '". md5($newPasswd) ."' WHERE nome = '".$nome."'";
  echo $sql;
  mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");
}

function addTec($nome,$passwd){
  require "../inc/connect.inc.php";
  require "../inc/config.php";
  $sql = "INSERT INTO ". $db_func ." VALUES(DEFAULT,'".$nome."','". md5($passwd) ."')";
  mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");
}

function getTec(){
  require "../inc/connect.inc.php";
  require "../inc/config.php";
  $sql = "SELECT nome FROM ". $db_func;
  $sql_result = mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");
  return $sql_result;
}
?>
