<?php
include "../inc/mysql_stuff.php";

$tec = $_POST['nome'];
$passwd = $_POST['senha'];
$allTec = getTec();

if(in_array($tec,$allTec)){
  echo "Deu ruim";
}
else{
  addTec($tec,$passwd);
  header('Location: ../adm/index.php');
  exit();
}
?>
