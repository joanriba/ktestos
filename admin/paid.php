<?php 
include('../bdcon.php');
include('security.php');

$id=$_GET['id'];
$paid=$_GET['paid'];


if($paid=='si'){ $noustatus='no';} else if($paid=='no'){$noustatus='si';}

$result = mysql_query("update comandes set paid='$noustatus' where id='$id'", $cxn);

header("Location: comandes.php"); exit;
?>