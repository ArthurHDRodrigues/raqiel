<?php
function checkLogin($user,$passwd){
  /*
  devolve true caso haja o $user informado e se sua senha esta correta
  false, caso contrario
  */
  require "/var/www/html/ramiel/backEnd/connect.inc.php";
  require "/var/www/html/ramiel/inc/config.php";
  $str="SELECT nome FROM ".$db_func." WHERE nome=? and senha=?";
  
  $stmt = mysqli_prepare($connection,$str);
  mysqli_stmt_bind_param($stmt,'ss', $login,$senha);
  $login = $user;
  $senha = $passwd;
  mysqli_stmt_execute($stmt);

  mysqli_stmt_bind_result($stmt, $output);
  #mysqli_stmt_fetch($stmt);

  if(mysqli_stmt_fetch($stmt)){
     $return = True;
  }
  else{
    $return = False;
  }
  mysqli_stmt_close($stmt);
  return $return;
}
