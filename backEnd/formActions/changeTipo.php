<?php

require "../mysqlAPI/chtCommands/updateTipo.php";

$tipo = $_POST['tipo'];
$numCht = $_POST['numCht'];

switch($tipo){
  case "Comum":
    $status = "0";
    break;
  case "Telefonia":
    $status = "2";
    break;
  case "Notebook":
    $status = "1";
    break;
}


updateTipo($numCht,$status);
header('Location: ../../adm/index.php');

 ?>
