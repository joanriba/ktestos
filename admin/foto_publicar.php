<?php 
ini_set( "memory_limit", "600M" );
include('../bdcon.php');
include('security.php');
include('menu.php');
?>


<div class="bandcontent">
	<div class="container">

<? 
//REBEM LA ID EN CAS DE QUE VOLGUEM EDITAR O BORRAR
$idpost=$_GET[id_publi];
$id=$_GET[id];

//BORRAR des de news.php
if($_GET[nborrar]=="yes") {
$result = mysql_query("delete from media where id='$id'",$cxn);
echo '<script>document.location = "entries.php"</script>';
} 

//BORRAR des de fotos.php
if($_GET[borrar]=="yes") {
$result = mysql_query("delete from media where id='$id'",$cxn);
echo '<script>document.location = "entries.php"</script>';
} 

?>	

<? if (isset ($_POST['enviar'])) {

$imatge=$_POST[imatge];


mysql_query("INSERT INTO media (tites,titen,deses,desen,idpubli,type)
VALUES
('$_POST[tites]','$_POST[titen]','$_POST[deses]','$_POST[desen]','$_POST[idpost]','img')",$cxn);


$id_nova= mysql_insert_id(); 

if(!$cxn) {echo'No ha conectat';} else { echo '<div class="seccio22">Les dades s\'han tramitat satisfactòriament</div>';}

//busquem la seguent id
$carpeta="../fotos/"; //Definim carpeta on aniran els arxius

//amb la seguent linia guardariem la imatge original amb el nom id
copy($_FILES['imatge']['tmp_name'],$carpeta.'/'.$id_nova.'.jpg');

$img_original=$id_nova.'.jpg';

$pieces= explode(".", $img_original);

 
$img_thu_es=$_POST[tites].'-thu-'.$pieces[0].'.jpg';
$img_med_es=$_POST[tites].'-med-'.$pieces[0].'.jpg';
$img_big_es=$_POST[tites].'-big-'.$pieces[0].'.jpg';
$img_thu_en=$_POST[titen].'-thu-'.$pieces[0].'.jpg';
$img_med_en=$_POST[titen].'-med-'.$pieces[0].'.jpg';
$img_big_en=$_POST[titen].'-big-'.$pieces[0].'.jpg';

require('imgprocess4.php');
		
		echo '<script>document.location = "entries.php"</script>';

} ?>


<? 
//EDITAR
if (isset($_POST['reenviar'])) {

$result = mysql_query("update media set 
deses='$_POST[deses]',
desen='$_POST[desen]',
category='$_POST[category]',
where id='$_POST[id]'", $cxn);

//tornem enrere
echo '<script>document.location = "entries.php"</script>';
} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from media where id=$id and type='img'",$cxn);
while($row=mysql_fetch_array($consulta)){
$deses=$row[deses];$category=$row[category];}
?>    


<!--variem el títol segons si estem publicant o editant-->
<h1><? if(isset($id)) {echo'editar foto';} else {echo 'Pujar nova foto';}?></h1>
      	   
<form method="post" action="?" enctype="multipart/form-data">

<input type="hidden" value="<?=$id?>" name="id">

<? if(isset($id)) {} else {?>

<input type="hidden" name="idpost" value="<?=$idpost?>"/>

<div class="seccio2">Selecciona el archivo jpg:<br/>
<input type="file" name="imatge"/></div>


<div class="seccio2">Nom de la foto<br/> 
<p style="color: red;">Atenció! Procés irreversible.<br/> Esculli un bon nom amb paraules clau</p><small>Exemple: foto-de-una-palmera-tratada-con-nofly<br/> (No se aceptan carácteres especiales. Solo texto plano separado por guiones medios)</small>
<table cellpadding="5" cellspacing="5">
	<tr>
		<td>
			<img src="../img/admin/es.png"/><br/>
			<input type="text" name="tites" size="40"><br/>
		</td>
	</tr>	
	
	<tr>
		<td>
			<img src="../img/admin/en.png"/><br/>
			<input type="text" name="titen" size="40"><br/>
		</td>
	</tr>	
	
		
</table>
</div><!--tanca seccio2-->
<? } ?>


<div class="seccio2">
<table cellpadding="5" cellspacing="5">
	<tr>
		<td>
			<img src="../img/admin/es.png"/>Descripción de la imagen<br/>
			<textarea name="deses" cols="25" rows="3" ><? if(isset($id)){ echo $deses;}?></textarea><br/>
		</td>
	</tr>	
	
	<tr>
		<td>
			<img src="../img/admin/en.png"/>Image description<br/>
			<textarea name="desen" cols="25" rows="3" ><? if(isset($id)){ echo $desen;}?></textarea><br/>
		</td>
	</tr>	
	
</table>
</div><!--tanca seccio2-->



<div class="seccio2">
<input type="submit" value="<? if(isset($id)){ echo 'Guardar';} else {echo 'Publicar';}?>" name="<? if(isset($id)){ echo 'reenviar';} else {echo 'enviar';}?>"/>
</div>

</form>



</div><!--end sixteen-->
</div><!--end container-->
</div><!--end band-->


<? include('footer.php');?>