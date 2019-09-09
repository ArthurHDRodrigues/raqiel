<?php
function updateTipo($numCht,$tipo){
  require "../connect.inc.php";
  require "../../inc/config.php";
  $sql = "UPDATE ". $db_cht ." SET tipo = ". $tipo ." WHERE numero = ".$numCht;
  mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");

}
