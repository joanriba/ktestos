<?php
include('bdcon.php');
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
$llista = $_POST['xaval']; ?>

					
<? include('modul_resum.php');?>

		</div><!--end sixteen-->
	</div><!--end container-->
	</div><!--end bandresum-->

	
<form id="dadesnens" method="post" action="pas4.php" enctype="multipart/form-data" data-parsley-validate>

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

<h1><?=$word['dadescompletes'][$idioma]?> <?=ucfirst($nom)?></h1>

</div>

<div class="five columns">

			<h3><?=$word['dadesgenerals'][$idioma]?></h3>
			
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

			<h3><?=$word['fitxamedica'][$idioma]?></h3>

		<div class="fitxamedica">
		
		<div class="four columns">			
			
			<!--select antitetanica-->
			<label for="antitetanica"><?=$word['fantitetanica'][$idioma]?></label>
						<select id="antitetanica<?=$n?>" name="antitetanica<?=$n?>" required>	
							<option value=""></option>	
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
			
			
				<textarea style="display: none;" id="nomantitetanica<?=$n?>" name="nomantitetanica<?=$n?>" placeholder="<?=$word['fnomantitetanica'][$idioma]?>"></textarea>

						
								
						
			<!--select Alèrgia-->
			<label for="alergia"><?=$word['falergia'][$idioma]?></label>
						<select id="alergia<?=$n?>" name="alergia<?=$n?>" required>
							<option value=""></option>		
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
			
			
				<textarea style="display: none;" id="nomalergia<?=$n?>" name="nomalergia<?=$n?>" placeholder="<?=$word['fnomalergia'][$idioma]?>"></textarea>
						

			
			
			<!--select Enfermetats cròniques-->
			<label for="croniques"><?=$word['fcroniques'][$idioma]?></label>
						<select id="croniques<?=$n?>" name="croniques<?=$n?>" required>		
							<option value=""></option>
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
			
				<textarea style="display: none;" id="nomcroniques<?=$n?>" name="nomcroniques<?=$n?>" placeholder="<?=$word['fnomcroniques'][$idioma]?>"></textarea>			


					<!--select intervingut-->
			<label for="intervingut"><?=$word['fintervingut'][$idioma]?></label>
						<select id="intervingut<?=$n?>" name="intervingut<?=$n?>" required>
							<option value=""></option>		
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
		
					
			<textarea style="display: none;" id="nomintervingut<?=$n?>" name="nomintervingut<?=$n?>" placeholder="<?=$word['fnomintervingut'][$idioma]?>"></textarea>	

			
			<label for="fitxa"><?=$word['attachfile'][$idioma]?></label>
			<input type="file" name="fitxa<?=$n?>" id="fitxa<?=$n?>">
			
						
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
			<label for="discapacitat"><?=$word['fdiscapacitat'][$idioma]?></label>
						<select id="discapacitat<?=$n?>" name="discapacitat<?=$n?>" required>
							<option value=""></option>		
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
					
			<textarea style="display: none;" id="nomdiscapacitat<?=$n?>" name="nomdiscapacitat<?=$n?>" placeholder="<?=$word['fnomdiscapacitat'][$idioma]?>"></textarea>	
			
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
			<label for="caracter"><?=$word['fcaracter'][$idioma]?></label>
			<textarea name="caracter<?=$n?>"></textarea>
			
			
			<!-- Patologies de la llista-->			
			<label for="patologies"><?=$word['fpatologies'][$idioma]?></label>
			<input type="text" name="patologies<?=$n?>" value="">
			
			
			<!-- Patologies de la llista-->			
			<label for="patologies2"><?=$word['fpatologies2'][$idioma]?></label>
			<input type="text" name="patologies2<?=$n?>" value="">
	

	
				<!--select autorització mèdica-->
			<label for="autoritzaciomedica"><a class="demo"><?=$word['fmedica'][$idioma]?></a></label>
						<select name="autoritzaciomedica<?=$n?>" required>
							<option value=""></option>		
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
						
				<!--select autorització mèdica-->
			<label for="autoritzaciomedicab"><a class="demo"><?=$word['fmedica'][$idioma]?></a></label>
						<select name="autoritzaciomedicab<?=$n?>" required>
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
	
	<h2><?=$word['dadestutor'][$idioma]?></h2>
	
	</div><!--end sixteen-->
	
		<div class="one-third column">
	
	
			<label for="nom"><?=$word['pnom'][$idioma]?></label>
			<input type="text" name="nomtutor" value="" required>
			
			<label for="cognoms"><?=$word['pcognoms'][$idioma]?></label>
			<input type="text" name="cognomstutor" value="" required>
			

						
			<label for="tel1"><?=$word['tel1'][$idioma]?></label>			
			<input type="text" name="tel1" value="" required>
			
			<label for="tel2"><?=$word['tel2'][$idioma]?></label>			
			<input type="text" name="tel2" value="">

			
		
		</div><!--tanca primer one-third-->
		
		<div class="one-third column">
		
		
			
			<label for="tel3"><?=$word['tel3'][$idioma]?></label>			
			<input type="text" name="tel3" value="">			
			
			<label for="email1"><?=$word['email'][$idioma]?></label>			
			<input type="text" name="email1" value="" required>
			
			<label for="email2"><?=$word['repeatemail'][$idioma]?></label>			
			<input type="text" name="email2" value="">
			
			

			
		</div><!--one-third-->
		
		<div class="one-third column">
			
			
			<label for="dni"><?=$word['dni'][$idioma]?></label>			
			<input type="text" name="dni" value="" required>

			
			<label for="fammono"><?=$word['carnetmonoparental'][$idioma]?></label>			
			<input type="text" name="fammono" value="">
			
			<label for="famnum"><?=$word['carnetnombrosa'][$idioma]?></label>			
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
<div class="sixteen columns"><a class="button" href="www.kinobs.com" onclick="window.history.go(-1); return false;"><?=$word['previous'][$idioma]?></a><input type="submit" name="submit" value="<?=$word['next'][$idioma]?>"/></div>
</div><!--end container-->

</form>
   
  <script type="text/javascript">
				$('#dadesnens').parsley();
				</script>  