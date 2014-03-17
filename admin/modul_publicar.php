<?php 

ini_set( "memory_limit", "600M" );

include('../bdcon.php');
include('security.php');
include('menu.php');
?>


<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">

<? 
$type=$_GET[type];
$id=$_GET[id];
$idactivitat=$_GET[idactivitat];

//PUBLICAR
if (isset ($_POST['enviar'])) {
mysql_query("INSERT INTO moduls(idactivitat,dinici,dfinal,preu,maximnens,edat) VALUES('$_POST[idactivitat]','$_POST[dinici]','$_POST[dfinal]','$_POST[preu]','$_POST[maximnens]','$_POST[edat]')",$cxn);
echo '<script>document.location = "activitats.php"</script>'; 
} ?>


<? 
//BORRAR
if($_GET[borrar]=="yes") {
$result = mysql_query("delete from moduls where id='$id'",$cxn);
echo '<script>document.location = "activitats.php"</script>';
} ?>


<? 
//EDITAR
if (isset($_POST['reenviar'])) {

$result = mysql_query("update moduls set dinici='$_POST[dinici]', dfinal='$_POST[dfinal]', maximnens='$_POST[maximnens]', edat='$_POST[edat]',preu='$_POST[preu]' where id='$_POST[id]'", $cxn);

//tornem enrere
echo '<script>document.location = "activitats.php"</script>';
} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from moduls where moduls.id=$id",$cxn);
while($row=mysql_fetch_array($consulta)){
$dinici=$row[dinici];$dfinal=$row[dfinal];$preu=$row[preu];$maximnens=$row[maximnens]; $edat=$row[edat];}
?>    


<div class="bandcontent-admin">
	<div class="container">
		
				<div class="sixteen columns">		

<!--variem el títol segons si estem publicant o editant-->
<h1><? if(isset($id)) {echo'Editar mòdul';} else {echo 'Insertar nou mòdul';}?></h1>
      	   
				</div><!--end sixteen-->

      	      	   
<form method="post" action="?" enctype="multipart/form-data">
<!-- la id en el cas de que estiguem editant-->
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="idactivitat" value="<?=$idactivitat?>">
<input type="hidden" name="type" value="<? if(isset($_GET[id])){ echo $type;} else { echo $_GET[type];}?>">

			
			
			<label for="datainici">Data d'inici del mòdul</label><span class="red">Exemple: 2014-06-21</span>
			<input type="text" name="dinici" value="<? if(isset($id)){ echo $dinici;}?>">
			
		
			<label for="datafinal">Data de finalització del mòdul</label><span class="red">Exemple: 2014-06-27</span>
			<input type="text" name="dfinal" value="<? if(isset($id)){ echo $dfinal;}?>">
			
			<label for="preu">Preu</label><span class="red">Exemple: 15</span>
			<input type="text" name="preu" placeholder="15" value="<? if(isset($id)){ echo $preu;}?>">
			
			
			<label for="maximnens">Nombre màxim de nens que es poden inscriure</label>
			<input type="text" name="maximnens" placeholder="15" value="<? if(isset($id)){ echo $maximnens;}?>">
			
			
			
			
			<label for="edat">Selecciona a partir de quina edat es pot fer aquesta activitat</label>
			<select name="edat">
						
			<? if(isset($id)){ ?><option value="<?=$edat?>">Actualment: <?=$edat?></option><? } ?>
	
	
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
					
			</select>
			
			
			
		</div>
		
	</div><!--end container-->
		
		<div class="container">
		<div class="seven">

	
	</div>
</div><!--end container-->

<input type="submit" value="<? if(isset($id)){ echo 'Guardar';} else {echo 'Publicar';}?>" name="<? if(isset($id)){ echo 'reenviar';} else {echo 'enviar';}?>"/>


</form>

</div><!--tanca sixteen-->
</div><!--tanca container-->
</div><!--tanca bandadmin-->


<? include('footer.php');?>