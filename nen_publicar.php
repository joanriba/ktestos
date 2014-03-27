<?
include('security.php');
$idioma=$_GET[idioma];
if($idioma==""){ $idioma='ca';}
include('bdcon.php');
include('header.php');
?>

<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">

<? 
$id=$_GET[id];

//PUBLICAR
if (isset ($_POST['enviar'])) {
mysql_query("INSERT INTO nens(idpare,nom,cognoms,birthdate,adreca,poblacio,cp,escolaultim,cursacabat,antitetanica,alergia,nomalergia,croniques,nomcroniques,intervingut,nomintervingut,discapacitat,nomdiscapacitat,caracter,patologies,patologies2,autoritzaciomedica,autoritzaciomedica2) VALUES('$_POST[idpare]','$_POST[nom]','$_POST[cognoms]','$_POST[birthdate]','$_POST[adreca]','$_POST[poblacio]','$_POST[cp]','$_POST[escolaultim]','$_POST[cursacabat]','$_POST[antitetanica]','$_POST[alergia]','$_POST[nomalergia]','$_POST[croniques]','$_POST[nomcroniques]','$_POST[intervingut]','$_POST[nomintervingut]','$_POST[discapacitat]','$_POST[nomdiscapacitat]','$_POST[caracter]','$_POST[patologies]','$_POST[patologies2]','$_POST[autoritzaciomedica]','$_POST[autoritzaciomedica2]')",$cxn);
echo '<script>document.location = "panell.php?idioma='.$idioma.'"</script>'; 
} ?>


<? 
//BORRAR
if($_GET[borrar]=="yes") {
$result = mysql_query("delete from nens where id='$id'",$cxn);
echo '<script>document.location = "panell.php?idioma='.$idioma.'"</script>';
} ?>


<? 
//EDITAR
if (isset($_POST['reenviar'])) {

$result = mysql_query("update nens set idpare='$_POST[idpare]',nom='$_POST[nom]', cognoms='$_POST[cognoms]', birthdate='$_POST[birthdate]', adreca='$_POST[adreca]', poblacio='$_POST[poblacio]', cp='$_POST[cp]', escolaultim='$_POST[escolaultim]', cursacabat='$_POST[cursacabat]', antitetanica='$_POST[antitetanica]', alergia='$_POST[alergia]', nomalergia='$_POST[nomalergia]', croniques='$_POST[croniques]', nomcroniques='$_POST[nomcroniques]', intervingut='$_POST[intervingut]', nomintervingut='$_POST[nomintervingut]', discapacitat='$_POST[discapacitat]', nomdiscapacitat='$_POST[nomdiscapacitat]', caracter='$_POST[caracter]', patologies='$_POST[patologies]', patologies2='$_POST[patologies2]', autoritzaciomedica='$_POST[autoritzaciomedica]',autoritzaciomedica2='$_POST[autoritzaciomedica2]' where id='$_POST[id]'", $cxn);

//tornem enrere
echo '<script>document.location = "panell.php?idioma='.$idioma.'"</script>';
} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from nens where id=$id",$cxn);
while($row=mysql_fetch_array($consulta)){ $idpare=$row[idpare];
$nom=$row[nom];$cognoms=$row[cognoms];$birthdate=$row[birthdate];$adreca=$row[adreca];$poblacio=$row[poblacio];$cp=$row[cp]; $escolaultim=$row[escolaultim]; $cursacabat=$row[cursacabat];
$antitetanica=$row[antitetanica];$alergia=$row[alergia]; $nomalergia=$row[nomalergia]; $croniques=$row[croniques]; $nomcroniques=$row[nomcroniques]; $intervingut=$row[intervingut]; $nomintervingut=$row[nomintervingut]; $discapacitat=$row[discapacitat]; $nomdiscapacitat=$row[nomdiscapacitat]; $caracter=$row[caracter]; $patologies=$row[patologies]; $patologies2=$row[patologies2]; $autoritzaciomedica=$row[autoritzaciomedica];$autoritzaciomedica2=$row[autoritzaciomedica2];}
?>    


<div class="bandcontent-admin">
	<div class="container">
		
				<div class="sixteen columns">		

