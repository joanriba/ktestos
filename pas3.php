<?php
include('bdcon.php');
$idioma=$_POST[idioma];
$numeronens=$_POST[numeronens];
include('data-europeu.php');

	//$birthday2=$_POST[any2].'-'.$_POST[mes2].'-'.$_POST[dia2]; 
	//$birthday2 = new DateTime($birthday2); 
	//$edat2 = $birthday2->diff(new DateTime);


include('header.php');
 
?>

	<div class="bandresum">
	<div class="container">
		<div class="sixteen columns">
		
<? //REBEM L'ARRAY AMB TOTES LES DADES I LIDIOMA
$llista = $_POST['xaval'];
$idioma= $_POST[idioma];
?>

					
<? include('modul_resum.php');?>

		</div><!--end sixteen-->
	</div><!--end container-->
	</div><!--end bandresum-->

	
<form id="dadesnens" method="post" action="pas4.php" data-parsley-validate>

	<input type="hidden" name="idioma" value="<?=$idioma?>">
	<input type="hidden" name="numeronens" value="<?=$numeronens?>">

<? //FOREACH ÚNIC AMB NOM I NAIXAMENT

$llistaform=array_unique($llista_reduida);

$n=0; 
foreach ($llistaform as $value) {
$n++;
$coses=explode('/',$value);
$nom=$coses[0];
$naixament=$coses[1];
?>

<div class="bandformnen">
<div class="container">


<div class="sixteen columns">

<h1>Dades completes de <?=ucfirst($nom)?></h1>

</div>

<div class="five columns">

			<h3>Dades generals</h3>
			
			<!--dades invisibles-->
			<input type="hidden" name="nom<?=$n?>" value="<?=$nom?>">
			<input type="hidden" name="birthdate<?=$n?>" value="<?=$naixament?>">
			
			<!--end invisibles-->
			
			<label for="cognoms">Cognoms</label>
			<input type="text" name="cognoms<?=$n?>" value="" required>
									
			<label for="adreca">Adreça</label>			
			<input type="text" name="adreca<?=$n?>" value="" required>
			
			<label for="poblacio">Població</label>			
			<input type="text" name="poblacio<?=$n?>" value="" required>
			
			<label for="cp">Codi Postal</label>			
			<input type="text" name="cp<?=$n?>" value="">
			
			<label for="cursacabat">Curs acabat</label>			
			<input type="text" name="cursacabat<?=$n?>" value="" required>
			
			<label for="escolaultim">Últim escola on s'ha estat</label>			
			<input type="text" name="escolaultim<?=$n?>" value="" required>
</div>

<div class="ten columns">

			<h3>Fitxa mèdica</h3>

		<div class="fitxamedica">
		
		<div class="four columns">			
			
			<!--select antitetanica-->
			<label for="antitetanica">Antitetànica</label>
						<select id="antitetanica<?=$n?>" name="antitetanica<?=$n?>" required>	
							<option value=""></option>	
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
			
			
				<textarea style="display: none;" id="nomantitetanica<?=$n?>" name="nomantitetanica<?=$n?>" placeholder="Comentaris antitetànica"></textarea>

						
								
						
			<!--select Alèrgia-->
			<label for="alergia">Alèrgia</label>
						<select id="alergia<?=$n?>" name="alergia<?=$n?>" required>
							<option value=""></option>		
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
			
			
				<textarea style="display: none;" id="nomalergia<?=$n?>" name="nomalergia<?=$n?>" placeholder="Nom de les alèrgies"></textarea>
						

			
			
			<!--select Enfermetats cròniques-->
			<label for="croniques">Enfermetats cròniques</label>
						<select id="croniques<?=$n?>" name="croniques<?=$n?>" required>		
							<option value=""></option>
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
			
				<textarea style="display: none;" id="nomcroniques<?=$n?>" name="nomcroniques<?=$n?>" placeholder="Nom de les enfermetats cròniques"></textarea>			


					<!--select intervingut-->
			<label for="intervingut">intervingut</label>
						<select id="intervingut<?=$n?>" name="intervingut<?=$n?>" required>
							<option value=""></option>		
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
		
					
			<textarea style="display: none;" id="nomintervingut<?=$n?>" name="nomintervingut<?=$n?>" placeholder="Nom de les intervencions"></textarea>	


						
<script type="text/javascript">
$(document).ready( function() {



$('#intervingut<?=$n?>').bind('change', function (e) { 
    if( $('#intervingut<?=$n?>').val() == 'si') {
      $('#nomintervingut<?=$n?>').show();
    }
    else{
      $('#nomintervingut<?=$n?>').hide();
    }         
  });


$('#antitetanica<?=$n?>').bind('change', function (e) { 
    if( $('#antitetanica<?=$n?>').val() == 'si') {
      $('#nomantitetanica<?=$n?>').show();
    }
    else{
      $('#nomantitetanica<?=$n?>').hide();
    }         
  });


	
$('#alergia<?=$n?>').bind('change', function (e) { 
    if( $('#alergia<?=$n?>').val() == 'si') {
      $('#nomalergia<?=$n?>').show();
    }
    else{
      $('#nomalergia<?=$n?>').hide();
    }         
  });




  $('#croniques<?=$n?>').bind('change', function (e) { 
    if( $('#croniques<?=$n?>').val() == 'si') {
      $('#nomcroniques<?=$n?>').show();
    }
    else{
      $('#nomcronicques<?=$n?>').hide();
    }         
  });
  
  
});
</script>

						
	
			
		
		
		
		</div><!--end four columns-->
		
		<div class="four columns">
		
					
			
			
			
			<!--select Discapacitat-->
			<label for="discapacitat">Discapacitat</label>
						<select id="discapacitat<?=$n?>" name="discapacitat<?=$n?>" required>
							<option value=""></option>		
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
					
			<textarea style="display: none;" id="nomdiscapacitat<?=$n?>" name="nomdiscapacitat<?=$n?>" placeholder="Nom de la discapacitat"></textarea>	
			
<script type="text/javascript">
$(document).ready( function() {



  $('#discapacitat<?=$n?>').bind('change', function (e) { 
    if( $('#discapacitat<?=$n?>').val() == 'si') {
      $('#nomdiscapacitat<?=$n?>').show();
    }
    else{
      $('#nomdiscapacitat<?=$n?>').hide();
    }         
  });
  
});
</script>	
							
						
			<!-- Descripció del caràcter-->			
			<label for="caracter">Descripció del caràcter</label>
			<textarea name="caracter<?=$n?>"></textarea>
			
			
			<!-- Patologies de la llista-->			
			<label for="patologies">Patologies de la llista</label>
			<input type="text" name="patologies<?=$n?>" value="">
			
			
			<!-- Patologies de la llista-->			
			<label for="patologies2">Altres patologies que tingui</label>
			<input type="text" name="patologies2<?=$n?>" value="">
	

	
				<!--select autorització mèdica-->
			<label for="autoritzaciomedica"><a class="demo">Autorització mèdica</a></label>
						<select name="autoritzaciomedica<?=$n?>" required>
							<option value=""></option>		
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
				
					
</div><!--end four-->
		</div>
</div><!--end ten columns-->
</div><!--end container-->
</div><!-- end bandform-->

<? } //tanca foreach del formulari?>


