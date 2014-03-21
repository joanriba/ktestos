<?
// Cierra la sesión actual
session_start();
$_SESSION = array();

$idioma=$_GET[idioma];
// Redirecciona a los encabezados de index
header("Location: index.php?idioma=$idioma");
?>