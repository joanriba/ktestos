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
		mode : "textareas",
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
if (isset ($_POST['enviar'])) {
mysql_query("INSERT INTO posts( tites,titen,titzh,deses,desen,deszh,fecha,published,category1,category2,category3,tag1,tag2,tag3) VALUES('$_POST[tites]','$_POST[titen]','$_POST[titzh]','$_POST[deses]','$_POST[desen]','$_POST[deszh]',NOW(),'$_POST[published]','$_POST[category1]','$_POST[category2]','$_POST[category3]','$_POST[tag1]','$_POST[tag2]','$_POST[tag3]')",$cxn);
echo '<script>document.location = "news.php"</script>'; 
} ?>


<? 
//BORRAR
if($_GET[borrar]=="yes") {
$result = mysql_query("delete from posts where id='$id'",$cxn);
echo '<script>document.location = "entries.php"</script>';
} ?>


<? 
//EDITAR
if (isset($_POST['reenviar'])) {

$result = mysql_query("update posts set 
tites='$_POST[tites]',titen='$_POST[titen]',titzh='$_POST[titzh]',deses='$_POST[deses]',desen='$_POST[desen]',deszh='$_POST[deszh]',category1='$_POST[category1]',category2='$_POST[category2]',category3='$_POST[category3]',tag1='$_POST[tag1]',tag2='$_POST[tag2]',tag3='$_POST[tag3]',published='$_POST[published]',fecha='$_POST[fecha]' where id='$_POST[id]'", $cxn);

//tornem enrere
echo '<script>document.location = "entries.php"</script>';
} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from posts where id=$id",$cxn);
while($row=mysql_fetch_array($consulta)){
$tites=$row[tites];$titen=$row[titen];$titzh=$row[titzh];$deses=$row[deses];$desen=$row[desen];$deszh=$row[deszh]; $category1=$row[category1];$category2=$row[category2];$category3=$row[category3];$tag1=$row[tag1];$tag2=$row[tag2];$tag3=$row[tag3];$published=$row[published];$fecha=$row[fecha];}
?>    

<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">
			<!--variem el títol segons si estem publicant o editant-->
			<h1><? if(isset($id)) {echo'Editar post';} else {echo 'Crear nou post';}?></h1>
		</div>
		
		  	      	   
		<form method="post" action="?" enctype="multipart/form-data">
		<!-- la id en el cas de que estiguem editant-->
		<input type="hidden" name="id" value="<?=$id?>">

		
		<div class="sixteen columns">
			<label for="tites"><img src="../img/admin/es.png"/></label>
			<input type="text" placeholder="Títol" name="tites" value="<? if(isset($id)){ echo $tites;}?>">
			<textarea name="deses"  rows="13" ><? if(isset($id)){ echo $deses;}?></textarea>
		
		
		
			<label for="titen"><img src="../img/admin/en.png"/></label>
			<input type="text" placeholder="Título" name="titen" value="<? if(isset($id)){ echo $titen;}?>">
			<textarea name="desen" rows="13" ><? if(isset($id)){ echo $desen;}?></textarea>
		
		
		
			<label for="titzh"><img src="../img/admin/zh.png"/></label>
			<input type="text" placeholder="Title" name="titzh" value="<? if(isset($id)){ echo $titzh;}?>">
			<textarea name="deszh"  rows="13" ><? if(isset($id)){ echo $deszh;}?></textarea>
		</div>
		
		</div>
		
		<div class="container">
		<div class="eight columns">
				
				
		<!--Categoria 1-->
		<select name="category1">
		
		<? //fem la consulta a la taula
		$consulta=mysql_query("select * from postvars where type='section' and id='$category1'",$cxn);
		$consulta2=mysql_query("select * from postvars where type='section'",$cxn);?>

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
		<select name="category2">
		
		<? //fem la consulta a la taula
		$consulta=mysql_query("select * from postvars where type='section' and id='$category2'",$cxn);
		$consulta2=mysql_query("select * from postvars where type='section'",$cxn);?>

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
		
		

		
		<!--Categoria 3-->
		<select name="category3">
		
		<? //fem la consulta a la taula
		$consulta=mysql_query("select * from postvars where type='section' and id='$category3'",$cxn);
		$consulta2=mysql_query("select * from postvars where type='section'",$cxn);?>

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
		

	</div><!--end eight-->
		
		
		
	<div class="eight columns">
	
		
		<!--Topic 1-->
		<select name="tag1">
		
		<? //fem la consulta a la taula
		$consulta=mysql_query("select * from postvars where type='topic' and id='$tag1'",$cxn);
		$consulta2=mysql_query("select * from postvars where type='topic'",$cxn);?>

		<? if(isset($id)){?>
		
		<? while($row=mysql_fetch_array($consulta)){ $snomtag1=$row[tites]; $stag1=$row[id]; }?>
		<option value="<?=$stag1?>">Actualment: <?=$snomtag1?></option>


		<? while($row=mysql_fetch_array($consulta2)){ ?>
			<option value="<?=$row[id]?>"><?=$row[tites]?></option>
		<? }?>
		
		<? } else {
		
		while($row=mysql_fetch_array($consulta2)){?>
			<option value="<?=$row[id]?>"><?=$row[tites]?></option>
		<? }} ?>	
		</select>
		
		
		
		
		
		<!--Topic 2-->
		<select name="tag2">
		
		<? //fem la consulta a la taula
		$consulta=mysql_query("select * from postvars where type='topic' and id='$tag2'",$cxn);
		$consulta2=mysql_query("select * from postvars where type='topic'",$cxn);?>

		<? if(isset($id)){?>
		
		<? while($row=mysql_fetch_array($consulta)){ $snomtag2=$row[tites]; $stag2=$row[id]; }?>
		<option value="<?=$stag2?>">Actualment: <?=$snomtag2?></option>


		<? while($row=mysql_fetch_array($consulta2)){ ?>
			<option value="<?=$row[id]?>"><?=$row[tites]?></option>
		<? }?>
		
		<? } else {
		
		while($row=mysql_fetch_array($consulta2)){?>
			<option value="<?=$row[id]?>"><?=$row[tites]?></option>
		<? }} ?>	
		</select>
	
			

		<!--Topic 3-->
		<select name="tag3">
		
		<? //fem la consulta a la taula
		$consulta=mysql_query("select * from postvars where type='topic' and id='$tag3'",$cxn);
		$consulta2=mysql_query("select * from postvars where type='topic'",$cxn);?>

		<? if(isset($id)){?>
		
		<? while($row=mysql_fetch_array($consulta)){ $snomtag3=$row[tites]; $stag3=$row[id]; }?>
		<option value="<?=$stag3?>">Actualment: <?=$snomtag3?></option>


		<? while($row=mysql_fetch_array($consulta2)){ ?>
			<option value="<?=$row[id]?>"><?=$row[tites]?></option>
		<? }?>
		
		<? } else {
		
		while($row=mysql_fetch_array($consulta2)){?>
			<option value="<?=$row[id]?>"><?=$row[tites]?></option>
		<? }} ?>	
		</select>
		
		<? if(isset($id)){?><input type="text" placeholder="Fecha" name="fecha" value="<?=$fecha?>"><? } ?>
			
		</div><!--end eight-->
		
		

		
		

		
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
