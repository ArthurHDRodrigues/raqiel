<?php
function submitCht($cht){
  /*
  Recebe um objeto da classe cht e o insere no banco de dados informado no config.php
  */

  require "../connect.inc.php";

  $today = getdate();
  $date = $today["mday"]."/".$today["mon"]."/".$today["year"]."_".$today["hours"].":".$today["minutes"].":".$today["seconds"];

  $sql="INSERT INTO ". $db_cht ." VALUES (DEFAULT,'$cht->nome','$cht->email','$cht->ramal','$cht->sala','$cht->usrsetor','$cht->sol','$cht->tipo','$cht->status',STR_TO_DATE('$date','%d/%m/%Y_%H:%i:%s'),'$cht->patrimonio','$cht->atendimento_na_ausencia','$cht->horario_preferencial')";


  $str="INSERT INTO ". $db_cht ." VALUES (DEFAULT,?,?,?,?,?,?,?,?,STR_TO_DATE('$date','%d/%m/%Y_%H:%i:%s'),?,'$cht->atendimento_na_ausencia',?)";

  $stmt = mysqli_prepare($connection,$str);
  mysqli_stmt_bind_param($stmt,'ssssssssss', $nome, $email, $ramal, $sala, $usrsetor, $solicitacao, $tipo, $status, $patrimonio, $horario);
  $nome = $cht->nome;
  $email = $cht->email;
  $ramal = $cht->ramal;
  $sala = $cht->sala;
  $usrsetor = $cht->usrsetor;
  $solicitacao = $cht->sol;
  $tipo = $cht->tipo;
  $status = $cht->status;
  $patrimonioe = $cht->patrimonio;
  $horario = $cht->horario_preferencial;



  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);


 #mysqli_query($connection, $sql) or die ("Nao foi possivel enviar os dados");
}
