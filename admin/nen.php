<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
$id=$_GET[id];
?>

<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">
		
		
				<? $nen=mysql_query("select nens.*, pares.id as idpare,pares.nom as nompare, pares.cognoms as cognomspare from nens inner join pares on nens.idpare=pares.id where nens.id=$id",$cxn);
			while($row=mysql_fetch_array($nen)){
					
					$idpare=$row[idpare];
					$birthday = new DateTime($row[birthdate]);
					$interval = $birthday->diff(new DateTime);
					
				?>
				
				
			<div class="new"><a class="submit" href="nens.php">Tornar enrere</a><br><br><br></div>	
		
			<!--imprimim el títol segons la categoria-->
			<h1><?=$row[nom]?> <?=$row[cognoms]?></h1>
			
			<hr size=3>
			
			<p><strong>Tutor legal:</strong> <a href="pare.php?id=<?=$row[idpare]?>" target="_blank"><?=$row[nompare]?> <?=$row[cognomspare]?></a>&nbsp;&nbsp;&nbsp;&nbsp;
			
			<strong>Data de naixament:</strong> <?=$row[birthdate]?>  <strong>Edat:</strong>  <? echo $interval->y;?></p>
			
			<p>
				<?=$row[adreca]?><br>
				<?=$row[poblacio]?>
				<?=$row[cp]?>
				
			</p>
			
			
			<p>
				<strong>Curs acabat:</strong> <?=$row[cursacabat]?><br>
				<strong>Escolar on s'ha fet l'últim curs:</strong> <?=$row[escolaultim]?><br>
				
			
			</p>
			
			<hr size=3>
			
			<p>
				<strong>Antitetànica:</strong> <?=$row[antitetanica]?><br>
				<strong>Alèrgies:</strong> <?=$row[alergia]?>. <?=$row[nomalergia]?><br>
				<strong>Enfermetats cròniques:</strong> <?=$row[croniques]?>. <?=$row[nomcroniques]?><br>
				<strong>Intervingut quirúrgicament:</strong> <?=$row[intervingut]?>. <?=$row[nomintervingut]?><br>	
				<strong>Discapacitats:</strong> <?=$row[discapacitat]?>. <?=$row[nomdiscapacitat]?><br><br>
				
				<strong>Descripció del caràcter:</strong> <?=$row[caracter]?><br><br>
				
				<strong>Patologies:</strong> <?=$row[patologies]?><br>
				<strong>Altres patologies:</strong> <?=$row[patologies2]?><br><br>
				
				<strong>Autorització mèdica:</strong> <?=$row[autoritzaciomedica]?>
				
				
			</p>
			
			<a class="kinobsbutton" href="nen_publicar.php?id=<?=$id?>">modificar dades</a>
			
			
			<hr size=3>
			
			<? } ?>
			
			
			
			<h3>Dades del tutor legal</h3>
			
			
			<? $pare=mysql_query("select * from pares where id='$idpare'",$cxn);
			while($row=mysql_fetch_array($pare)){ ?>
				
				
				<?=$row[nom]?> <?=$row[cognoms]?> &nbsp;&nbsp;&nbsp;&nbsp; <?=$row[dni]?><br><br>
				
				<table class="dadespare">
				<tr>
					<td><strong>Telèfon 1:</strong> <?=$row[tel1]?><br><strong>Telèfon 2:</strong> <?=$row[tel2]?><br><strong>Telèfon 3:</strong> <?=$row[tel3]?><br></td>
					
					<td><strong>email1</strong> <?=$row[email1]?><br><strong>email2:</strong> <?=$row[email2]?><br></td>
					
				</tr>
				</table>
				<br>
				<strong>Familia nombrosa:</strong> <?=$row[famnum]?><br>
				<strong>Familia monoparental:</strong> <?=$row[fammono]?>
				
				<br><br>
				<a class="kinobsbutton" href="pare_publicar.php?id=<?=$idpare?>&nen=<?=$id?>">modificar dades del tutor</a>
				<!--<strong>Entitat:</strong> <?=$row[entitat]?><br>
				<strong>Titular entitat:</strong> <?=$row[titular]?>
				<span class="formapago"><?=$row[formapago]?></span>-->
			
			<? } ?>
			
			
		</div>
	
	
		</div><!--container-->
</div><!-- tanca bandcontent-admin-->

<? include('footer.php');?>