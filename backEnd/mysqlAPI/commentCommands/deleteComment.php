<?php
function deleteComment($id){
  /*
  Recebe um id de um comentario e uma entrada
  */

  require __DIR__."/../../connect.inc.php";
  require __DIR__."/../../../inc/config.php";

  $sql = "DELETE FROM ".$db_comment." WHERE id= '".$id."'";
  mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");
}
