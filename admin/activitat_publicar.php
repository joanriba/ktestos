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

//PUBLICAR
if (isset ($_POST['enviar'])) {
mysql_query("INSERT INTO activitats(nomca,nomes,desca,deses,categoria) VALUES('$_POST[nomca]','$_POST[nomes]','$_POST[desca]','$_POST[deses]','$_POST[categoria]')",$cxn);
echo '<script>document.location = "activitats.php"</script>'; 
} ?>


<? 
//BORRAR
if($_GET[borrar]=="yes") {
$result = mysql_query("delete from activitats where id='$id'",$cxn);
echo '<script>document.location = "activitats.php"</script>';
} ?>


<? 
//EDITAR
if (isset($_POST['reenviar'])) {

$result = mysql_query("update activitats set nomes='$_POST[nomes]', nomca='$_POST[nomca]', desca='$_POST[desca]', deses='$_POST[deses]', categoria='$_POST[categoria]' where id='$_POST[id]'", $cxn);

//tornem enrere
echo '<script>document.location = "activitats.php"</script>';
} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select activitats.nomes,activitats.nomca,activitats.deses,activitats.desca,activitats.categoria,categories.nomca as nomcategoria from activitats inner join categories on categories.id=activitats.categoria where activitats.id=$id",$cxn);
while($row=mysql_fetch_array($consulta)){
$nomes=$row[nomes];$nomca=$row[nomca];$deses=$row[deses];$desca=$row[desca];$categoria=$row[categoria];$nomcategoria=$row[nomcategoria];}
?>    


<div class="bandcontent-admin">
	<div class="container">
		
				<div class="sixteen columns">		

<!--variem el títol segons si estem publicant o editant-->
<h1><? if(isset($id)) {echo'editar activitat';} else {echo 'Insertar nova activitat';}?></h1>
      	   
				</div><!--end sixteen-->

      	      	   
<form method="post" action="?" enctype="multipart/form-data">
<!-- la id en el cas de que estiguem editant-->
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="type" value="<? if(isset($_GET[id])){ echo $type;} else { echo $_GET[type];}?>">

			
			<div class="seven columns">


			<img src="../img/admin/ca.png"/>
			<input type="text" name="nomca" value="<? if(isset($id)){ echo $nomca;}?>"><br/>
			
			<label>Descripció de l'activitat</label><textarea rows="10" cols="60" name="desca"><? if(isset($id)){ echo $desca;}?></textarea>
		</div>


		<div class="seven columns">
			<img src="../img/admin/es.png"/>
			<input type="text" name="nomes" value="<? if(isset($id)){ echo $nomes;}?>"><br/>
			
			<label>Descripción de la activitad</label><textarea rows="10" cols="60" name="deses"><? if(isset($id)){ echo $deses;}?></textarea>
		</div>
		
	</div><!--end container-->
		
		<div class="container">
		<div class="seven">


<label for="categoria">Selecciona a la categoria que pertany</label>
			<select name="categoria">
			
			
			<? if(isset($id)){ ?><option value="<?=$categoria?>">Actualment: <?=$nomcategoria?></option><? } ?>
			
			<? //LOOP DE CATEGORIES PEL SELECT
			$consulta=mysql_query("select * from categories",$cxn);
			while($row=mysql_fetch_array($consulta)){ ?>   
			
			<option value="<?=$row[id]?>"><?=$row[nomca]?></option>
			
			<? } ?>
			
			</select>
	
	</div>
</div><!--end container-->

<input type="submit" value="<? if(isset($id)){ echo 'Guardar';} else {echo 'Publicar';}?>" name="<? if(isset($id)){ echo 'reenviar';} else {echo 'enviar';}?>"/>


</form>

</div><!--tanca sixteen-->
</div><!--tanca container-->
</div><!--tanca bandadmin-->


<? include('footer.php');?>