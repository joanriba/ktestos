<?php 

ini_set( "memory_limit", "600M" );

include('../bdcon.php');
include('security.php');
include('menu.php');
?>


<?  $id=$_GET[id];

//PUBLICAR
if (isset ($_POST['enviar'])) {
mysql_query("INSERT INTO publications( name,author,media,pag,lang,category,fecha) VALUES('$_POST[name]','$_POST[author]','$_POST[media]','$_POST[pag]','$_POST[lang]','$_POST[category]',NOW())",$cxn);
echo '<script>document.location = "publications.php"</script>'; 
} ?>


<? 
//BORRAR
if($_GET[borrar]=="yes") {
$result = mysql_query("delete from publications where id='$id'",$cxn);
echo '<script>document.location = "publications.php"</script>';
} ?>


<? 
//EDITAR
if (isset($_POST['reenviar'])) {

$result = mysql_query("update publications set 
name='$_POST[name]',author='$_POST[author]',media='$_POST[media]',pag='$_POST[pag]',lang='$_POST[lang]',category='$_POST[category]',fecha='$_POST[fecha]' where id='$_POST[id]'", $cxn);

//tornem enrere
echo '<script>document.location = "publications.php"</script>';
} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from publications where id=$id",$cxn);
while($row=mysql_fetch_array($consulta)){
$name=$row[name];$author=$row[author];$media=$row[media];$pag=$row[pag];$lang=$row[lang];$category=$row[category];$fecha=$row[fecha];}
?>    

<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">
			<!--variem el títol segons si estem publicant o editant-->
			<h1><? if(isset($id)) {echo'Editar publicación';} else {echo 'Crear nueva publicación';}?></h1>
		</div>
		
		  	      	   
		<form method="post" action="?" enctype="multipart/form-data">
		<!-- la id en el cas de que estiguem editant-->
		<input type="hidden" name="id" value="<?=$id?>">

		
	

			<input type="text" placeholder="título" name="name" value="<? if(isset($id)){ echo $name;}?>">
			<input type="text" placeholder="autor" name="author" value="<? if(isset($id)){ echo $author;}?>">
			<input type="text" placeholder="donde se ha publicado" name="media" value="<? if(isset($id)){ echo $media;}?>">
			<input type="text" placeholder="páginas" name="pag" value="<? if(isset($id)){ echo $pag;}?>">
			<? if(isset($id)){?><input type="text" placeholder="2013-05-31" name="fecha" value="<?=$fecha?>"><? }?>


				
		<!--Categoria 1-->
		<select name="category">
		
		<? //fem la consulta a la taula
		$consulta=mysql_query("select * from publicat where id='$category'",$cxn);
		$consulta2=mysql_query("select * from publicat",$cxn);?>

		<? if(isset($id)){?>
		
		<? while($row=mysql_fetch_array($consulta)){ $nomcategoria=$row[tites]; $categoria=$row[id]; }?>
		<option value="<?=$categoria?>">Actualment: <?=$nomcategoria?></option>


		<? while($row=mysql_fetch_array($consulta2)){ ?>
			<option value="<?=$row[id]?>"><?=$row[tites]?></option>
		<? }?>
		
		<? } else {
		
		while($row=mysql_fetch_array($consulta2)){?>
			<option value="<?=$row[id]?>"><?=$row[tites]?></option>
		<? }} ?>	
		</select>
		
		
		
		<!--Categoria 2-->
		Idioma de la publicación:
		<select name="lang">
			<option value="ca">català</option>
			<option value="es">castellano</option>
			<option value="en">inglés</option>
			<option value="fr">francés</option>
			<option value="it">italiano</option>
		</select>
		
		
		</div>
	</div><!--container-->
	
	<div class="container">
		<div class="thirteen columns">
			
		</div>
	
		<div class="three columns">
			<input type="submit" value="<? if(isset($id)){ echo 'Guardar';} else {echo 'Publicar';}?>" name="<? if(isset($id)){ echo 'reenviar';} else {echo 'enviar';}?>"/>
		</div>
	
	</div><!--end container-->	
	</form>

</div><!--tanca bandcontent-admin-->

<? include('footer.php');?>
