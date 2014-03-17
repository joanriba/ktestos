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
$id=$_GET[id];

 
//EDITAR
if (isset($_POST['reenviar'])) {

$result = mysql_query("update prodvars set 
titca='$_POST[titca]',
tites='$_POST[tites]',
titen='$_POST[titen]',
titfr='$_POST[titfr]',
titit='$_POST[titit]',
titpt='$_POST[titpt]',
titde='$_POST[titde]',
titnl='$_POST[titnl]',
titar='$_POST[titar]',
titru='$_POST[titru]',
titja='$_POST[titja]',
titzh='$_POST[titzh]' where id='$_POST[id]'", $cxn);


//tornem enrere
echo '<script>document.location = "products.php#categorias"</script>';
} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from prodvars where id=$id",$cxn);
while($row=mysql_fetch_array($consulta)){

?>    


<!--variem el títol segons si estem publicant o editant-->
<h1><? if(isset($id)) {echo'editar categoria';} else {echo 'Insertar nova categoria';}?></h1>
      	   
  	   
      	      	   
<form method="post" action="?" enctype="multipart/form-data">

<!-- la id en el cas de que estiguem editant-->
<input type="hidden" name="id" value="<?=$id?>">

<input type="hidden" name="type" value="<? if(isset($_GET[id])){ echo $type;} else { echo $_GET[type];}?>">


		<h2>Título</h2>
		
			
			<label for="titca"><img src="../img/admin/ca.png"/></label>
			<input type="text" placeholder="Títol" name="titca" value="<? if(isset($id)){ echo $row[tites];}?>">
			
			<label for="tites"><img src="../img/admin/es.png"/></label>
			<input type="text" placeholder="Títol" name="tites" value="<? if(isset($id)){ echo $row[tites];}?>">

			<label for="titen"><img src="../img/admin/en.png"/></label>
			<input type="text" placeholder="Título" name="titen" value="<? if(isset($id)){ echo $row[titen];}?>">
			
			<label for="titfr"><img src="../img/admin/fr.png"/></label>
			<input type="text" placeholder="Título" name="titfr" value="<? if(isset($id)){ echo $row[titfr];}?>">
				
			<label for="titit"><img src="../img/admin/it.png"/></label>
			<input type="text" placeholder="Título" name="titit" value="<? if(isset($id)){ echo $row[titit];}?>">
			
			<label for="titpt"><img src="../img/admin/pt.png"/></label>
			<input type="text" placeholder="Título" name="titpt" value="<? if(isset($id)){ echo $row[titpt];}?>">
			
			<label for="titde"><img src="../img/admin/de.png"/></label>
			<input type="text" placeholder="Título" name="titde" value="<? if(isset($id)){ echo $row[titde];}?>">
			
			<label for="titnl"><img src="../img/admin/nl.png"/></label>
			<input type="text" placeholder="Título en neerlandés" name="titnl" value="<? if(isset($id)){ echo $row[titnl];}?>">
			
			<label for="titar"><img src="../img/admin/ar.png"/></label>
			<input type="text" placeholder="Título en árabe" name="titar" value="<? if(isset($id)){ echo $row[titar];}?>">
			
			<label for="titru"><img src="../img/admin/ru.png"/></label>
			<input type="text" placeholder="Título en ruso" name="titru" value="<? if(isset($id)){ echo $row[titru];}?>">
			
			<label for="titja"><img src="../img/admin/ja.png"/></label>
			<input type="text" placeholder="Título en japonés" name="titja" value="<? if(isset($id)){ echo $row[titja];}?>">
			
			<label for="titzh"><img src="../img/admin/zh.png"/></label>
			<input type="text" placeholder="Título en chino" name="titzh" value="<? if(isset($id)){ echo $row[titzh];}?>">
	


<input type="submit" value="<? if(isset($id)){ echo 'Guardar';} else {echo 'Publicar';}?>" name="<? if(isset($id)){ echo 'reenviar';} else {echo 'enviar';}?>"/>


</form>

<? } ?>

</div><!--tanca sixteen-->
</div><!--tanca container-->
</div><!--tanca bandadmin-->


<? include('footer.php');?>