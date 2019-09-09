<?php
function changeStatus($numCht,$status){
  require "../connect.inc.php";
  require "../../inc/config.php";
  $sql = "UPDATE ". $db_cht ." SET status = ". $status ." WHERE numero = ".$numCht;
  mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");

}
