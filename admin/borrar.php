<?php 
include('../bdcon.php');

//busquem la seguent id
$sql = mysql_query("SELECT * FROM subobres",$cxn);
while($row=mysql_fetch_array($sql)){$id=$row[id];}

echo 'ID:'.$id.'<br/>';
echo $id_nova.'<br/>';


?>