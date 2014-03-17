<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
$category=$_GET[category];
?>

<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">
			<!--imprimim el títol segons la categoria-->
			<h1>Entradas del Blog</h1>
			
			<div class="new"><a class="submit" href="news_publicar.php">Crear nuevo post</a><br><br></div>
		</div>
		
		
		<? $events=mysql_query("select * from posts order by fecha desc",$cxn);
			while($row=mysql_fetch_array($events)){
			$datafinal= FechaFormateada_ca(strtotime($row[fecha]));
			$netca=$row[netca];
			$section=$row[section];
			$id=$row[id]; ?>	
		
			<div class="sixteen columns entry">
			<div class="ten columns">

						<p><img src="../img/admin/es.png"/> <?=$row[tites]?></p>
						<p><img src="../img/admin/en.png"/> <?=$row[titen]?></p>
						<p><img src="../img/admin/zh.png"/> <?=$row[titzh]?></p>
			
				<ul class="edition">
					<li><a href="news_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a></li>
					<li><a href="news_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a></li>
					<li>
					
					<? if($row[published]=="yes"){ ?>
			
						<a href="published.php?status=no&table=posts&id=<?=$row[id]?>&page=entries"><img src="/img/admin/eye.png"/></a>
				
					<? } else if($row[published]=="no"){?>
			
						<a href="published.php?status=yes&table=posts&id=<?=$row[id]?>&page=entries"><img src="/img/admin/noeye.png"/></a>
			
					<? }?>
								
					</li>
					<li><?=$datafinal?><br/> <!--Categoria: <em><?=$row[category]?></em>--></li>	
					</ul>			
			</div>	
			
			<div class="four columns">
			
			
			<ul class="pictures">
				
						<? $fotos=mysql_query("select * from media where idpubli='$id' and type='img'",$cxn);
						while($row=mysql_fetch_array($fotos)){ ?>
						
						<li>
							<img src="../fotos/<?=$row[tites]?>-thu-<?=$row[id]?>.jpg" width="40"/>
							<a href="foto_publicar.php?id=<?=$row[id]?>&nborrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>
						</li>						
						
						<? } ?>
						
						<li><a href="foto_publicar.php?id_publi=<?=$id?>">+</a></li>
			</ul>
			
				
		</div>
		</div>

				
		<? } ?>
		
		
		<div class="sixteen columns">
			<div class="new"><a class="submit" href="news_publicar.php">Crear nuevo post</a></div>
		</div>
		
	
		</div><!--container-->
		
		
		
		
		<div class="container">
			<div class="sixteen columns">
						
	
	<div class="pictures_alone">
	
	<h1>Secciones</h1>
	
	<ul>
	
	<? $img=mysql_query("select * from postvars where type='section'",$cxn);
	while($row=mysql_fetch_array($img)){ ?>
		
	
		<li>
		<?=$row[tites]?><br/>
		<a href="postvar_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>
		<a href="postvar_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>
		</li>
		
		<? } ?>
		
		<li><a href="postvar_publicar.php?type=section">Añadir una sección</a></li>
		
	</ul>
	</div><!--tanca pictures alone-->		
	
	
	
	
	
		
	
	<div class="pictures_alone">
	
	<h1>Topics</h1>
	
	<ul>
	
	<? $img=mysql_query("select * from postvars where type='topic'",$cxn);
	while($row=mysql_fetch_array($img)){ ?>
		
	
		<li>
		<?=$row[tites]?><br/>
		<a href="postvar_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>
		<a href="postvar_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>
		</li>
		
		<? } ?>
		
		<li><a href="postvar_publicar.php?type=topic">Añadir un topic</a></li>
		
	</ul>
	</div><!--tanca pictures alone-->		
					
			</div>
		</div>
		
		

</div><!-- tanca bandcontent-admin-->