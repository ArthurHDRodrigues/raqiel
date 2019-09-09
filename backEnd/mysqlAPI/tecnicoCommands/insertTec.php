<?php
function insertTec($nome,$passwd){
  require "../connect.inc.php";
  require "../../inc/config.php";

  $str = "INSERT INTO ". $db_func ." VALUES(DEFAULT,?,'". md5($passwd) ."')";

  $stmt = mysqli_prepare($connection,$str);
  mysqli_stmt_bind_param($stmt,'s', $input);
  $input = $nome;
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
