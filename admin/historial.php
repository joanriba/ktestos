<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
?>

<div class="bandcontent-admin">
	
	


<? 
//Si està enviada la id de comanda (provinent de comandes.php) mostrem els productes de la comanda

if(isset($_GET[idcomanda])){

$nivell=2;

$consulta=mysql_query("select historial.id,historial.idcomanda,historial.idmodul, nens.id as idnen,nens.nom as nomnen, nens.birthdate, nens.cognoms as cognomsnen, pares.id as idpare, pares.nom as nompare, pares.cognoms as cognomspare, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,moduls.preu,historial.status,categories.nomca as categoria from historial inner join nens on historial.idnen=nens.id inner join pares on nens.idpare=pares.id inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat inner join categories on categories.id=activitats.categoria where historial.idcomanda='$_GET[idcomanda]'",$cxn);


//Si està enviada la id per $_GET ensenyem només els nanus que s'hagin apuntat a aquest mòdul
} else if(isset($_GET[id])){

$nivell=2;
	
$consulta=mysql_query("select historial.id,historial.idcomanda,historial.idmodul, nens.id as idnen,nens.nom as nomnen, nens.birthdate, nens.cognoms as cognomsnen, pares.id as idpare, pares.nom as nompare, pares.cognoms as cognomspare, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,moduls.preu,moduls.maximnens,historial.status,categories.nomca as categoria from historial inner join nens on historial.idnen=nens.id inner join pares on nens.idpare=pares.id inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat inner join categories on categories.id=activitats.categoria where historial.idmodul='$_GET[id]'",$cxn);


$consulta_mini=mysql_query("select historial.id, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,moduls.maximnens,historial.status from historial inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat  where historial.idmodul='$_GET[id]'",$cxn);

$nensinscrits=mysql_query("select historial.id, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,moduls.maximnens,historial.status from historial inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat where historial.idmodul='$_GET[id]' and historial.status='inscrit'",$cxn);

	
	//Extraiem nom activitat inici i final per al títol
	while($raw=mysql_fetch_array($consulta_mini)){ $activitat=$raw[nomactivitat]; 
		
				$dinici= FechaFormateada_ca(strtotime($raw[dinici]));
				$dfinal= FechaFormateada_ca(strtotime($raw[dfinal]));
				$maximnens=$raw[maximnens];		
	}
	
	
} else {

$nivell=1;

//Si no hi ha cap $_GET els mostrem tots
$consulta=mysql_query("select historial.id,historial.idcomanda,historial.idmodul, nens.id as idnen,nens.nom as nomnen, nens.birthdate, nens.cognoms as cognomsnen, pares.id as idpare, pares.nom as nompare, pares.cognoms as cognomspare, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,moduls.preu,moduls.maximnens,historial.status,categories.nomca as categoria from historial inner join nens on historial.idnen=nens.id inner join pares on nens.idpare=pares.id inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat inner join categories on categories.id=activitats.categoria order by historial.idcomanda asc",$cxn);

}?>



			<? if(isset($_GET[id])){ 
			
					$result2=mysql_num_rows($consulta); 
					if($result2==0){ echo 'No hi ha nens apuntats a aquest mòdul';} else { echo '<h3>Comandes per a '.$activitat.'<br> del '.$dinici.'<br> al '.$dfinal.'</h3>Maxim nens: <strong>'.$maximnens.'</strong>&nbsp;&nbsp;Nens ja inscrits: '.mysql_num_rows($nensinscrits); if($maximnens = $nensinscrits){ echo '<span style="color: red;">  Atenció! El nombre d\'inscrits és igual a l\'ocupació màxima del mòdul</span>';} }
					
					} else if(isset($_GET[idcomanda])){ echo '<h3>Productes de la Comanda nº'.$_GET[idcomanda].'</h3><a href="comandes.php">« Tornar al llistat de comandes</a>';} else { echo '<h3>Historial de comandes (totes)</h3>';}?>


