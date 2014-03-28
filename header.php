<? 
if(!isset($_GET['idioma'])){  
	
	if(isset($_POST['idioma'])){ $idioma=$_POST['idioma']; } else { $idioma='ca';} 
	
} else {$idioma=$_GET['idioma'];}



include('textos.php');?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ca"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?=$word['title'][$idioma]?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	
	<script src="js/parsley.js"></script>
	<? if($idioma=="ca") {?><script src="js/i18n/ca.js"></script><? } else if($idioma=="es"){?><script src="js/i18n/es.js"></script> <? }?>
	
	
	<link rel="stylesheet" href="js/parsley.css">
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
	
	

<script type="text/javascript" src="js/tipped.js"></script>
<script type="text/javascript" src="js/imagesloaded/imagesloaded.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/tipped.css"/>
		

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

<div class="bandkinobs">
	<a href="index.php?idioma=<?=$idioma?>"><img src="/img/logo-kinobs.png" alt="Logo kinobs"></a>
</div>

<div class="bandheader">
	<div class="container">
		<div class="sixteen columns">
		
			<?php if(isset($_SESSION['s_email'])) {?>
		
				<? if(isset($_GET[pass]) and $_GET[pass]=='yes'){?>
					
						<h1 class="remove-bottom" style="margin-top: 40px"><?=$word['changepassword'][$idioma]?></h1>
					
					<? } else { ?>
			<h1 class="remove-bottom" style="margin-top: 40px"><?=$word['panelldecontrol'][$idioma]?> <?=ucfirst($_SESSION['s_nom'])?> <?=ucfirst($_SESSION['s_cognoms'])?> </h1>
			<a href="/logout.php?idioma=<?=$idioma?>" class="button">Tancar sessió</a>
			
			<? } //end if?>
			<? } else {?>
			
			<h1 class="remove-bottom" style="margin-top: 40px"><?=$word['titolgeneral'][$idioma]?></h1>
			<h5><?=$word['summer2014'][$idioma]?></h5>
			
			
			<? } ?>
			
		</div>
	</div>
</div><!--end bandheader-->
