<?
include('security.php');
$idioma=$_GET[idioma];
if($idioma==""){ $idioma='ca';}
include('data-europeu.php');
include('bdcon.php');
include('header.php');
?>

<div class="bandformtutor">
	<div class="container">
	
		
		
		<?
			if(isset($_POST['submitpdf'])){
			
					$limitedext = array(".jpg",".jpeg",".pdf");
					
					
					//Definim les variables dels quals n'hem de guardar els valors.
					$new_file = $_FILES['fitxa'];
					$file_name = $new_file['name'];
					//to remove spaces from file name we have to replace it with "_".
					$file_name = str_replace(' ', '_', $file_name);
					$file_tmp = $new_file['tmp_name'];
					$file_size = $new_file['size'];
					$carpeta="fitxes"; //Definim carpeta on aniran els arxius
	
					
					           if (!is_uploaded_file($file_tmp)) {
              //print error message and file number.
              echo 'Arxiu no seleccionat <a class="button-small" href="panell.php?idioma='.$_POST[idioma].'">« Tornar enrere</a><br>';
           }else{
           
                 // this code will check file extension
                 $ext = strrchr($file_name,'.');
                 if (!in_array(strtolower($ext),$limitedext)) {
                echo 'L\'Arxiu ('.$file_name.') Té l\'Extensió incorrecte. Cal que sigui .pdf o .jpg   <a class="button-small" href="panell.php?idioma='.$_POST[idioma].'">« Tornar enrere</a><br>';
                 }else{
                      
                                   // FUNCIO QUE PUJA
                                  copy($_FILES['fitxa']['tmp_name'],$carpeta.'/'.$_POST[id].'.pdf');					
				                                  
                                   if (move_uploaded_file($file_tmp,$carpeta.$file_name)) {
                                  
	                                 //$vincle= $vincle.$carpeta2.$_FILES['file'.$i]['name'];                     
                                     echo 'Arxiu ('.$file_name.') Pujat amb exit! <a href="panell.php?idioma='.$_POST[idioma].'"> « Tornar</a><br>';
                                     header('Location: panell.php');
                                     exit;
                                   
                                   }else{
                                        echo 'La Pujada ha fallat  <a href="panell.php?idioma='.$_POST[idioma].'"> « Tornar</a><br>';
                                   }#end of (move_uploaded_file).
                 }#end of (limitedext).
           }#end of (!is_uploaded_file).
					
	

			} else {
		
		?>
		
		<?
		//Accedim a la DB per agafar les dades del tutor segons el seu id recollida en la sessió
		$darespare=mysql_query("select * from pares where id='".$_SESSION[s_iduser]."'",$cxn);
		while($row=mysql_fetch_array($darespare)){ ?>
			
			<div class="one-third column">
	
				<strong>Telèfon 1:</strong> <?=$row[tel1]?><br>
				<strong>Telèfon 2:</strong> <?=$row[tel2]?><br>
				<strong>Telèfon 3:</strong> <?=$row[tel3]?><br>
				<strong>Email 1:</strong> <?=$row[email1]?><br>	

			</div><!--tanca primer one-third-->
		
		<div class="one-third column">	
				
			<strong>DNI:</strong> <?=$row[dni]?><br>
			<strong>Numero carnet família monoparental:</strong> <?=$row[fammono]?><br>
			<strong>Numero carnet família nombrosa:</strong> <?=$row[famnum]?><br>
			
		</div><!--one-third-->
		
		<div class="one-third column">	
				
			<a href="dades-editar.php?id=<?=$_SESSION[s_iduser]?>&idioma=<?=$idioma?>" class="button">Editar dades</a><br>
			<a href="changepassword.php?id=<?=$_SESSION[s_iduser]?>&idioma=<?=$idioma?>" class="button">Canviar contrasenya</a>	
			
		</div><!--one-third-->
		
			
		<? }//end while ?>
		
		
				
	
	</div><!--end container-->
</div><!--end bandtutor-->




<div class="bandformnen">
	<div class="container">
	<div class="siteen columns">
			
			<h2><?=$word['yourkids'][$idioma]?></h2>
			
				<? $nens=mysql_query("select * from nens where idpare='$_SESSION[s_iduser]'",$cxn);
				while($row=mysql_fetch_array($nens)){?>
			
			<div class="one-third column">
			
				<h3><?=$row[nom]?> <?=$row[cognoms]?></h3>
			
				<?=$row[adreca]?><br>
				<?=$row[poblacio]?>,<?=$row[cp]?><br><br>
				<?=$row[escolaultim]?>: <?=$row[cursacabat]?><br><br>
				
				
				<? 
				
				$ruta= $_SERVER[DOCUMENT_ROOT].'/fitxes/'.$row[id].'.pdf';
				if (file_exists($ruta)) {?>
 
				
				<a href="/fitxes/<?=$row[id]?>.pdf"><img src="/img/admin/pdf.png" width="20"> Fitxa mèdica</a><br>
				
				<a class="button-small-red" id="link<?=$row[id]?>">Tornar a pujar</a><br>
				
				
				<form id="form<?=$row[id]?>" style="display: none;" class="littleform" method="post" action="?" enctype="multipart/form-data">
					
					<labal for="fitxamedica"><?=$word['uploadmedica'][$idioma]?> (.pdf)</labal><input type="file" name="fitxa">
					<input type="hidden" name="idioma" value="<?=$idioma?>">
					<input type="hidden" name="id" value="<?=$row[id]?>">
					<input type="submit" class="submit" name="submitpdf" value="<?=$word['upload'][$idioma]?>">
				
				</form>
				
				<script type="text/javascript">
					$(document).ready(function(){
					
					$("#form<?=$row[id]?>").hide();
					$("#link<?=$row[id]?>").show();
					
					$('#link<?=$row[id]?>').click(function(){
					$("#form<?=$row[id]?>").slideToggle();
					});
					
					});
				</script>
				
				
			<? } else { ?>
					
				
				<form class="littleform" method="post" action="?" enctype="multipart/form-data">
					
					<labal for="fitxamedica"><?=$word['uploadmedica'][$idioma]?> (.pdf)</labal><input type="file" name="fitxa">
					<input type="hidden" name="idioma" value="<?=$idioma?>">
					<input type="hidden" name="id" value="<?=$row[id]?>">
					<input type="submit" class="submit" name="submitpdf" value="<?=$word['upload'][$idioma]?>">
				
				</form>
			
			<? } ?>
			
				<a class="submit2" href="nen_publicar.php?id=<?=$row[id]?>"><?=$word['editdata'][$idioma]?></a>
			
			</div>
			
			
			
		<? } ?>
		
		
		</div><!--tanca sixteen-->
		
		<div class="sixteen columns nounen">
			
			<a href="nen_publicar.php">+ Afegir nou fill</a>
		</div>
	
	</div>
</div><!--tanca band-->







<div class="bandformnen">
	<div class="container">
		<div class="sixteen columns">

			<h2>Historial de comandes</h2>

<script>$(document).ready(function() { $("#taulahistorial").tablesorter(); } ); </script>

		<table id="taulahistorial" class="tablesorter">
					<thead>
						<th>Id.Cmd</th>
						<th>Fill</th>
						<th>Pare/Tutor</th>
						<th>Activitat</th>
						<th>Inici</th>
						<th>Final</th>
						<th>Preu</th>
						<th>Status</th>
						<th>Categoria</th>
					</thead>
					
					<tbody>
					
					
								<? $consulta=mysql_query("select historial.id,historial.idcomanda, nens.id as idnen,nens.nom as nomnen, pares.id as idpare, pares.nom as nompare, pares.cognoms as cognomspare, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,moduls.preu,historial.status,categories.nomca as categoria from historial inner join nens on historial.idnen=nens.id inner join pares on nens.idpare=pares.id inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat inner join categories on categories.id=activitats.categoria",$cxn);
			
			
			$color = true;
			$previous = '';
			while($row=mysql_fetch_array($consulta)){ 
				
			
				$inici= FechaFormateada_ca(strtotime($row[dinici]));
				$final= FechaFormateada_ca(strtotime($row[dfinal]));
				
				if ( $row['idcomanda'] != $previous) {
		 					$color = !$color;
		 					$previous = $row['idcomanda'];
		 				
		 				} 	
		 					$class = ($color)? 'white': 'blue';
				
				
			?>
					
						<tr class="<?=$class?>">
							<td><?=$row[idcomanda]?></td>
							<td><?=$row[nomnen]?></td>
							<td><?=$row[nompare]?> <?=$row[cognomspare]?></td>
							<td><?=$row[nomactivitat]?></td>
							<td><?=$inici?></td>
							<td><?=$final?></td>
							<td><?=$row[preu]?></td>
							<td>
								<? if($row[status]=='preinscrit'){?><span style="color: red;"><?=$word['preinscrit'][$idioma]?></span><? } ?>
							
							
							</td>
							<td><?=$row[categoria]?></td>
						</tr>
					
						<? } ?>	
					
					</tbody>
					
				</table>
				
			
				
				
		</div><!--end sixteen-->
	</div><!--end container-->
</div><!--end band-->



<div class="bandformtutor">
	<div class="container">
		<div class="sixteen columns">
			<a class="newcommand" href="new.php?idioma=<?=$idioma?>"><?=$word['newcommand'][$idioma]?></a>	
		</div><!--end sixteen-->
	</div><!--end container-->
</div><!--end band-->


<? } //end else pdf upload?>