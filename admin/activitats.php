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
			<h1>Activitats</h1>
			
			<div class="new"><a class="submit2" href="activitat_publicar.php">Crear nova activitat</a><br><br></div>
		</div>
		
		
		<? $events=mysql_query("select activitats.id as idactivitat, activitats.nomes,activitats.nomca,activitats.deses,activitats.desca,activitats.categoria,categories.nomca as nomcategoria from activitats inner join categories on categories.id=activitats.categoria",$cxn);
			while($row=mysql_fetch_array($events)){ $idactivitat=$row[idactivitat];
			?>	
		
			<div class="sixteen columns entry">

					
					<table class="tableactivitats">
						<tr>
						<td><h3><!--<img src="../img/admin/ca.png"/>--> <?=$row[nomca]?></h3></td>
						<td><?=$row[nomcategoria]?></td>
						</tr>
					</table>
						
						<p><?=$row[desca]?></p>
				
			
				<ul class="edition">
					<li><a href="activitat_publicar.php?id=<?=$row[idactivitat]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a></li>
					<li><a href="activitat_publicar.php?id=<?=$row[idactivitat]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a></li>
					<li>
					
					<? if($row[published]=="yes"){ ?>
			
						<a href="published.php?status=no&table=posts&id=<?=$row[id]?>&page=entries"><img src="/img/admin/eye.png"/></a>
				
					<? } else if($row[published]=="no"){?>
			
						<a href="published.php?status=yes&table=posts&id=<?=$row[id]?>&page=entries"><img src="/img/admin/noeye.png"/></a>
			
					<? }?>
								
					</li>
					</ul>
					
<?
//CARREGUEM ELS MÒDULS DE L'ACTIVITAT
$moduls=mysql_query("select moduls.dinici,moduls.dfinal,moduls.edat,moduls.preu,moduls.maximnens, moduls.id as idmodul, activitats.id, activitats.nomca as nomactivitat from moduls inner join activitats on activitats.id=moduls.idactivitat where moduls.idactivitat=$row[idactivitat]",$cxn);
while($row=mysql_fetch_array($moduls)){
//muntem les dates en europeu
$dinici = date('d/m/Y', strtotime($row[dinici]));
$dfinal = date('d/m/Y', strtotime($row[dfinal]));
$avui=date('Y-m-d');
?>
					
					<div class="modul">
					
					
					<!--EDITAR EL MÒDUL-->
					<ul class="moduledit">
					<li><a href="modul_publicar.php?id=<?=$row[idmodul]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a></li>
					<li><a href="modul_publicar.php?id=<?=$row[idmodul]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a></li>
					</ul>
					
					
						<p><?=$row[nomactivitat]?> del <strong><?=$dinici?></strong> al <strong><?=$dfinal?></strong>
						&nbsp;&nbsp;&nbsp;&nbsp;<em>Max.nens: <?=$row[maximnens]?></em> <span class="taronja"><?=$row[preu]?>€</span> 
						
						<? if($avui < $row[dfinal]) {$status='futur';} else if($avui > $row[dfinal]){$status='passat';}?>
						<span class="pastilleta <?=$status?>"><?=$status?></span>
						
						
						
						<?
						$preinscrits=mysql_query("select * from historial where idmodul='$row[idmodul]' and status='preinscrit'",$cxn);
						$inscrits=mysql_query("select * from historial where idmodul='$row[idmodul]' and status='inscrit'",$cxn); 
						$total=mysql_query("select * from historial where idmodul='$row[idmodul]'",$cxn);
						
						$totalnens=mysql_num_rows($total);
						$preinscritsfinal=mysql_num_rows($preinscrits);
						$inscritsfinal=mysql_num_rows($inscrits);
						
						 ?>
						
						<a class="three1" href="historial.php?id=<?=$row[idmodul]?>">Preinscrits: <span><?=$preinscritsfinal?></span></a> &nbsp;&nbsp; 
						<a class="three2" href="historial.php?id=<?=$row[idmodul]?>">Inscrits:  <span><?=$inscritsfinal?></span></a> &nbsp;&nbsp; 
						<a class="three3" href="historial.php?id=<?=$row[idmodul]?>">Totals:  <span><?=$totalnens?></span></a>
						
						</p>
						
						

					
					</div>
					
					<? } ?>
					<div class="modul"><a href="modul_publicar.php?idactivitat=<?=$idactivitat?>">Afegir nou mòdul</a></div>				
			</div>	
			
				
		<? } ?>
		
		
		<div class="sixteen columns">
			<div class="new"><a class="submit2" href="activitat_publicar.php">Crear nova activitat</a></div>
		</div>
		
	
		</div><!--container-->
		
		
		
		
		<div class="container">
			<div class="sixteen columns">
						
	
	<div class="pictures_alone">
	
	<h1>Categories</h1>
	
	<ul>
	
	<? $img=mysql_query("select * from categories",$cxn);
	while($row=mysql_fetch_array($img)){ ?>
		
	
		<li>
		<?=$row[nomca]?><br/>
		<a href="categories_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>
		<a href="categories_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>
		</li>
		
		<? } ?>
		
		<li><a href="categories_publicar.php?type=section">Afegir una categoria</a></li>
		
	</ul>
	</div><!--tanca pictures alone-->		
	
	
	
	
	
					
			</div>
		</div>
		
		

</div><!-- tanca bandcontent-admin-->