<?php
include __DIR__."./../mysqlAPI/commentCommands/submitComment.php";
include __DIR__."/../../Classes/comment/commentModel.php";

$numCht = $_POST['numCht'];
$tecnico = $_POST['tecnico'];
$entrada = $_POST['entrada'];

$comment = new commentModel(['',$numCht,$tecnico,$entrada]);
submitComment($comment);


header('Location: ../../adm/index.php');
exit();
?>
