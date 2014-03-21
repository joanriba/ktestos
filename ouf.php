<?
session_start();
$idioma=$_GET[idioma];
$msg_cat="Email i contrasenya no coincideixen";
$msg_esp="Email y contraseña no coinciden";

if($idioma=="ca") {$msg=$msg_cat;} else {$msg=$msg_esp;}

include('bdcon.php');

$action=trim($HTTP_GET_VARS['action']);
switch($action):
	case 'login':
		
		$sub = trim($_POST['sub']);
		$email = trim($_POST['email']);
		//$password =trim($_POST['password']);
		$password = md5(trim($_POST['password']));	
		$query=mysql_query("select email1, password from pares where email1='$email'",$cxn);
		while($row=mysql_fetch_array($query)){$good_pass=$row['password']; $good_email=$row['email1'];}
		$sep=',';
		sleep(2); # simulating
		
		if ( $password == $good_pass ){
		   # REGISTER SESSION HERE
		   
		   $query = mysql_query("SELECT id,email1,password,nom,cognoms FROM pares WHERE email1= '$email'") or die(mysql_error());
			$row = mysql_fetch_array($query);
			$_SESSION["s_nom"] = $row['nom'];
			$_SESSION["s_email"] = $row['email1'];
			$_SESSION["s_cognoms"] = $row['cognoms'];
			$_SESSION["s_iduser"] = $row['id'];
			$id = $_SESSION["s_iduser"];  
		   print "success,/panell.php?idioma=$idioma&,Benvinguts";
		}
		else{
		   print 'error'.$sep.$msg;
		}
//		print 'success,index.php';
	break;
	default:
		print 'error,going somewhere ?';
endswitch;
#check if the mail is valid
function fun_isemail($strng){
 return preg_match('/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/i',$strng);
}
?>