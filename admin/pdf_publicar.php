<?php 
ini_set( "memory_limit", "600M" );
include('../bdcon.php');
include('security.php');
include('menu.php');
?>


<div class="band">
	<div class="container">
		<div class="sixteen columns">


<? 
//REBEM LA ID EN CAS DE QUE VOLGUEM EDITAR O BORRAR
$id_supplier=$_GET[id_supplier];
$id=$_GET[id_offer];


//BORRAR des de fotos.php
if($_GET[borrar]=="yes") {
$id=$_GET[id];
$result = mysql_query("delete from media where id='$id'",$cxn);
echo '<script>document.location = "publications.php"</script>';
} 

?>	

<? if (isset ($_POST['enviar'])) {

$imatge=$_POST[imatge];


mysql_query("INSERT INTO media (tit,deses,idpubli,type) VALUES ('$_POST[tit]','$_POST[des]','$_POST[id]','pdf')",$cxn);

$id_nova= mysql_insert_id(); 

if(!$cxn) {echo'No ha conectat';} else { echo '<div class="seccio22">Les dades s\'han tramitat satisfactòriament</div>';}

//busquem la seguent id
$carpeta="../pdf/"; //Definim carpeta on aniran els arxius

//amb la seguent linia guardariem la imatge original amb el nom id
copy($_FILES['imatge']['tmp_name'],$carpeta.'/'.$_POST[tit].'-'.$id_nova.'.pdf');

//$img_original=$id_nova.'.pdf';
//$pieces= explode(".", $img_original);
//$pdf_ca=$_POST[titca].'-thu-'.$pieces[0].'.pdf';


	echo '<script>document.location = "publications.php"</script>';

} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from media where id=$id",$cxn);
while($row=mysql_fetch_array($consulta)){
$deses=$row[deses]; $idpubli=$row[idpubli];}
?>    


<!--variem el títol segons si estem publicant o editant-->
<h1>Pujar nou pdf</h1>
      	   
<form method="post" action="?" enctype="multipart/form-data">

			<input type="hidden" value="<?=$_GET[id]?>" name="id">
			
			Selecciona l'arxiu pdf:<br>
			<input type="file" name="imatge"/>
						
			
			<fieldset>
			Nom del pdf<br>
			<p style="color: red;">
			Atenció! Procés irreversible. Esculli un nom pel pdf. 
			Exemple: arxiu-adjunt-amb-oferta (No s'accepten caràcters especials. Només text pla separat per guions mitjos)</p>
			<input type="text" placeholder="nom-separat-per-guions" name="tit"><br/>
			</fieldset>
			
			
			<fieldset>
			Descripció<br/>
			<textarea name="des" placeholder="opcional" cols="" rows="3" ><?=$deses?></textarea><br/>
			
			</fieldset>
			
			<input type="submit" value="Guardar" name="enviar"/>

</form>

</div><!--tanca container-->
</div>
<? include('footer.php');?>