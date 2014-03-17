<?php 
ini_set( "memory_limit", "600M" );

include('../bdcon.php');
include('security.php');
include('menu.php');
?>

<script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas2",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,link,unlink,cleanup,code,preview",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

<?  $id=$_GET[id];

//PUBLICAR
if (isset ($_POST[enviar])) {
mysql_query("INSERT INTO products( idfam,idcat,name,025,one,five,twenty,box,titca,tites,titen,titfr,titit,titpt,titde,titnl,titar,titru,titja,titzh,desca,deses,desen,desfr,desit,despt,desde,desnl,desar,desru,desja,deszh,rangca,ranges,rangen,rangfr,rangit,rangpt,rangde,rangnl,rangar,rangru,rangja,rangzh,compca,compes,compen,compfr,compit,comppt,compde,compnl,compar,compru,compja,compzh,aplica,aplies,aplien,aplifr,apliit,aplipt,aplide,aplinl,apliar,apliru,aplija,aplizh,dosageca,dosagees,dosageen,dosagefr,dosageit,dosagept,dosagede,dosagenl,dosagear,dosageru,dosageja,dosagezh,storageca,storagees,storageen,storagefr,storageit,storagept,storagede,storagenl,storagear,storageru,storageja,storagezh,compatca,compates,compaten,compatfr,compatit,compatpt,compatde,compatnl,compatar,compatru,compatja,compatzh,cat1,cat2,cat3,cat4,cat5) VALUES (
'$_POST[id]',
'$_POST[idfam]',
'$_POST[idcat]',
'$_POST[name]',
'$_POST[025]',
'$_POST[one]',
'$_POST[five]',
'$_POST[twenty]',
'$_POST[box]',
'$_POST[titca]',
'$_POST[tites]',
'$_POST[titen]',
'$_POST[titfr]',
'$_POST[titit]',
'$_POST[titpt]',
'$_POST[titde]',
'$_POST[titnl]',
'$_POST[titar]',
'$_POST[titru]',
'$_POST[titja]',
'$_POST[titzh]',
'$_POST[desca]',
'$_POST[deses]',
'$_POST[desen]',
'$_POST[desfr]',
'$_POST[desit]',
'$_POST[despt]',
'$_POST[desde]',
'$_POST[desnl]',
'$_POST[desar]',
'$_POST[desru]',
'$_POST[desja]',
'$_POST[deszh]',
'$_POST[rangca]',
'$_POST[ranges]',
'$_POST[rangen]',
'$_POST[rangfr]',
'$_POST[rangit]',
'$_POST[rangpt]',
'$_POST[rangde]',
'$_POST[rangnl]',
'$_POST[rangar]',
'$_POST[rangru]',
'$_POST[rangja]',
'$_POST[rangzh]',
'$_POST[compca]',
'$_POST[compes]',
'$_POST[compen]',
'$_POST[compfr]',
'$_POST[compit]',
'$_POST[comppt]',
'$_POST[compde]',
'$_POST[compnl]',
'$_POST[compar]',
'$_POST[compru]',
'$_POST[compja]',
'$_POST[compzh]',
'$_POST[aplica]',
'$_POST[aplies]',
'$_POST[aplien]',
'$_POST[aplifr]',
'$_POST[apliit]',
'$_POST[aplipt]',
'$_POST[aplide]',
'$_POST[aplinl]',
'$_POST[apliar]',
'$_POST[apliru]',
'$_POST[aplija]',
'$_POST[aplizh]',
'$_POST[dosageca]',
'$_POST[dosagees]',
'$_POST[dosageen]',
'$_POST[dosagefr]',
'$_POST[dosageit]',
'$_POST[dosagept]',
'$_POST[dosagede]',
'$_POST[dosagenl]',
'$_POST[dosagear]',
'$_POST[dosageru]',
'$_POST[dosageja]',
'$_POST[dosagezh]',
'$_POST[storageca]',
'$_POST[storagees]',
'$_POST[storageen]',
'$_POST[storagefr]',
'$_POST[storageit]',
'$_POST[storagept]',
'$_POST[storagede]',
'$_POST[storagenl]',
'$_POST[storagear]',
'$_POST[storageru]',
'$_POST[storageja]',
'$_POST[storagezh]',
'$_POST[compatca]',
'$_POST[compates]',
'$_POST[compaten]',
'$_POST[compatfr]',
'$_POST[compatit]',
'$_POST[compatpt]',
'$_POST[compatde]',
'$_POST[compatnl]',
'$_POST[compatar]',
'$_POST[compatru]',
'$_POST[compatja]',
'$_POST[compatzh]',
'$_POST[cat1]',
'$_POST[cat2]',
'$_POST[cat3]',
'$_POST[cat4]',
'$_POST[cat5]')",$cxn);

echo '<script>document.location = "products.php"</script>'; 
} ?>


