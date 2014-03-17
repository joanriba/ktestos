<?php 

ini_set( "memory_limit", "600M" );

include('../bdcon.php');
include('security.php');
include('menu.php');
?>

<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>

<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">

<? 
$type=$_GET[type];
$id=$_GET[id];

//PUBLICAR
if (isset ($_POST['enviar'])) {
mysql_query("INSERT INTO categories(nomca,nomes) VALUES('$_POST[nomca]','$_POST[nomes]')",$cxn);
echo '<script>document.location = "activitats.php"</script>'; 
} ?>


<? 
//BORRAR
if($_GET[borrar]=="yes") {
$result = mysql_query("delete from categories where id='$id'",$cxn);
echo '<script>document.location = "activitats.php"</script>';
} ?>


<? 
//EDITAR
if (isset($_POST['reenviar'])) {

$result = mysql_query("update categories set nomes='$_POST[nomes]', nomca='$_POST[nomca]' where id='$_POST[id]'", $cxn);

//tornem enrere
echo '<script>document.location = "activitats.php"</script>';
} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from categories where id=$id",$cxn);
while($row=mysql_fetch_array($consulta)){
$nomes=$row[nomes];$nomca=$row[nomca];}
?>    


<!--variem el títol segons si estem publicant o editant-->
<h1><? if(isset($id)) {echo'editar categoria';} else {echo 'Insertar nova categoria';}?></h1>
      	   
  	   
      	      	   
<form method="post" action="?" enctype="multipart/form-data">

<!-- la id en el cas de que estiguem editant-->
<input type="hidden" name="id" value="<?=$id?>">

<input type="hidden" name="type" value="<? if(isset($_GET[id])){ echo $type;} else { echo $_GET[type];}?>">



<table cellpadding="5" cellspacing="5">
	<tr>
	
		<td>
			<img src="../img/admin/ca.png"/>
			<input type="text" name="nomca" value="<? if(isset($id)){ echo $nomca;}?>"><br/>
		</td>
	
		<td>
			<img src="../img/admin/es.png"/>
			<input type="text" name="nomes" value="<? if(isset($id)){ echo $nomes;}?>"><br/>
		</td>
		
	</tr>	
</table>




<input type="submit" value="<? if(isset($id)){ echo 'Guardar';} else {echo 'Publicar';}?>" name="<? if(isset($id)){ echo 'reenviar';} else {echo 'enviar';}?>"/>


</form>

</div><!--tanca sixteen-->
</div><!--tanca container-->
</div><!--tanca bandadmin-->


<? include('footer.php');?>