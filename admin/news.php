<?php include('../bdcon.php');?>
<?php include('security.php');?>
<?php include('menu.php');?>


<div id="wrapp">
<div id="page">
		<div class="main">
		
		<h1>Notícies (de més recent a més antiga)</h1>
		
		<? $events=mysql_query("select * from posts order by fecha desc",$cxn);
			while($row=mysql_fetch_array($events)){
			$datafinal= FechaFormateada_ca(strtotime($row[fecha]));
			$netca=$row[netca];
			$section=$row[section];
			$id=$row[id];
		?>	
		

			<div class="cosa">			
					<a href="news_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>
					<a href="news_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>		
					
					<ul>
						<li><img src="../img/admin/ca.png"/><br/><strong><?=$row[titca]?></strong><br/><?=$row[desca]?></li>
						<li><img src="../img/admin/es.png"/><br/><strong><?=$row[tites]?></strong><br/><?=$row[deses]?></li>
						<li><img src="../img/admin/en.png"/><br/><strong><?=$row[titen]?></strong><br/><?=$row[desen]?></li>
						<li><img src="../img/admin/fr.png"/><br/><strong><?=$row[titfr]?></strong><br/><?=$row[desfr]?></li>
					</ul>
					
					<p><?=$datafinal?><br/> <!--Categoria: <em><?=$row[category]?></em>--></p>
			
			
			<ul class="pictures">
			
						
						<? $fotos=mysql_query("select * from media where id_new='$id'",$cxn);
						while($row=mysql_fetch_array($fotos)){ ?>
						
						<li>
							<img src="../fotos/<?=$row[titca]?>-thu-<?=$row[id]?>.jpg" width="70"/>
							<a href="foto_publicar.php?id=<?=$row[id]?>&nborrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>
						</li>						
						
						<? } ?>
						
						<li><a href="foto_publicar.php?id_new=<?=$id?>">Insertar foto</a></li>
			</ul>
			</div>
			
		<? } ?>	
			
		<div class="new"><a href="news_publicar.php">Afegir notícia</a></div>
		
		</div>


</div><!--tanca main-->

<? include('sidebar.php');?>
<? include('footer.php');?>