<? //name='$_POST[name]', 025='$_POST[025]',one='$_POST[one]',five='$_POST[five]',twenty='$_POST[twenty]',box='$_POST[box]', ?>

<? 
//EDITAR
if (isset($_POST[reenviar])) {

$result = mysql_query("update products set 
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
deszh='$_POST[deszh]',
rangca='$_POST[rangca]',
ranges='$_POST[ranges]',
rangen='$_POST[rangen]',
rangfr='$_POST[rangfr]',
rangit='$_POST[rangit]',
rangpt='$_POST[rangpt]',
rangde='$_POST[rangde]',
rangnl='$_POST[rangnl]',
rangar='$_POST[rangar]',
rangru='$_POST[rangru]',
rangja='$_POST[rangja]',
rangzh='$_POST[rangzh]',
compca='$_POST[compca]',
compes='$_POST[compes]',
compen='$_POST[compen]',
compfr='$_POST[compfr]',
compit='$_POST[compit]',
comppt='$_POST[comppt]',
compde='$_POST[compde]',
compnl='$_POST[compnl]',
compar='$_POST[compar]',
compru='$_POST[compru]',
compja='$_POST[compja]',
compzh='$_POST[compzh]',
aplica='$_POST[aplica]',
aplies='$_POST[aplies]',
aplien='$_POST[aplien]',
aplifr='$_POST[aplifr]',
apliit='$_POST[apliit]',
aplipt='$_POST[aplipt]',
aplide='$_POST[aplide]',
aplinl='$_POST[aplinl]',
apliar='$_POST[apliar]',
apliru='$_POST[apliru]',
aplija='$_POST[aplija]',
aplizh='$_POST[aplizh]',
dosageca='$_POST[dosageca]',
dosagees='$_POST[dosagees]',
dosageen='$_POST[dosageen]',
dosagefr='$_POST[dosagefr]',
dosageit='$_POST[dosageit]',
dosagept='$_POST[dosagept]',
dosagede='$_POST[dosagede]',
dosagenl='$_POST[dosagenl]',
dosagear='$_POST[dosagear]',
dosageru='$_POST[dosageru]',
dosageja='$_POST[dosageja]',
dosagezh='$_POST[dosagezh]',
storageca='$_POST[storageca]',
storagees='$_POST[storagees]',
storageen='$_POST[storageen]',
storagefr='$_POST[storagefr]',
storageit='$_POST[storageit]',
storagept='$_POST[storagept]',
storagede='$_POST[storagede]',
storagenl='$_POST[storagenl]',
storagear='$_POST[storagear]',
storageru='$_POST[storageru]',
storageja='$_POST[storageja]',
storagezh='$_POST[storagezh]',
compatca='$_POST[compatca]',
compates='$_POST[compates]',
compaten='$_POST[compaten]',
compatfr='$_POST[compatfr]',
compatit='$_POST[compatit]',
compatpt='$_POST[compatpt]',
compatde='$_POST[compatde]',
compatnl='$_POST[compatnl]',
compatar='$_POST[compatar]',
compatru='$_POST[compatru]',
compatja='$_POST[compatja]',
compatzh='$_POST[compatzh]',
cat1='$_POST[cat1]',
cat2='$_POST[cat2]',
cat3='$_POST[cat3]',
cat4='$_POST[cat4]',
cat5='$_POST[cat5]'
where id='$_POST[id]'", $cxn);

//tornem enrere
echo '<script>document.location = "products.php"</script>';
} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from products where id=$id",$cxn);
while($row=mysql_fetch_array($consulta)){

?>    

<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">
			<!--variem el títol segons si estem publicant o editant-->
			<h1><? if(isset($id)) {echo'Editar '.$row[name];} else {echo 'Afegir producte';}?></h1>
			
			<ul class="jumpmenu">
				<li><a href="#titulo">título</a></li>
				<li><a href="#descripcion">descripción</a></li>
				<li><a href="#rango">rango</a></li>
				<li><a href="#composicion">composición</a></li>
				<li><a href="#aplicacion">aplicación</a></li>
				<li><a href="#dosificacion">dosificación</a></li>
				<li><a href="#almacenamiento">almacenamiento</a></li>
				<li><a href="#compatibilidad">compatibilidad</a></li>
				<li><a href="#categorias">categorias</a></li>
				
			
		</div>
		
		  	      	   
		<form method="post" action="?" enctype="multipart/form-data">
		<!-- la id en el cas de que estiguem editant-->
		<input type="hidden" name="id" value="<?=$row[id]?>">

		
		<div class="sixteen columns">
		
		<!--======================== TÍTOL==============================-->
		<!--============================================================-->
		
		<a name="titulo"></a>
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
			
		</div>
		
		
		
		<div class="sixteen columns">
		
		<a name="descripcion"></a>
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
		
			
			<a name="rango"></a>
			<h1>Rango</h1>
			
		
			<img src="../img/admin/ca.png"/>
			<input type="text" name="rangca"  value="<? if(isset($id)){ echo $row[rangca];}?>">
						
			<img src="../img/admin/es.png"/>
			<input type="text" name="ranges"  value="<? if(isset($id)){ echo $row[ranges];}?>">
		
			<img src="../img/admin/en.png"/>			
			<input type="text" name="rangen" value="<? if(isset($id)){ echo $row[rangen];}?>">
			
			<img src="../img/admin/fr.png"/>			
			<input type="text" name="rangfr" value="<? if(isset($id)){ echo $row[rangfr];}?>">
			
			<img src="../img/admin/it.png"/>			
			<input type="text" name="rangit" value="<? if(isset($id)){ echo $row[rangit];}?>">
			
			<img src="../img/admin/pt.png"/>			
			<input type="text" name="rangpt" value="<? if(isset($id)){ echo $row[rangpt];}?>">
			
			<img src="../img/admin/de.png"/>			
			<input type="text" name="rangde" value="<? if(isset($id)){ echo $row[rangde];}?>">
			
			<img src="../img/admin/nl.png"/>			
			<input type="text" name="rangnl" value="<? if(isset($id)){ echo $row[rangnl];}?>">
			
			<img src="../img/admin/ar.png"/>			
			<input type="text" name="rangar" value="<? if(isset($id)){ echo $row[rangar];}?>">
			
			<img src="../img/admin/ru.png"/>			
			<input type="text" name="rangru" value="<? if(isset($id)){ echo $row[rangru];}?>">
			
			<img src="../img/admin/ja.png"/>			
			<input type="text" name="rangja" value="<? if(isset($id)){ echo $row[rangja];}?>">
						
			<img src="../img/admin/zh.png"/>
			<input type="text" name="rangzh"  value="<? if(isset($id)){ echo $row[rangzh];}?>">
		
			
			<a name="composicion"></a>
			<h1>Composición</h1>
			
		
			<img src="../img/admin/ca.png"/>
			<textarea name="compca"  rows="3" ><? if(isset($id)){ echo $row[compca];}?></textarea>
						
			<img src="../img/admin/es.png"/>
			<textarea name="compes"  rows="3" ><? if(isset($id)){ echo $row[compes];}?></textarea>
		
			<img src="../img/admin/en.png"/>			
			<textarea name="compen" rows="3" ><? if(isset($id)){ echo $row[compen];}?></textarea>
			
			<img src="../img/admin/fr.png"/>			
			<textarea name="compfr" rows="3" ><? if(isset($id)){ echo $row[compfr];}?></textarea>
			
			<img src="../img/admin/it.png"/>			
			<textarea name="compit" rows="3" ><? if(isset($id)){ echo $row[compit];}?></textarea>
			
			<img src="../img/admin/pt.png"/>			
			<textarea name="comppt" rows="3" ><? if(isset($id)){ echo $row[comppt];}?></textarea>
			
			<img src="../img/admin/de.png"/>			
			<textarea name="compde" rows="3" ><? if(isset($id)){ echo $row[compde];}?></textarea>
			
			<img src="../img/admin/nl.png"/>			
			<textarea name="compnl" rows="3" ><? if(isset($id)){ echo $row[compnl];}?></textarea>
			
			<img src="../img/admin/ar.png"/>			
			<textarea name="compar" rows="3" ><? if(isset($id)){ echo $row[compar];}?></textarea>
			
			<img src="../img/admin/ru.png"/>			
			<textarea name="compru" rows="3" ><? if(isset($id)){ echo $row[compru];}?></textarea>
			
			<img src="../img/admin/ja.png"/>			
			<textarea name="compja" rows="3" ><? if(isset($id)){ echo $row[compja];}?></textarea>
						
			<img src="../img/admin/zh.png"/>
			<textarea name="compzh"  rows="3" ><? if(isset($id)){ echo $row[compzh];}?></textarea>
			
			
			<a name="aplicacion"></a>
			<h1>Aplicación</h1>
			
		
			<img src="../img/admin/ca.png"/>
			<textarea name="aplica"  rows="3" ><? if(isset($id)){ echo $row[aplica];}?></textarea>
						
			<img src="../img/admin/es.png"/>
			<textarea name="aplies"  rows="3" ><? if(isset($id)){ echo $row[aplies];}?></textarea>
		
			<img src="../img/admin/en.png"/>			
			<textarea name="aplien" rows="3" ><? if(isset($id)){ echo $row[aplien];}?></textarea>
			
			<img src="../img/admin/fr.png"/>			
			<textarea name="aplifr" rows="3" ><? if(isset($id)){ echo $row[aplifr];}?></textarea>
			
			<img src="../img/admin/it.png"/>			
			<textarea name="apliit" rows="3" ><? if(isset($id)){ echo $row[apliit];}?></textarea>
			
			<img src="../img/admin/pt.png"/>			
			<textarea name="aplipt" rows="3" ><? if(isset($id)){ echo $row[aplipt];}?></textarea>
			
			<img src="../img/admin/de.png"/>			
			<textarea name="aplide" rows="3" ><? if(isset($id)){ echo $row[aplide];}?></textarea>
			
			<img src="../img/admin/nl.png"/>			
			<textarea name="aplinl" rows="3" ><? if(isset($id)){ echo $row[aplinl];}?></textarea>
			
			<img src="../img/admin/ar.png"/>			
			<textarea name="apliar" rows="3" ><? if(isset($id)){ echo $row[apliar];}?></textarea>
			
			<img src="../img/admin/ru.png"/>			
			<textarea name="apliru" rows="3" ><? if(isset($id)){ echo $row[apliru];}?></textarea>
			
			<img src="../img/admin/ja.png"/>			
			<textarea name="aplija" rows="3" ><? if(isset($id)){ echo $row[aplija];}?></textarea>
						
			<img src="../img/admin/zh.png"/>
			<textarea name="aplizh"  rows="3" ><? if(isset($id)){ echo $row[aplizh];}?></textarea>
			
			
			
			<a name="dosificacion"></a>
			<h1>Dosificación</h1>
			
			
		
			<img src="../img/admin/ca.png"/>
			<textarea name="dosageca"  rows="10" ><? if(isset($id)){ echo $row[dosageca];}?></textarea>
						
			<img src="../img/admin/es.png"/>
			<textarea name="dosagees"  rows="10" ><? if(isset($id)){ echo $row[dosagees];}?></textarea>
		
			<img src="../img/admin/en.png"/>			
			<textarea name="dosageen" rows="10" ><? if(isset($id)){ echo $row[dosageen];}?></textarea>
			
			<img src="../img/admin/fr.png"/>			
			<textarea name="dosagefr" rows="10" ><? if(isset($id)){ echo $row[dosagefr];}?></textarea>
			
			<img src="../img/admin/it.png"/>			
			<textarea name="dosageit" rows="10" ><? if(isset($id)){ echo $row[dosageit];}?></textarea>
			
			<img src="../img/admin/pt.png"/>			
			<textarea name="dosagept" rows="10" ><? if(isset($id)){ echo $row[dosagept];}?></textarea>
			
			<img src="../img/admin/de.png"/>			
			<textarea name="dosagede" rows="10" ><? if(isset($id)){ echo $row[dosagede];}?></textarea>
			
			<img src="../img/admin/nl.png"/>			
			<textarea name="dosagenl" rows="10" ><? if(isset($id)){ echo $row[dosagenl];}?></textarea>
			
			<img src="../img/admin/ar.png"/>			
			<textarea name="dosagear" rows="10" ><? if(isset($id)){ echo $row[dosagear];}?></textarea>
			
			<img src="../img/admin/ru.png"/>			
			<textarea name="dosageru" rows="10" ><? if(isset($id)){ echo $row[dosageru];}?></textarea>
			
			<img src="../img/admin/ja.png"/>			
			<textarea name="dosageja" rows="10" ><? if(isset($id)){ echo $row[dosageja];}?></textarea>
						
			<img src="../img/admin/zh.png"/>
			<textarea name="dosagezh"  rows="10" ><? if(isset($id)){ echo $row[dosagezh];}?></textarea>
			
			
			
			<a name="almacenamiento"></a>
			<h1>Almacenamiento</h1>
			
			
			
		
			<img src="../img/admin/ca.png"/>
			<textarea name="storageca"  rows="3" ><? if(isset($id)){ echo $row[storageca];}?></textarea>
						
			<img src="../img/admin/es.png"/>
			<textarea name="storagees"  rows="3" ><? if(isset($id)){ echo $row[storagees];}?></textarea>
		
			<img src="../img/admin/en.png"/>			
			<textarea name="storageen" rows="3" ><? if(isset($id)){ echo $row[storageen];}?></textarea>
			
			<img src="../img/admin/fr.png"/>			
			<textarea name="storagefr" rows="3" ><? if(isset($id)){ echo $row[storagefr];}?></textarea>
			
			<img src="../img/admin/it.png"/>			
			<textarea name="storageit" rows="3" ><? if(isset($id)){ echo $row[storageit];}?></textarea>
			
			<img src="../img/admin/pt.png"/>			
			<textarea name="storagept" rows="3" ><? if(isset($id)){ echo $row[storagept];}?></textarea>
			
			<img src="../img/admin/de.png"/>			
			<textarea name="storagede" rows="3" ><? if(isset($id)){ echo $row[storagede];}?></textarea>
			
			<img src="../img/admin/nl.png"/>			
			<textarea name="storagenl" rows="3" ><? if(isset($id)){ echo $row[storagenl];}?></textarea>
			
			<img src="../img/admin/ar.png"/>			
			<textarea name="storagear" rows="3" ><? if(isset($id)){ echo $row[storagear];}?></textarea>
			
			<img src="../img/admin/ru.png"/>			
			<textarea name="storageru" rows="3" ><? if(isset($id)){ echo $row[storageru];}?></textarea>
			
			<img src="../img/admin/ja.png"/>			
			<textarea name="storageja" rows="3" ><? if(isset($id)){ echo $row[storageja];}?></textarea>
						
			<img src="../img/admin/zh.png"/>
			<textarea name="storagezh"  rows="3" ><? if(isset($id)){ echo $row[storagezh];}?></textarea>
			
			
			<a name="compatibilidad">
			<h1>Compatibilidad</h1>
			
		
		
			<img src="../img/admin/ca.png"/>
			<textarea name="compatca"  rows="3" ><? if(isset($id)){ echo $row[compatca];}?></textarea>
						
			<img src="../img/admin/es.png"/>
			<textarea name="compates"  rows="3" ><? if(isset($id)){ echo $row[compates];}?></textarea>
		
			<img src="../img/admin/en.png"/>			
			<textarea name="compaten" rows="3" ><? if(isset($id)){ echo $row[compaten];}?></textarea>
			
			<img src="../img/admin/fr.png"/>			
			<textarea name="compatfr" rows="3" ><? if(isset($id)){ echo $row[compatfr];}?></textarea>
			
			<img src="../img/admin/it.png"/>			
			<textarea name="compatit" rows="3" ><? if(isset($id)){ echo $row[compatit];}?></textarea>
			
			<img src="../img/admin/pt.png"/>			
			<textarea name="compatpt" rows="3" ><? if(isset($id)){ echo $row[compatpt];}?></textarea>
			
			<img src="../img/admin/de.png"/>			
			<textarea name="compatde" rows="3" ><? if(isset($id)){ echo $row[compatde];}?></textarea>
			
			<img src="../img/admin/nl.png"/>			
			<textarea name="compatnl" rows="3" ><? if(isset($id)){ echo $row[compatnl];}?></textarea>
			
			<img src="../img/admin/ar.png"/>			
			<textarea name="compatar" rows="3" ><? if(isset($id)){ echo $row[compatar];}?></textarea>
			
			<img src="../img/admin/ru.png"/>			
			<textarea name="compatru" rows="3" ><? if(isset($id)){ echo $row[compatru];}?></textarea>
			
			<img src="../img/admin/ja.png"/>			
			<textarea name="compatja" rows="3" ><? if(isset($id)){ echo $row[compatja];}?></textarea>
						
			<img src="../img/admin/zh.png"/>
			<textarea name="compatzh"  rows="3" ><? if(isset($id)){ echo $row[compatzh];}?></textarea>
			
			
		<a name="categorias"></a>
		<h1>Categorias</h1>			
			
		<!--cat 1-->
		<select name="cat1">
		
		<? //fem la consulta a la taula
		$consulta11=mysql_query("select * from prodcat where id='$row[cat1]'",$cxn);
		$consulta12=mysql_query("select * from prodcat",$cxn);?>

		<? if(isset($id)){?>
		
		<? while($raw=mysql_fetch_array($consulta11)){ $snomcat1=$raw[tites]; $scat1=$raw[id]; }?>
		<option value="<?=$scat1?>">Categoria 1: <?=$snomcat1?></option>
		<option value="NULL">Ninguna</option>


		<? while($raw=mysql_fetch_array($consulta12)){ ?>
			<option value="<?=$raw[id]?>"><?=$raw[tites]?></option>
		<? }?>
		
		<? } else {
		
		while($raw=mysql_fetch_array($consulta12)){?>
			<option value="<?=$raw[id]?>"><?=$raw[tites]?></option>
		<? }} ?>	
		</select>
		
		<!--cat 2-->
		<select name="cat2">
		
		<? //fem la consulta a la taula
		$consulta21=mysql_query("select * from prodcat where id='$row[cat2]'",$cxn);
		$consulta22=mysql_query("select * from prodcat",$cxn);?>

		<? if(isset($id)){?>
		
		<? while($raw=mysql_fetch_array($consulta21)){ $snomcat2=$raw[tites]; $scat2=$raw[id]; }?>
		<option value="<?=$scat2?>">Categoria 2: <?=$snomcat2?></option>
		<option value="NULL">Ninguna</option>


		<? while($raw=mysql_fetch_array($consulta22)){ ?>
			<option value="<?=$raw[id]?>"><?=$raw[tites]?></option>
		<? }?>
		
		<? } else {
		
		while($raw=mysql_fetch_array($consulta22)){?>
			<option value="<?=$raw[id]?>"><?=$raw[tites]?></option>
		<? }} ?>	
		</select>
		
		<!--cat 3-->
		<select name="cat3">
		
		<? //fem la consulta a la taula
		$consulta31=mysql_query("select * from prodcat where id='$row[cat3]'",$cxn);
		$consulta33=mysql_query("select * from prodcat",$cxn);?>

		<? if(isset($id)){?>
		
		<? while($raw=mysql_fetch_array($consulta31)){ $snomcat3=$raw[tites]; $scat3=$raw[id]; }?>
		<option value="<?=$scat3?>">Categoria 3: <?=$snomcat3?></option>
		<option value="NULL">Ninguna</option>


		<? while($raw=mysql_fetch_array($consulta33)){ ?>
			<option value="<?=$raw[id]?>"><?=$raw[tites]?></option>
		<? }?>
		
		<? } else {
		
		while($raw=mysql_fetch_array($consulta33)){?>
			<option value="<?=$raw[id]?>"><?=$raw[tites]?></option>
		<? }} ?>	
		</select>	
		
		<!--cat 4-->
		<select name="cat4">
		
		<? //fem la consulta a la taula
		$consulta41=mysql_query("select * from prodcat where id='$row[cat4]'",$cxn);
		$consulta44=mysql_query("select * from prodcat",$cxn);?>

		<? if(isset($id)){?>
		
		<? while($raw=mysql_fetch_array($consulta41)){ $snomcat4=$raw[tites]; $scat4=$raw[id]; }?>
		<option value="<?=$scat4?>">Categoria 4: <?=$snomcat4?></option>
		<option value="NULL">Ninguna</option>


		<? while($raw=mysql_fetch_array($consulta44)){ ?>
			<option value="<?=$raw[id]?>"><?=$raw[tites]?></option>
		<? }?>
		
		<? } else {
		
		while($raw=mysql_fetch_array($consulta44)){?>
			<option value="<?=$raw[id]?>"><?=$raw[tites]?></option>
		<? }} ?>	
		</select>
				
		<!--cat 5-->
		<select name="cat5">
		
		<? //fem la consulta a la taula
		$consulta51=mysql_query("select * from prodcat where id='$row[cat5]'",$cxn);
		$consulta55=mysql_query("select * from prodcat",$cxn);?>

		<? if(isset($id)){?>
		
		<? while($raw=mysql_fetch_array($consulta51)){ $snomcat5=$raw[tites]; $scat5=$raw[id]; }?>
		<option value="<?=$scat5?>">Categoria 5: <?=$snomcat5?></option>
		<option value="NULL">Ninguna</option>


		<? while($raw=mysql_fetch_array($consulta55)){ ?>
			<option value="<?=$raw[id]?>"><?=$raw[tites]?></option>
		<? }?>
		
		<? } else {
		
		while($raw=mysql_fetch_array($consulta55)){?>
			<option value="<?=$raw[id]?>"><?=$raw[tites]?></option>
		<? }} ?>	
		</select>
			
			
		
		</div><!--end sixteen-->
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

<? } ?>

<? include('footer.php');?>
