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
titzh='$_POST[titzh]',
shortca='$_POST[shortca]',
shortes='$_POST[shortes]',
shorten='$_POST[shorten]',
shortfr='$_POST[shortfr]',
shortit='$_POST[shortit]',
shortpt='$_POST[shortpt]',
shortde='$_POST[shortde]',
shortnl='$_POST[shortnl]',
shortar='$_POST[shortar]',
shortru='$_POST[shortru]',
shortja='$_POST[shortja]',
shortzh='$_POST[shortzh]',
desca='$_POST[desca]',
deses='$_POST[deses]',
desen='$_POST[desen]',
desfr='$_POST[desfr]',
desit='$_POST[desit]',
despt='$_POST[despt]',
desde='$_POST[desde]',
desnl='$_POST[desnl]',
desar='$_POST[desar]',
desru='$_POST[desru]',
desja='$_POST[desja]',
deszh='$_POST[deszh]'
where id='$_POST[id]'", $cxn);


//tornem enrere
echo '<script>document.location = "products.php#familias"</script>';
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

			
		<h1>Descripción breve</h1>
		
		
			<img src="../img/admin/ca.png"/>
			<textarea name="shortca"  rows="10" ><? if(isset($id)){ echo $row[shortca];}?></textarea>
						
			<img src="../img/admin/es.png"/>
			<textarea name="shortes"  rows="10" ><? if(isset($id)){ echo $row[shortes];}?></textarea>
		
			<img src="../img/admin/en.png"/>			
			<textarea name="shorten" rows="10" ><? if(isset($id)){ echo $row[shorten];}?></textarea>
			
			<img src="../img/admin/fr.png"/>			
			<textarea name="shortfr" rows="10" ><? if(isset($id)){ echo $row[shortfr];}?></textarea>
			
			<img src="../img/admin/it.png"/>			
			<textarea name="shortit" rows="10" ><? if(isset($id)){ echo $row[shortit];}?></textarea>
			
			<img src="../img/admin/pt.png"/>			
			<textarea name="shortpt" rows="10" ><? if(isset($id)){ echo $row[shortpt];}?></textarea>
			
			<img src="../img/admin/de.png"/>			
			<textarea name="shortde" rows="10" ><? if(isset($id)){ echo $row[shortde];}?></textarea>
			
			<img src="../img/admin/nl.png"/>			
			<textarea name="shortnl" rows="10" ><? if(isset($id)){ echo $row[shortnl];}?></textarea>
			
			<img src="../img/admin/ar.png"/>			
			<textarea name="shortar" rows="10" ><? if(isset($id)){ echo $row[shortar];}?></textarea>
			
			<img src="../img/admin/ru.png"/>			
			<textarea name="shortru" rows="10" ><? if(isset($id)){ echo $row[shortru];}?></textarea>
			
			<img src="../img/admin/ja.png"/>			
			<textarea name="shortja" rows="10" ><? if(isset($id)){ echo $row[shortja];}?></textarea>
						
			<img src="../img/admin/zh.png"/>
			<textarea name="shortzh"  rows="10" ><? if(isset($id)){ echo $row[shortzh];}?></textarea>
	

		
		<h1>Descripción</h1>
		
		
			<img src="../img/admin/ca.png"/>
			<textarea name="desca"  rows="10" ><? if(isset($id)){ echo $row[desca];}?></textarea>
						
			<img src="../img/admin/es.png"/>
			<textarea name="deses"  rows="10" ><? if(isset($id)){ echo $row[deses];}?></textarea>
		
			<img src="../img/admin/en.png"/>			
			<textarea name="desen" rows="10" ><? if(isset($id)){ echo $row[desen];}?></textarea>
			
			<img src="../img/admin/fr.png"/>			
			<textarea name="desfr" rows="10" ><? if(isset($id)){ echo $row[desfr];}?></textarea>
			
			<img src="../img/admin/it.png"/>			
			<textarea name="desit" rows="10" ><? if(isset($id)){ echo $row[desit];}?></textarea>
			
			<img src="../img/admin/pt.png"/>			
			<textarea name="despt" rows="10" ><? if(isset($id)){ echo $row[despt];}?></textarea>
			
			<img src="../img/admin/de.png"/>			
			<textarea name="desde" rows="10" ><? if(isset($id)){ echo $row[desde];}?></textarea>
			
			<img src="../img/admin/nl.png"/>			
			<textarea name="desnl" rows="10" ><? if(isset($id)){ echo $row[desnl];}?></textarea>
			
			<img src="../img/admin/ar.png"/>			
			<textarea name="desar" rows="10" ><? if(isset($id)){ echo $row[desar];}?></textarea>
			
			<img src="../img/admin/ru.png"/>			
			<textarea name="desru" rows="10" ><? if(isset($id)){ echo $row[desru];}?></textarea>
			
			<img src="../img/admin/ja.png"/>			
			<textarea name="desja" rows="10" ><? if(isset($id)){ echo $row[desja];}?></textarea>
						
			<img src="../img/admin/zh.png"/>
			<textarea name="deszh"  rows="10" ><? if(isset($id)){ echo $row[deszh];}?></textarea>


<input type="submit" value="<? if(isset($id)){ echo 'Guardar';} else {echo 'Publicar';}?>" name="<? if(isset($id)){ echo 'reenviar';} else {echo 'enviar';}?>"/>


</form>

<? } ?>

</div><!--tanca sixteen-->
</div><!--tanca container-->
</div><!--tanca bandadmin-->


<? include('footer.php');?>