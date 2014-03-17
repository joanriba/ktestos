<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
?>

<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">
			<!--imprimim el títol segons la categoria-->
			<h1>Productos</h1>
			
		</div>
		
		
		<? $products=mysql_query("select products.id, products.nameurl,products.cat1,products.cat2,products.cat3,products.cat4,products.cat5, products.one, products.five, products.twenty, products.025,products.desca,products.deses,products.desen,products.desfr,products.titca, products.tites,products.titen,products.titfr, prodvars.titca as catca, prodvars.tites as cates,prodvars.titen as caten,prodvars.titfr as catfr, products.name from products inner join prodvars on products.idfam=prodvars.id",$cxn);
			while($row=mysql_fetch_array($products)){
			$id=$row[id]; ?>	
		
			<div class="one-third column entry align-image" style="text-align: center; height: 200px;">
			

				
				<img src="/img/prod/<?=$row[nameurl]?><? if($row[one]=="yes"){ echo '-1liter-duo';} else if($row[five]=="yes"){echo '-5liters-duo';} else if($row[twenty]=="yes"){ echo '-20liters-duo';}?>.png" class="resize" width="80">
				
				<a href="products_publicar.php?id=<?=$row[id]?>"><?=$row[name]?></a>	
			
			
		</div>

				
		<? } ?>
		
		</div><!--container-->
		
		
		
		
		<div class="container">
			<div class="sixteen columns">
						
	
	<div class="pictures_alone">
	
	<h1>Familias</h1>
	<a name="familias"></a>
	
	<ul>
	
	<? $img=mysql_query("select * from prodvars where type='fam'",$cxn);
	while($row=mysql_fetch_array($img)){ ?>
		
	
		<li style="height: 80px;">
		<?=$row[tites]?><br/>
		<a href="prodfam_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>
		<!--<a href="prodvar_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>-->
		</li>
		
		<? } ?>
		
		<!--<li><a href="prodvar_publicar.php?type=section">Añadir una sección</a></li>-->
		
	</ul>
	</div><!--tanca pictures alone-->		
	
	
	
	
	
		
	
	<div class="pictures_alone">
	
	<h1>Categorias</h1>
	<a name="categorias"></a>
	
	<ul>
	
	<? $img=mysql_query("select * from prodvars where type='cat'",$cxn);
	while($row=mysql_fetch_array($img)){ ?>
		
	
		<li style="height: 80px;">
		<?=$row[tites]?><br/>
		<a href="prodcat_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>
		<!--<a href="prodvar_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>-->
		</li>
		
		<? } ?>
		
		<!--<li><a href="postvar_publicar.php?type=topic">Añadir un topic</a></li>-->
		
	</ul>
	</div><!--tanca pictures alone-->		
					
			</div>
		</div>
		
		

</div><!-- tanca bandcontent-admin-->