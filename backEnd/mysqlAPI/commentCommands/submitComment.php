<?php
function submitComment($comment){
  /*
  Recebe um objeto da comment e o insere no banco de dados informado no config.php
  */

  $today = getdate();
  $date = $today["mday"]."/".$today["mon"]."/".$today["year"]."_".$today["hours"].":".$today["minutes"].":".$today["seconds"];

  require __DIR__."/../../connect.inc.php";
  #STR_TO_DATE('$date','%d/%m/%Y_%H:%i:%s')
  $sql = "INSERT INTO ". $db_comment ." VALUES (DEFAULT,'$comment->numCht','$comment->tecnico','$comment->comment')";

  mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");
}
