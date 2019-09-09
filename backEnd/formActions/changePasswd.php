<?php
include "../mysqlAPI/tecnicoCommands/updatePasswd.php";
updatePasswd($_POST['nome'],$_POST['senha']);
header('Location: ../../adm/index.php');
exit();
?>
