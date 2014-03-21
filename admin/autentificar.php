<? session_start();?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Autentificar</title>
<link rel="stylesheet" href="style_login.css">
</head>
<body>





<?php
// Configura los datos de tu cuenta
$dbhost='localhost';
$dbusername='root';
$dbuserpass='root';
$dbname='kinobs';
// Conectar a la base de datos
mysql_connect ($dbhost, $dbusername, $dbuserpass);
mysql_select_db($dbname) or die('No se pudo seleccionar base de datos');

// Comprobació del nom d'usuari i contrasenya
if ($_POST['nick']) {
$nick=$_POST['nick'];
$password=$_POST['password'];
if ($password==NULL) {
echo "El password no fue enviado";
}else{
$query = mysql_query("SELECT nick,password FROM admins 
WHERE nick = '$nick'") or die(mysql_error());
$info = mysql_fetch_array($query);
if($info['password'] != $password) {
echo "Login incorrecto";
}else{
$query = mysql_query("SELECT nick,password FROM admins
WHERE nick = '$nick'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["s_nick"] = $row['nick'];
echo '<script>document.location = "index.php"</script>';
}
}
}
?>

</body>
</html>