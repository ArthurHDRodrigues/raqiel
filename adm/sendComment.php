<?php
include "../inc/mysql_stuff.php";
include "../inc/classes.php";

$numCht = $_POST['numCht'];
$tecnico = $_POST['tecnico'];
$entrada = $_POST['entrada'];

$comment = new commentModel(['',$numCht,$tecnico,$entrada]);
submitComment($comment);


header('Location: index.php');
exit();
?>
