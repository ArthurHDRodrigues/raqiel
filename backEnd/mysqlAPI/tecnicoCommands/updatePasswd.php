<?php
function updatePasswd($nome, $newPasswd){
  require "../connect.inc.php";

  $str = "UPDATE ". $db_func ." SET senha = '". md5($newPasswd) ."' WHERE nome = ?";
  
  $stmt = mysqli_prepare($connection,$str);
  mysqli_stmt_bind_param($stmt,'s', $input);
  $input = $nome;
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
