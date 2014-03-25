<?php 
include('../bdcon.php');
include('security.php');

$idnen=$_GET['id'];
$status=$_GET['status'];
$idmodul=$_GET['idmodul'];


if($status=='preinscrit'){ $noustatus='inscrit';} else
if($status=='inscrit'){$noustatus='cancelat';} else
if($status=='cancelat'){$noustatus='fora';} else
if($status=='fora'){$noustatus='preinscrit';}

$result = mysql_query("update historial set status='$noustatus' where idnen='$idnen' and idmodul='$idmodul'", $cxn);

if(isset($_GET['nivell']) and $_GET['nivell']=='2'){

header("Location: historial.php?id=$idmodul");exit;

} else {
	
	header("Location: historial.php"); exit;
	
}

?>