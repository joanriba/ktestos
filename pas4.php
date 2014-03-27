<?php
include('bdcon.php');
//REBEM LES DADES ESTRUCTURALS
$idioma=$_POST[idioma];



//**************************************************
//Verifiquem que el correu no està en ús
//**************************************************
$query1=mysql_query("select email1 from pares",$cxn);
$sql=mysql_query("SELECT email1 FROM pares WHERE email1='$_POST[email1]'");
 if(mysql_num_rows($sql)>=1){ 
	 
	 include('textos.php');
 ?>

 	
 	<html lang="ca"><head>
	<meta charset="utf-8">
	<title><?=$word['titleemailused'][$idioma]?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/base.css"><link rel="stylesheet" href="css/skeleton.css"><link rel="stylesheet" href="css/layout.css"></head><body>
	<div class="bandkinobs"><img src="/img/logo-kinobs.png"></div>
	<div class="bandalert"><div class="container">
<div class="four columns"><img src="/img/emailalert.png"></div>
<div class="twelve columns">
    <?=$word['emailused'][$idioma];?><br><br>
    <a class="button" href="www.kinobs.com" onclick="window.history.go(-1); return false;"><?=$word['previous'][$idioma]?></a>
    <a class="button" href="index.php?idioma=<?=$idioma?>"><?=$word['loginpage'][$idioma]?></a>
	</div></div></div></body></html>
 	

<? } else {

include('header.php');
include('data-europeu.php');
$llista=$_POST[llista];
$numeronens=$_POST[numeronens];

?>
	<div class="bandresum">
	<div class="container">
		<div class="sixteen columns">
		
					
<? include('modul_resum.php');?>


	</div><!--end sixteen-->
	</div><!--end container-->
	</div><!--end bandresum-->

<? //FOR PER LOOPEJAR ELS NENS
for ($n=1; $n<=$numeronens; $n++){?>
	

<div class="bandformnen">
<div class="container">
<div class="sixteen columns">

<h1><?=ucfirst($_POST['nom'.$n])?></h1>

</div>


<form method="post" action="pas5.php" enctype="multipart/form-data">


<div class="five columns">
			<h3><?=$word['dadesgenerals'][$idioma]?></h3>
			
			<input type="hidden" name="idioma" value="<?=$idioma?>">
			<input type="hidden" name="numeronens" value="<?=$numeronens?>">
			
			<?=$_POST['nom'.$n]?> <?=$_POST['cognoms'.$n]?><br/>
			
			<input type="hidden" name="nom<?=$n?>" value="<?=$_POST['nom'.$n]?>">
			<input type="hidden" name="cognoms<?=$n?>" value="<?=$_POST['cognoms'.$n]?>">
			<input type="hidden" name="birthdate<?=$n?>" value="<?=$_POST['birthdate'.$n]?>">
			
			
			<?=$_POST['adreca'.$n]?><br>
			<input type="hidden" name="adreca<?=$n?>" value="<?=$_POST['adreca'.$n]?>">
			
			<?=$_POST['poblacio'.$n]?><br>
			<input type="hidden" name="poblacio<?=$n?>" value="<?=$_POST['poblacio'.$n]?>">
			
			<?=$_POST['cp'.$n]?><br>
			<input type="hidden" name="cp<?=$n?>" value="<?=$_POST['cp'.$n]?>">
			
			<?=$_POST['cursacabat'.$n]?><br>
			<input type="hidden" name="cursacabat<?=$n?>" value="<?=$_POST['cursacabat'.$n]?>">
			
			<?=$_POST['escolaultim'.$n]?><br>
			<input type="hidden" name="escolaultim<?=$n?>" value="<?=$_POST['escolaultim'.$n]?>">
</div>

<div class="ten columns">
			<h3><?=$word['fitxamedica'][$idioma]?></h3>
			<div class="four columns">
			
			<label for="fitxa"><?=$word['attachfile'][$idioma]?></label>
			<input type="file" name="fitxa<?=$n?>" id="fitxa<?=$n?>"><br><br>
						
			<strong><?=$word['fantitetanica'][$idioma]?>:</strong> <?=$_POST['antitetanica'.$n]?><br>
			<input type="hidden" name="antitetanica<?=$n?>" value="<?=$_POST['antitetanica'.$n]?>">
			<strong><?=$word['fnomantitetanica'][$idioma]?>:</strong> <?=$_POST['comentarisantitetanica'.$n]?><br>
			<input type="hidden" name="nomantitetanica<?=$n?>" value="<?=$_POST['nomantitetanica'.$n]?>">
			<strong><?=$word['falergia'][$idioma]?>:</strong> <?=$_POST['alergia'.$n]?><br>
			<input type="hidden" name="alergia<?=$n?>" value="<?=$_POST['alergia'.$n]?>">
			<strong><?=$word['fnomalergia'][$idioma]?>:</strong> <?=$_POST['nomalergia'.$n]?><br>
			<input type="hidden" name="nomalergia<?=$n?>" value="<?=$_POST['nomalergia'.$n]?>">
			<strong><?=$word['fcroniques'][$idioma]?>:</strong> <?=$_POST['croniques'.$n]?><br>
			<input type="hidden" name="croniques<?=$n?>" value="<?=$_POST['croniques'.$n]?>">		
			<strong><?=$word['fnomcroniques'][$idioma]?>:</strong> <?=$_POST['nomcroniques'.$n]?><br>
			<input type="hidden" name="nomcroniques<?=$n?>" value="<?=$_POST['nomcroniques'.$n]?>">		
			<strong><?=$word['fintervingut'][$idioma]?>:</strong> <?=$_POST['intervingut'.$n]?><br>
			<input type="hidden" name="intervingut<?=$n?>" value="<?=$_POST['intervingut'.$n]?>">
		</div><!--end four columns-->
		
		<div class="four columns">				
			<strong><?=$word['fnomintervingut'][$idioma]?>:</strong> <?=$_POST['nomintervingut'.$n]?><br>
			<input type="hidden" name="nomintervingut<?=$n?>" value="<?=$_POST['nomintervingut'.$n]?>">	
			<strong><?=$word['fdiscapacitat'][$idioma]?>:</strong> <?=$_POST['discapacitat'.$n]?><br>
			<input type="hidden" name="discapacitat<?=$n?>" value="<?=$_POST['nomdiscapacitat'.$n]?>">
			<strong><?=$word['fnomdiscapacitat'][$idioma]?>:</strong> <?=$_POST['nomdiscapacitat'.$n]?><br>
			<input type="hidden" name="nomdiscapacitat<?=$n?>" value="<?=$_POST['nomdiscapacitat'.$n]?>">	
			<strong><?=$word['fcaracter'][$idioma]?>:</strong> <?=$_POST['caracter'.$n]?><br>
			<input type="hidden" name="caracter<?=$n?>" value="<?=$_POST['caracter'.$n]?>">
			<strong><?=$word['fpatologies'][$idioma]?>:</strong> <?=$_POST['patologies'.$n]?><br>
			<input type="hidden" name="patologies<?=$n?>" value="<?=$_POST['patologies'.$n]?>">
			<strong><?=$word['fpatologies2'][$idioma]?>:</strong> <?=$_POST['patologies2'.$n]?><br>
			<input type="hidden" name="patologies2<?=$n?>" value="<?=$_POST['patologies2'.$n]?>">
			<strong><?=$word['fmedica'][$idioma]?>:</strong> <?=$_POST['autoritzaciomedica'.$n]?><br>
			<input type="hidden" name="autoritzaciomedica<?=$n?>" value="<?=$_POST['autoritzaciomedica'.$n]?>">
			
			<strong><?=$word['fmedica'][$idioma]?>:</strong> <?=$_POST['autoritzaciomedicab'.$n]?><br>
			<input type="hidden" name="autoritzaciomedicab<?=$n?>" value="<?=$_POST['autoritzaciomedicab'.$n]?>">
			
	
		</div><!--end four-->		
</div><!--end ten columns-->
</div><!--end container-->
</div><!-- end bandform-->

<? } //tanca FOR DE NANUS?>


<div class="bandformtutor">
	<div class="container">
	<div class="sixteen columns">
	
	<h2><?=$word['dadestutor'][$idioma]?></h2>
	
	</div><!--end sixteen-->
	
		<div class="one-third column">
	
	
			<?=$word['nomdeltutor'][$idioma]?>: <?=$_POST[nomtutor]?><br>
			<input type="hidden" name="nomtutor" value="<?=$_POST[nomtutor]?>">
			<?=$word['fcognoms'][$idioma]?>: <?=$_POST[cognomstutor]?><br>
			<input type="hidden" name="cognomstutor" value="<?=$_POST[cognomstutor]?>">
			<?=$word['tel1'][$idioma]?>: <?=$_POST[tel1]?><br>
			<input type="hidden" name="tel1" value="<?=$_POST[tel1]?>">
			<?=$word['tel2'][$idioma]?>:<?=$_POST[tel2]?><br>
			<input type="hidden" name="tel2" value="<?=$_POST[tel2]?>">
			<?=$word['tel3'][$idioma]?>:<?=$_POST[tel3]?><br>	
			<input type="hidden" name="tel3" value="<?=$_POST[tel3]?>">
		</div><!--tanca primer one-third-->
		
		<div class="one-third column">			
			<?=$word['email'][$idioma]?>: <?=$_POST[email1]?><br>
			<input type="hidden" name="email1" value="<?=$_POST[email1]?>">
			
			
			<?=$word['dni'][$idioma]?>: <?=$_POST[dni]?><br>
			<input type="hidden" name="dni" value="<?=$_POST[dni]?>">
			<?=$word['carnetmonoparental'][$idioma]?>: <?=$_POST[fammono]?><br>
			<input type="hidden" name="fammono" value="<?=$_POST[fammono]?>">			
			<?=$word['carnetnombrosa'][$idioma]?>: <?=$_POST[famnum]?><br>
			<input type="hidden" name="famnum" value="<?=$_POST[famnum]?>">
		</div><!--one-third-->
		
		<div class="one-third column">
			<!--aquí estaven les dades bancaries que hem decidit no posar-->    
		</div><!--one-third column-->
	</div><!--end container-->
</div><!--end bandform tutors-->


<div class="container">
<div class="sixteen columns">
	
	
	<!--ENVIEM LA LLISTA DE COMANDES-->
<!--****************************-->
<?
foreach ($llista as $value) { $coses=explode('/',$value); $nom=$coses[0]; $naixament=$coses[1]; $idmodul=$coses[2];?>
<input type="hidden" name="llista[]" value="<?=$nom?>/<?=$naixament?>/<?=$idmodul?>">

<? } ?>

<!-- END LLISTA DE COMANDES-->
<!-- **********************-->
	
	
	<a class="button" href="www.kinobs.com" onclick="window.history.go(-1); return false;"><?=$word['previous'][$idioma]?></a>
	<input type="submit" name="submit" value="<?=$word['finalitzar'][$idioma]?>"/>
	<p class="final"><span>*</span><?=$word['textpropera'][$idioma]?></p>
	</form>
</div>
</div><!--end container-->
<? } //end if email?>