<script>$(document).ready(function() { $("#taulahistorial").tablesorter(); } ); </script>

		



		<table id="taulahistorial" class="tablesorter">
					<thead>
						<th>Id Com.</th>
						<th>Fill</th>
						<th>Edat</th>
						<th>Pare/Tutor</th>
						<th>Activitat</th>
						<th>Inici - Final</th>
						<th>Preu</th>
						<th>Status</th>
						<th>Categoria</th>
						<th>Borrar</th>
					</thead>
					
					<tbody>


			<? 
			$color = true;
			$previous = '';
			while($row=mysql_fetch_array($consulta)){ 
				$inici= FechaBreu_ca(strtotime($row[dinici]));
				$final= FechaBreu_ca(strtotime($row[dfinal]));
					
					$birthday2= new DateTime($row[birthdate]);
	 				$edat= $birthday2->diff(new DateTime);
	 					
	 					
	 				 
	 					if ( $row['idcomanda'] != $previous) {
		 					$color = !$color;
		 					$previous = $row['idcomanda'];
		 				
		 				} 	
		 					$class = ($color)? 'white': 'blue';
		 				
		 						
	 					?>
					
						<tr class="<? if(isset($_GET[idcomanda])){ echo 'white';} else { echo $class;}?>">
							<td><a href="#"><?=$row[idcomanda]?></a></td>
							<td><a href="nen.php?id=<?=$row[idnen]?>"><?=$row[nomnen]?>&nbsp;<?=$row[cognomsnen]?></a></td>
							<td><? echo $edat->y;?></td>
							<td><a href="nen.php?id=<?=$row[idnen]?>"><?=$row[nompare]?> <?=$row[cognomspare]?></a></td>
							<td><?=$row[nomactivitat]?></td>
							<td><?=$inici?> - <?=$final?> <span style="color: gray;"><? echo date('Y', strtotime($row[dfinal]));?></span></td>
							<td><?=$row[preu]?></td>
							<td>
							
			<? 
			if($row[status]=='preinscrit'){?><a class="red" href="changestatus.php?id=<?=$row[idnen]?>&status=<?=$row[status]?>&idmodul=<?=$row[idmodul]?>&nivell=<?=$nivell?><? if(isset($_GET[idcomanda])){ echo '&idcomanda='.$_GET[idcomanda];}?>"><?=$row[status]?></a><? } else 
			if($row[status]=='inscrit'){?><a style="color: green;" href="changestatus.php?id=<?=$row[idnen]?>&status=<?=$row[status]?>&idmodul=<?=$row[idmodul]?>&nivell=<?=$nivell?><? if(isset($_GET[idcomanda])){ echo '&idcomanda='.$_GET[idcomanda];}?>"><?=$row[status]?></a><? } else 	
			if($row[status]=='cancelat'){?><a href="changestatus.php?id=<?=$row[idnen]?>&status=<?=$row[status]?>&idmodul=<?=$row[idmodul]?>&nivell=<?=$nivell?><? if(isset($_GET[idcomanda])){ echo '&idcomanda='.$_GET[idcomanda];}?>"><?=$row[status]?></a><? } else 
			if($row[status]=='fora'){?><a style="color: gray;" href="changestatus.php?id=<?=$row[idnen]?>&status=<?=$row[status]?>&idmodul=<?=$row[idmodul]?>&nivell=<?=$nivell?><? if(isset($_GET[idcomanda])){ echo '&idcomanda='.$_GET[idcomanda];}?>"><?=$row[status]?></a><? } ?>
			
							</td>
			
			
							<td><?=$row[categoria]?></td>
							<td><a href="historial_publicar.php?id=<?=$row[id]?>&borrar=yes"><img src="/img/admin/borrar.png"></a></td>
						</tr>
					
						<? } ?>	
					
					</tbody>
					
				</table>
				
				<? if(isset($_GET[id])){?>
				<form method="post" action="export2csv.php">
					<input type="hidden" name="consulta" value="1">
					<input type="submit" name="submit" value="Descarregar contingut en format (.csv) Excel">
				</form><? } ?>
					
</div><!--end band-->

<? include('footer.php');?>