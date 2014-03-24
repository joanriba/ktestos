<?php 
include('security.php');
include('../bdcon.php');
include('menu.php');
?>


<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">

<? 
$id=$_GET[id];


//PUBLICAR
if (isset ($_POST['enviar'])) {
mysql_query("INSERT INTO moduls(idactivitat,dinici,dfinal,preu,maximnens,edat) VALUES('$_POST[idactivitat]','$_POST[dinici]','$_POST[dfinal]','$_POST[preu]','$_POST[maximnens]','$_POST[edat]')",$cxn);
echo '<script>document.location = "historial.php"</script>'; 
} ?>


<? 
//BORRAR
if($_GET[borrar]=="yes") {

$result = mysql_query("delete from historial where id='$id'",$cxn);
echo '<script>document.location = "historial.php"</script>';
} ?>


<? 
//EDITAR
if (isset($_POST['reenviar'])) {

$result = mysql_query("update moduls set dinici='$_POST[dinici]', dfinal='$_POST[dfinal]', maximnens='$_POST[maximnens]', edat='$_POST[edat]',preu='$_POST[preu]' where id='$_POST[id]'", $cxn);

//tornem enrere
echo '<script>document.location = "historial.php"</script>';
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
<h1><? if(isset($id)) {echo'Editar entrada del historial';} else {echo 'Insertar nova entrada al historial';}?></h1>
      	   
				</div><!--end sixteen-->

      	      	   
<form method="post" action="?" enctype="multipart/form-data">
<!-- la id en el cas de que estiguem editant-->
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="idactivitat" value="<?=$idactivitat?>">
<input type="hidden" name="type" value="<? if(isset($_GET[id])){ echo $type;} else { echo $_GET[type];}?>">

						
			
		
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