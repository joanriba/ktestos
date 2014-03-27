<?php

// Database Connection
include('../bdcon.php');


$numero=$_POST[numero];
$idmodul=1;

// Fetch Record from Database
$output			= "";
//$table 			= "moduls"; // Enter Your Table Name
//$sql 			= mysql_query("select * from $table");


$sql=mysql_query("select nens.nom as nomnen, nens.cognoms as cognomsnen,nens.birthdate, pares.id as idpare, pares.nom as nompare, pares.cognoms as cognomspare,pares.tel1,pares.tel2, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,moduls.preu,moduls.maximnens,historial.status,categories.nomca as categoria,historial.idcomanda,historial.idmodul, nens.id as idnen from historial inner join nens on historial.idnen=nens.id inner join pares on nens.idpare=pares.id inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat inner join categories on categories.id=activitats.categoria where historial.idmodul='$idmodul'",$cxn);


$columns_total 	= mysql_num_fields($sql);

// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
	$heading	=	mysql_field_name($sql, $i);
	$output		.= '"'.$heading.'",';
}
$output .="\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .='"'.$row["$i"].'",';
}
$output .="\n";
}

// Download the file

$filename =  "Nens-del-modul-$idmodul.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;
	
?>
