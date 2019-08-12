<?php

require "../inc/mysql_stuff.php";

$input = $_POST['status'];
$numCht = $_POST['numCht'];

switch($input){
  case "Não atendido":
    $status = "0";
    break;
  case "Iniciar Atendimento":
    $status = "1";
    break;
  case "Encerrar Atendimento":
    $status = "2";
    break;
  case "Suspender Chamado":
    $status = "3";
    break;
}


changeStatus($numCht,$status);
header('Location: index.php');

 ?>
