<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ca"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Kinobs · Inscripcions</title>
	<meta name="description" content="Panell de Gestió d'inscripcions de Kinobs">
	<meta name="author" content="Nautilus.cat">

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
		
	<!-- jQuery library (served from Google) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<!-- bxSlider Javascript file -->


	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="/img/favicon.ico">
	<link rel="apple-touch-icon" href="/img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/img/apple-touch-icon-114x114.png">
	<!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
	<script src="/js/highdpi.js"></script>

	
</head>


<body class="login">

<div class="container">

<img src="../img/logo-kinobs.png" />
<form action="autentificar.php" method="post" id="login">
	
	<fieldset>
		<label for="nick"></label>
		<input type="text" placeholder="Nickname" name="nick"/>
	</fieldset>
	
	<fieldset>
		<label for="password"></label>
		<input type="password" placeholder="password" name="password"/>
	</fieldset>
		
	<fieldset>
		<input type="submit" name="enviar" value="Login" />
	</fieldset>
</form>
<div class="footer">
<img src="../img/admin/Nautilus-Comunicacio-Logo.png"><br>
Panell de control d'inscripcions Kinobs<br/>© Nautilus 2014 · nautilus.cat · info@nautilus.cat · (+34) 972 183 352</div>

</div>

</body>
</html>


