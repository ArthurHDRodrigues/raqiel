<?php
include "../mysqlAPI/tecnicoCommands/getTec.php";
include "../mysqlAPI/tecnicoCommands/insertTec.php";
$tec = $_POST['nome'];
$passwd = $_POST['senha'];
$allTec = getTec();

if(in_array($tec,$allTec)){
  echo "Deu ruim";
}
else{
  insertTec($tec,$passwd);
  header('Location: ../../adm/index.php');
  exit();
}
?>
