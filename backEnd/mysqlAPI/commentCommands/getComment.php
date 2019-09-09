<?php
function getComments($numCht){

  require __DIR__ . "/../../connect.inc.php";
  require __DIR__ . "/../../../inc/config.php";
  $query="SELECT * FROM ".$db_comment." WHERE numCht=".$numCht;
  $sql_result = mysqli_query($connection, $query) or die ("Nao foi possivel extrair os dados");

  $log = array();
  while($row = mysqli_fetch_row($sql_result)){
    $comment = new commentModel($row);
    array_push($log,$comment);
  }

  return $log;
}
