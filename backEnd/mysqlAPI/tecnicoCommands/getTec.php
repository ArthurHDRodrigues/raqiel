<?php
function getTec(){
  require "../connect.inc.php";
  require "../../inc/config.php";
  $sql = "SELECT nome FROM ". $db_func;
  $sql_result = mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");
  
  $return = array();
  while($row = mysqli_fetch_row($sql_result)){
    $tec = $row[0];
    array_push($return,$tec);
  }

  return $return;
}
