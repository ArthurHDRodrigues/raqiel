<?php
include "../inc/mysql_stuff.php";

updatePasswd($_POST['nome'],$_POST['senha']);
header('Location: ../adm/index.php');
exit();
?>
