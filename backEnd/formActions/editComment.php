<?php
include "../mysqlAPI/commentCommands/updateComment.php";

$id = $_POST['id'];
$entrada = $_POST['entrada'];

updateComment($id,$entrada);

header('Location: ../../adm/index.php');
exit();
?>
