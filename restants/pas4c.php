<?php
include('bdcon.php');
include('data-europeu.php');
include('header.php');


//REBEM LES DADES ESTRUCTURALS
$idioma=$_POST[idioma];
$llista=$_POST[llista];
$numeronens=$_POST[numeronens];
?>

<?
if($_GET[submit]=="yes"){
	
	echo 'idioma:'.$_POST[idioma];
	
} else {

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




<div class="five columns">
			<h3>Dades generals</h3>
			
			<input type="hidden" name="idioma" value="<?=$idioma?>">
			
			<?=$_POST['nom'.$n]?> <?=$_POST['cognoms'.$n]?><br/>
			<?=$_POST['adreca'.$n]?><br>
			<?=$_POST['poblacio'.$n]?><br>
			<?=$_POST['cp'.$n]?><br>
			<?=$_POST['cursacabat'.$n]?><br>
			<?=$_POST['escolaultim'.$n]?><br>
</div>

<div class="ten columns">
			<h3>Fitxa mèdica</h3>
			<div class="four columns">			
			<strong>Antitetànica:</strong> <?=$_POST['antitetanica'.$n]?><br>
			<strong>Comentaris antitetànica:</strong> <?=$_POST['comentarisantitetanica'.$n]?><br>
			<strong>Alèrgia:</strong> <?=$_POST['alergia'.$n]?><br>
			<strong>Nom de l'alèrgia:</strong> <?=$_POST['nomalergia'.$n]?><br>
			<strong>Enfermetats cròniques:</strong> <?=$_POST['croniques'.$n]?><br>		
			<strong>Nom de les enfermetats cròniques:</strong> <?=$_POST['nomcroniques'.$n]?><br>			
			<strong>Intervingut:</strong> <?=$_POST['intervingut'.$n]?><br>
		</div><!--end four columns-->
		
		<div class="four columns">				
			<strong>Intervencions que ha rebut:</strong> <?=$_POST['nomintervingut'.$n]?><br>	
			<strong>Discapacitat:</strong> <?=$_POST['discapacitat'.$n]?><br>
			<strong>Nom de la discapacitat:</strong> <?=$_POST['nomdiscapacitat'.$n]?><br>	
			<strong>Descripció del caràcter:</strong> <?=$_POST['caracter'.$n]?><br>
			<strong>Patologies de la llista:</strong> <?=$_POST['patologies'.$n]?><br>
			<strong>Altres patologies que tingui:</strong> <?=$_POST['patologies2'.$n]?><br>
			<strong>Autorització mèdica:</strong> <?=$_POST['autoritzaciomedica'.$n]?><br>
	
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
			Cognoms: <?=$_POST[cognomstutor]?><br>
			Telèfon 1: <?=$_POST[tel1]?><br>
			Telèfon 2:<?=$_POST[tel2]?><br>
			Telèfon 3:<?=$_POST[tel3]?><br>	
		</div><!--tanca primer one-third-->
		
		<div class="one-third column">			
			Email 1: <?=$_POST[email1]?><br>
			Email 2: <?=$_POST[email2]?><br>
			DNI: <?=$_POST[dni]?><br>
			Numero carnet família monoparental: <?=$_POST[fammono]?><br>			
			Numero carnet família nombrosa: <?=$_POST[famnum]?><br>
		</div><!--one-third-->
		
		<div class="one-third column">
			<h3>Dades bancàries</h3>
			Entitat bancària: <?=$_POST[entitat]?><br>
			Titular compte bancari: <?=$_POST[titular]?><br>
			Forma de pagament: <?=$_POST[formapago]?><br>
			Número de compte: <?=$_POST[pentitat]?> <?=$_POST[oficina]?> <?=$_POST[dc]?> <?=$_POST[numcompte]?>             
		</div><!--one-third column-->
	</div><!--end container-->
</div><!--end bandform tutors-->


<div class="container">
<div class="sixteen columns">
	<a href="pas4.php?submit=yes" class="button">Confirmar/finailtzar</a>	
</div>
</div><!--end container-->

<? } ?>