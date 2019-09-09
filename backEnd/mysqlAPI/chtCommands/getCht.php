<?php
function getCht($status = [], $tel = False, $note = False){
  /*
  Pega chamados do banco de dados filtrados de acordo com o $status.
  */

  require "/var/www/html/ramiel/backEnd/connect.inc.php";
  require "/var/www/html/ramiel/inc/config.php";
  require "/var/www/html/ramiel/Classes/cht/chtModel.php";
 #require "/var/www/html/ramiel/Classes/cht/chtVisual.php";
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
