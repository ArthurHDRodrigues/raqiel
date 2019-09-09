<?php
require __DIR__."/../inc/config.php";

$connection = mysqli_connect($servername,$adm_user,$adm_passwd,$db) or die("deu ruim");
if(!$connection){
  die("Connection failed".mysqli_connect_error()); #mata a conexão e da msg de erro
}
?>
