<?php
include('bdcon.php');
include('data-europeu.php');
include('header.php');


//REBEM LES DADES ESTRUCTURALS
$idioma=$_POST[idioma];
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


<form method="post" action="pas5.php">


<div class="five columns">
			<h3>Dades generals</h3>
			
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
			<h3>Fitxa mèdica</h3>
			<div class="four columns">			
			<strong>Antitetànica:</strong> <?=$_POST['antitetanica'.$n]?><br>
			<input type="hidden" name="antitetanica<?=$n?>" value="<?=$_POST['antitetanica'.$n]?>">
			<strong>Comentaris antitetànica:</strong> <?=$_POST['comentarisantitetanica'.$n]?><br>
			<input type="hidden" name="nomantitetanica<?=$n?>" value="<?=$_POST['nomantitetanica'.$n]?>">
			<strong>Alèrgia:</strong> <?=$_POST['alergia'.$n]?><br>
			<input type="hidden" name="alergia<?=$n?>" value="<?=$_POST['alergia'.$n]?>">
			<strong>Nom de l'alèrgia:</strong> <?=$_POST['nomalergia'.$n]?><br>
			<input type="hidden" name="nomalergia<?=$n?>" value="<?=$_POST['nomalergia'.$n]?>">
			<strong>Enfermetats cròniques:</strong> <?=$_POST['croniques'.$n]?><br>
			<input type="hidden" name="croniques<?=$n?>" value="<?=$_POST['croniques'.$n]?>">		
			<strong>Nom de les enfermetats cròniques:</strong> <?=$_POST['nomcroniques'.$n]?><br>
			<input type="hidden" name="nomcroniques<?=$n?>" value="<?=$_POST['nomcroniques'.$n]?>">		
			<strong>Intervingut:</strong> <?=$_POST['intervingut'.$n]?><br>
			<input type="hidden" name="intervingut<?=$n?>" value="<?=$_POST['intervingut'.$n]?>">
		</div><!--end four columns-->
		
		<div class="four columns">				
			<strong>Intervencions que ha rebut:</strong> <?=$_POST['nomintervingut'.$n]?><br>
			<input type="hidden" name="nomintervingut<?=$n?>" value="<?=$_POST['nomintervingut'.$n]?>">	
			<strong>Discapacitat:</strong> <?=$_POST['discapacitat'.$n]?><br>
			<input type="hidden" name="discapacitat<?=$n?>" value="<?=$_POST['nomdiscapacitat'.$n]?>">
			<strong>Nom de la discapacitat:</strong> <?=$_POST['nomdiscapacitat'.$n]?><br>
			<input type="hidden" name="nomdiscapacitat<?=$n?>" value="<?=$_POST['nomdiscapacitat'.$n]?>">	
			<strong>Descripció del caràcter:</strong> <?=$_POST['caracter'.$n]?><br>
			<input type="hidden" name="caracter<?=$n?>" value="<?=$_POST['caracter'.$n]?>">
			<strong>Patologies de la llista:</strong> <?=$_POST['patologies'.$n]?><br>
			<input type="hidden" name="patologies<?=$n?>" value="<?=$_POST['patologies'.$n]?>">
			<strong>Altres patologies que tingui:</strong> <?=$_POST['patologies2'.$n]?><br>
			<input type="hidden" name="patologies2<?=$n?>" value="<?=$_POST['patologies2'.$n]?>">
			<strong>Autorització mèdica:</strong> <?=$_POST['autoritzaciomedica'.$n]?><br>
			<input type="hidden" name="autoritzaciomedica<?=$n?>" value="<?=$_POST['autoritzaciomedica'.$n]?>">
	
		</div><!--end four-->		
</div><!--end ten columns-->
</div><!--end container-->
</div><!-- end bandform-->

<? } //tanca FOR DE NANUS?>


<div class="bandformtutor">
	<div class="container">
	<div class="sixteen columns">
	
	<h2>Dades del tutor legal</h2>
	
	</div><!--end sixteen-->
	
		<div class="one-third column">
	
	
			Nom del pare/mare/tutor legal: <?=$_POST[nomtutor]?><br>
			<input type="hidden" name="nomtutor" value="<?=$_POST[nomtutor]?>">
			Cognoms: <?=$_POST[cognomstutor]?><br>
			<input type="hidden" name="cognomstutor" value="<?=$_POST[cognomstutor]?>">
			Telèfon 1: <?=$_POST[tel1]?><br>
			<input type="hidden" name="tel1" value="<?=$_POST[tel1]?>">
			Telèfon 2:<?=$_POST[tel2]?><br>
			<input type="hidden" name="tel2" value="<?=$_POST[tel2]?>">
			Telèfon 3:<?=$_POST[tel3]?><br>	
			<input type="hidden" name="tel3" value="<?=$_POST[tel3]?>">
		</div><!--tanca primer one-third-->
		
		<div class="one-third column">			
			Email 1: <?=$_POST[email1]?><br>
			<input type="hidden" name="email1" value="<?=$_POST[email1]?>">
			
			
			DNI: <?=$_POST[dni]?><br>
			<input type="hidden" name="dni" value="<?=$_POST[dni]?>">
			Numero carnet família monoparental: <?=$_POST[fammono]?><br>
			<input type="hidden" name="fammono" value="<?=$_POST[fammono]?>">			
			Numero carnet família nombrosa: <?=$_POST[famnum]?><br>
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
	
	
	<a class="button" href="www.kinobs.com" onclick="window.history.go(-1); return false;">Anterior</a>
	<input type="submit" name="submit" value="Finalitzar"/>
	</form>
</div>
</div><!--end container-->

