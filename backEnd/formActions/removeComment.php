<?php
include "../mysqlAPI/commentCommands/deleteComment.php";

$id = $_POST['id'];
deleteComment($id);


header('Location: ../../adm/index.php');
exit();
?>
