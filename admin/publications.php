<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
?>



<div class="bandpublications">
	<div class="container">
	
		<div class="sixteen columns">
			<a class="submit" href="publications_publicar.php">Subir nueva publicación</a><br><br>
		</div>
		
		<? $consulta=mysql_query("select publications.id,publications.name,publications.author,publications.pag,publications.media,publications.category,publications.lang,publications.fecha,publicat.tites as nomcategoria from publications inner join publicat on publications.category=publicat.id order by fecha asc",$cxn);
		while($row=mysql_fetch_array($consulta)){ 
			
					$titolcategoria=$row[nomcategoria];
		
		if($idioma=="ca"){ $lang=$word['ca'][$idioma];} else if($idioma=="es"){ $lang=$word['es'][$idioma];} else if($idioma=="en"){ $lang=$word['en'][$idioma];} else if($idioma=="fr"){ $lang=$word['fr'][$idioma];}
			
			
		?>
				

			<div class="sixteen columns entry">		
				<article>			
					<h4><a href=""><?=$row[name]?></a></h4>
					<p class="written">Escrit per <?=$row[author]?></p>
					<p><?=$row[media]?>, <?=$row[pag]?> <?=$row[lang]?> <?=$row[fecha]?></p>
					<a class="topic" href=""><?=$titolcategoria?></a>
					<a href="publications_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>
				<a href="publications_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a><br>
				
				
				<? $pdfs=mysql_query("select * from media where idpubli='$row[id]'",$cxn);
				while($raw=mysql_fetch_array($pdfs)){?>
					
					<a style="color: orange;" href="/pdf/<?=$raw[tit]?>-<?=$raw[id]?>.pdf"><?=$raw[tit]?>-<?=$raw[id]?>.pdf</a><a href="pdf_publicar.php?id=<?=$raw[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a><br>
				<? }?>
				
				<a href="pdf_publicar.php?id=<?=$row[id]?>">adjuntar PDF</a>
				
					
				</article>
			</div>
			
			
		<? } ?>


		<a class="submit" href="publications_publicar.php">Incorporar publicación</a>
		

	</div><!--tanca container-->
</div><!-- tanca bandcontent-admin-->