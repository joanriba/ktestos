<?php
//Inicio la sesión
session_start();

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if(!isset($_SESSION['s_nick'])){
header("Location: login.php");
}else{}
?>