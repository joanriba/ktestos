<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
$category=$_GET[category];
?>


<?
if(isset($_GET[id]) and $_GET[borrar]=="yes"){
$result = mysql_query("delete from comments where id='$_GET[id]'",$cxn);
echo '<script>document.location = "comments.php"</script>';
} ?>



<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">
			<!--imprimim el títol segons la categoria-->
			<h1>Comentarios de la Hoja</h1>
		</div>
		

		
		<? $events=mysql_query("select * from comments order by fecha desc",$cxn);
			while($row=mysql_fetch_array($events)){
			$datafinal= FechaFormateada_ca(strtotime($row[fecha]));
			$id=$row[id];
		?>	
		
			
			<div class="sixteen columns entry">
				<div class="fourteen columns">
			

						<p><?=$row[comment]?></p>
			
				<ul class="edition">
					<!--<li><a href="news_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a></li>-->
					<li><a href="comments.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a></li>
					
					
					<li><?=$datafinal?><br/> <!--Categoria: <em><?=$row[category]?></em>--></li>	
				</ul>	
				
				</div>	
			</div>

				
		<? } ?>
		
	
		
	
		</div><!--container-->
</div><!-- tanca bandcontent-admin-->