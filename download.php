<?php

$idioma=$_GET['idioma'];
$idcomanda=$_GET['idcomanda'];

// We'll be outputting a PDF
//header('Content-type: application/pdf');


$filename= 'kinobs-comanda-'.$idcomanda.'.pdf';
header('Content-Disposition: attachment; filename='.$filename);
readfile("pdf/$idcomanda.pdf");