<div class="bandformtutor">
	<div class="container">
	<div class="sixteen columns">
	
	<h2>Dades del tutor legal</h2>
	
	</div><!--end sixteen-->
	
		<div class="one-third column">
	
	
			<label for="nom">Nom del pare/mare/tutor legal</label>
			<input type="text" name="nomtutor" value="" required>
			
			<label for="cognoms">Cognoms</label>
			<input type="text" name="cognomstutor" value="" required>
			

						
			<label for="tel1">Telèfon 1</label>			
			<input type="text" name="tel1" value="" required>
			
			<label for="tel2">Telèfon 2</label>			
			<input type="text" name="tel2" value="">

			
		
		</div><!--tanca primer one-third-->
		
		<div class="one-third column">
		
		
			
			<label for="tel3">Telèfon 3</label>			
			<input type="text" name="tel3" value="">			
			
			<label for="email1">Email</label>			
			<input type="text" name="email1" value="" required>
			
			<label for="email2">Repeteix el teu email</label>			
			<input type="text" name="email2" value="">
			
			

			
		</div><!--one-third-->
		
		<div class="one-third column">
			
			
			<label for="dni">DNI/NIF/Passaport</label>			
			<input type="text" name="dni" value="" required>

			
			<label for="fammono">Numero carnet família monoparental</label>			
			<input type="text" name="fammono" value="">
			
			<label for="famnum">Numero carnet família nombrosa</label>			
			<input type="text" name="famnum" value="">
					
		</div><!--one-third column-->
	
	
	</div><!--end container-->
</div><!--end bandform tutors-->


<!--ENVIEM LA LLISTA DE COMANDES-->
<!--****************************-->
<?
foreach ($llista as $value) { $coses=explode('/',$value); $nom=$coses[0]; $naixament=$coses[1]; $idmodul=$coses[2];?>
<input type="hidden" name="llista[]" value="<?=$nom?>/<?=$naixament?>/<?=$idmodul?>">

<? } ?>

<!-- END LLISTA DE COMANDES-->
<!-- **********************-->


<div class="container">
<div class="sixteen columns"><a class="button" href="www.kinobs.com" onclick="window.history.go(-1); return false;">Anterior</a><input type="submit" name="submit" value="Següent"/></div>
</div><!--end container-->

</form>
   
  <script type="text/javascript">
				$('#dadesnens').parsley();
				</script>  