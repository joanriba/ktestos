<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ca"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Kinobs Sistema de Gestió d'Inscripcions</title>
	<meta name="description" content="Kinobs backend">
	<meta name="author" content="uebs.cat Disseny i desenvolupament web">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="/css/base.css">
	<link rel="stylesheet" href="/css/skeleton.css">
	<link rel="stylesheet" href="/css/layout.css">
	<link rel="stylesheet" type="text/css" href="/stylesheets/MyFontsWebfontsKit.css">
	
	<link rel="stylesheet" media="only screen and (-webkit-min-device-pixel-ratio: 2)"
	type="text/css" href="/css/highdpi.css" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script type="text/javascript" src="/js/jquery-latest.js"></script> 
	<script type="text/javascript" src="/js/jquery.tablesorter.js"></script> 
	
	

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="/img/favicon.ico">
	<link rel="apple-touch-icon" href="/img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/img/apple-touch-icon-114x114.png">
	<script src="/js/highdpi.js"></script>	
	<script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script>


	
</head>
<body class="admin">

<?php
include('../data-europeu.php');
$nick= $_SESSION['s_nick'];

$query = mysql_query("SELECT nick,clip,id_admin FROM admins
WHERE nick = '$nick'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["s_nick"] = $row['nick'];
$_SESSION["s_clip"]= $row['clip'];
$_SESSION["s_id_admin"]= $row['id_admin'];
$clip= $_SESSION['s_clip'];
$id_admin= $_SESSION['s_id_admin'];
?>


<div class="bandheader-admin">
	<div class="container">
		<div class="five columns">
			<img src="../img/logo-kinobs.png" width="240" title="Pàgina principal" alt="Pàgina principal">
			<!--<img src="../<?=$clip?>" width="75" height="75" alt="avatar"/>-->
		</div>
		
		<div class="five columns">
			
		</div>
		
		<div class="five columns">
			Has accessat com a: <strong><?=$nick?></strong><br/>
			<a href="logout.php">Log Out (Tancar la Sessió)</a><br /><a href="/">Tornar a la web</a>
		</div>
		
		<div class="sixteen columns">
			<ul class="navadmin">		
				<li><a href="activitats.php">Activitats, mòduls i categories</a></li>
				<li><a href="pares.php">Pares</a></li>
				<li><a href="nens.php">Nens</a></li>
			</ul>
		</div>
		
	</div>
</div><!--tanca bandheader-admin-->


