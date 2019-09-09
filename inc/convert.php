<?php
include "../inc/mysql_stuff.php";
include "../inc/connect.inc.php";
include "../inc/classes.php";
/*
Converte o sistema velho para o novo, caso já tenha sido transferido, então pode deletar este arquivo
*/

$conn = new mysqli("sql.ime.usp.br", "si", "2@zu!7", "bd_si");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
  echo "Conexão ta top";
}
$sql = "DELETE FROM ".$db_cht;
$sql_result = mysqli_query($connection, $sql) or die ("Nao foi possivel extrair os dados");

$sql = "SELECT * FROM tbchamado WHERE status = '3'";
$sql_result = mysqli_query($conn, $sql) or die ("Nao foi possivel extrair os dados");

$chts = array();
while($row = mysqli_fetch_row($sql_result)){
  $id = $row[0];
  $nusp = $row[1]; #inutil
  $nome = $row[2];
  $email = $row[3];
  $ramal = $row[4];
  $sala = $row[5];
  $sol = $row[6];
  $note = $row[7];
  $tel = $row[8];
  $status = $row[9];
  $setor = $row[10];
  $patrimonio = $row[11];
  $data = $row[12];#inutil
  $hora = $row[13];
  $obs = $row[14]; #inutil
  $ausencia = $row[15];
  $hr_atendimento = $row[16];

  if($ausencia == "sim"){
    $ausencia = 1;
  }
  else{
    $ausencia = 0;
  }

  $tipo = 0;
  if ($note == 1){$tipo = 1;}
  if ($tel == 1){ $tipo = 2;}
  if ( $note AND $tel ){ $tipo = 3;}
  switch ($status) {
    case '0':
      $status = '2';
      break;

    case '1':
      $status = '0';
      break;

    case '2':
      $status = '0';
      break;
    case '3':
      $status = '1';
      break;
    case '4':
      $status = '2';
      break;
    case '5':
      $status = '3';
      break;


  }
  $forbitten = array("'","<",">");
  $patrimonio = str_replace($forbitten, '',$patrimonio);
  $nome = str_replace($forbitten, '',$nome);
  $sol = str_replace($forbitten, '',$sol);
  $hr_atendimento = str_replace($forbitten, '',$hr_atendimento);
  $sala = str_replace($forbitten, '',$sala);

  $chtVisual = new chtVisual;
  $cht = new chtModel(array($id,$nome,$email,$ramal,$sala,$setor,$sol,$tipo,$status,'data',$patrimonio,$ausencia,$hr_atendimento));
  $sql = "INSERT INTO ". $db_cht ." VALUES (DEFAULT,'$cht->nome','$cht->email','$cht->ramal','$cht->sala','$cht->usrsetor','$cht->sol','$cht->tipo','$cht->status',STR_TO_DATE('$hora','%Y-%m-%d %H:%i:%s'),'$cht->patrimonio','$cht->atendimento_na_ausencia','$cht->horario_preferencial')";
  mysqli_query($connection, $sql) or die ("$sql");
}