<!--variem el títol segons si estem publicant o editant-->
<h1><? if(isset($id)) {echo'Editar dades del nen';} else {echo 'Insertar nen manualment';}?></h1>
      	   
				</div><!--end sixteen-->

      	      	   


			
			<div class="seven columns">
			
			
			<form method="post" action="?" enctype="multipart/form-data">
			
			<!-- la id en el cas de que estiguem editant-->
			<input type="hidden" name="id" value="<?=$id?>">
			
			<input type="hidden" name="idpare" value="<?=$_SESSION['s_iduser']?>"
			
			<label for="nom">Nom</label>
			<input type="text" name="nom" value="<? if(isset($id)){ echo $nom;}?>">
			
			<label for="cognoms">Cognoms</label>
			<input type="text" name="cognoms" value="<? if(isset($id)){ echo $cognoms;}?>">
						
			<label for="birthdate">Data de naixament (Exemple: 2010-01-25)</label>			
			<input type="text" name="birthdate" placeholder="2010-01-25" value="<? if(isset($id)){ echo $birthdate;}?>">

			<label for="adreca">Adreça</label>			
			<input type="text" name="adreca" value="<? if(isset($id)){ echo $adreca;}?>">
			
			<label for="poblacio">Població</label>			
			<input type="text" name="poblacio" value="<? if(isset($id)){ echo $poblacio;}?>">
			
			<label for="cp">Codi Postal</label>			
			<input type="text" name="cp" value="<? if(isset($id)){ echo $cp;}?>">
			
			<label for="cursacabat">Curs acabat</label>			
			<input type="text" name="cursacabat" value="<? if(isset($id)){ echo $cursacabat;}?>">
			
			<label for="escolaultim">Últim escola on s'ha estat</label>			
			<input type="text" name="escolaultim" value="<? if(isset($id)){ echo $escolaultim;}?>">
			
			
			<h3>Fitxa mèdica</h3>
			
			
			<!--select antitetanica-->
			<label for="antitetanica">Antitetànica</label>
						<select name="antitetanica">		
							<? if(isset($id)){ ?><option value="<?=$antitetanica?>">Actualment: <?=$antitetanica?></option><? } ?>
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
								
						
			<!--select Alèrgia-->
			<label for="alergia">Alèrgia</label>
						<select name="alergia">		
							<? if(isset($id)){ ?><option value="<?=$alergia?>">Actualment: <?=$alergia?></option><? } ?>
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
			
			<label for="nomalergia">Nom de l'alèrgia</label>
				<textarea name="nomalergia"><? if(isset($id)){ echo $nomalergia;}?></textarea>
						
						
						
			
			<!--select Enfermetats cròniques-->
			<label for="croniques">Enfermetats cròniques</label>
						<select name="croniques">		
							<? if(isset($id)){ ?><option value="<?=$croniques?>">Actualment: <?=$croniques?></option><? } ?>
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
			
				<label for="nomcroniques">Nom de les enfermetats cròniques</label>
				<textarea name="nomcroniques"><? if(isset($id)){ echo $nomcroniques;}?></textarea>			
						
	
			
			<!--select intervingut-->
			<label for="intervingut">intervingut</label>
						<select name="intervingut">		
							<? if(isset($id)){ ?><option value="<?=$intervingut?>">Actualment: <?=$intervingut?></option><? } ?>
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
						
				<label for="nomintervingut">Intervencions que ha rebut</label>
				<textarea name="nomintervingut"><? if(isset($id)){ echo $nomintervingut;}?></textarea>	
			
			
			
			
			
			<!--select Discapacitat-->
			<label for="discapacitat">Discapacitat</label>
						<select name="discapacitat">		
							<? if(isset($id)){ ?><option value="<?=$discapacitat?>">Actualment: <?=$discapacitat?></option><? } ?>
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
						
				<label for="nomdiscapacitat">Nom de la discapacitat</label>
				<textarea name="nomdiscapacitat"><? if(isset($id)){ echo $nomdiscapacitat;}?></textarea>	
						
						
			
				
						
			<!-- Descripció del caràcter-->			
			<label for="caracter">Descripció del caràcter</label>
			<textarea name="caracter"><? if(isset($id)){ echo $caracter;}?></textarea>
			
			
			<!-- Patologies de la llista-->			
			<label for="patologies">Patologies de la llista</label>
			<input type="text" name="patologies" value="<? if(isset($id)){ echo $patologies;}?>">
			
			
			<!-- Patologies de la llista-->			
			<label for="patologies2">Altres patologies que tingui</label>
			<input type="text" name="patologies2" value="<? if(isset($id)){ echo $patologies2;}?>">
	
	
			
			
				<!--select autorització mèdica-->
			<label for="autoritzaciomedica">Autorització mèdica</label>
						<select name="autoritzaciomedica">		
							<? if(isset($id)){ ?><option value="<?=$autoritzaciomedica?>">Actualment: <?=$autoritzaciomedica?></option><? } ?>
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
						
						
					<!--select autorització mèdica-->
			<label for="autoritzaciomedica2">Autorització mèdica 2</label>
						<select name="autoritzaciomedica2">		
							<? if(isset($id)){ ?><option value="<?=$autoritzaciomedica2?>">Actualment: <?=$autoritzaciomedica2?></option><? } ?>
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
											
			
			<input type="submit" value="<? if(isset($id)){ echo 'Guardar';} else {echo 'Publicar';}?>" name="<? if(isset($id)){ echo 'reenviar';} else {echo 'enviar';}?>"/>
			</form>

			
			
		</div>

		
	</div><!--end container-->
		

</div><!--tanca sixteen-->
</div><!--tanca container-->
</div><!--tanca bandadmin-->


<? include('footer.php');?>