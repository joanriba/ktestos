<?
// Cierra la sesi�n actual
session_start();
$_SESSION = array();

// Redirecciona a los encabezados de index
header("Location: ../index.php");
?>