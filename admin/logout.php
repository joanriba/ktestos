<?
// Cierra la sesión actual
session_start();
$_SESSION = array();

// Redirecciona a los encabezados de index
header("Location: ../index.php");
?>