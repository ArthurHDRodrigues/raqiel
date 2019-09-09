<?php
function updateComment($id,$comment){
  /*
  Recebe um id de um comentario e uma entrada
  */

  require __DIR__."/../../connect.inc.php";
  require __DIR__."/../../../inc/config.php";

  $sql = "UPDATE ".$db_comment." SET comment= '".$comment."' WHERE id= '".$id."'";
  mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");
}
