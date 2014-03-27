<?php
include('security.php');
$idioma=$_GET[idioma];
if($idioma==""){ $idioma='ca';}
include('bdcon.php');
include('header.php');
include('data-europeu.php');
?>

	<div class="bandresum">
	<div class="container">
		<div class="sixteen columns">
		
			
			<h3><?=$word['volsinscriurea'][$idioma]?></h3>
 				
 				
 				<ul class="volsinscriure">
 				
 				
 				<? //Prenem les dades dels fills
 				$nens=mysql_query("select * from nens where idpare='$_SESSION[s_iduser]'",$cxn);
 				while($row=mysql_fetch_array($nens)){
	 			//posem les dades del xaval en un array
	 			$dadesnen[]=$row[id].'/'.$row[nom].'/'.$row[birthdate];	} //end while
 				//print_r($dadesnen);
 				?>
 				
 				
 				<? foreach ($dadesnen as $value) {
	 				
	 				$coses=explode('/',$value);
					$id=$coses[0];	 				
	 				$nom=$coses[1];
	 				$naixament=$coses[2];
	 				$birthday2= new DateTime($naixament);
	 				$edat= $birthday2->diff(new DateTime);	
 				?>
 				
 					<li><span class="nom"><?=ucfirst($nom)?></span><br><span class="edat"> de  
 					 
 					<? echo $edat->y;?>
 					<?=$word['years'][$idioma]?> </span><br> <!--<em>(<?=$birthday?>)</em>--></li>
 						
 				
 				<? } ?>
 				
 				</ul>
 				
		</div><!--end sixteen-->
	</div><!--end container-->
	</div><!--end bandresum-->		
 				
 				
 	<div class="bandform">
 		<div class="container">
 			<div class="sixteen columns">	
 		
	 			 <form class="inscripcio" method="post" action="new2.php">
 	
 				<h3><?=$word['selectactivities'][$idioma]?></h3>
 				
 				<!-- FEM EL LOOP DE MÒDULS-->
 				<? $activitats=mysql_query("select * from activitats",$cxn);
 				while($row=mysql_fetch_array($activitats)){?>
	 				
	 				<div class="activitats">
	 						
	 						<h1><? if($idioma=='ca'){ echo $row[nomca];} else if($idioma=='es'){ echo $row[nomes];}?></h1>
	 						<p><? if( $idioma=='ca') {echo $row[desca];} else if($idioma=='es'){ echo $row[deses];}?></p>
	 				
							<? $moduls=mysql_query("select * from moduls where idactivitat='$row[id]'",$cxn);
								while($raw=mysql_fetch_array($moduls)){
									
									$inicica= FechaFormateada_ca(strtotime($raw[dinici]));
									$finalca= FechaFormateada_ca(strtotime($raw[dfinal]));
									
									$inicies= FechaFormateada_es(strtotime($raw[dinici]));
									$finales= FechaFormateada_es(strtotime($raw[dfinal]));
									
									if($idioma=='ca'){ $inici=$inicica and $final=$finalca;} else if($idioma=='es'){ $inici=$inicies and $final=$finales;}
									
								?>
								
									
									
									<div class="frontmodul">
									
			
									
									<div class="infomodul">
										<p>Del <strong><?=$inici?></strong> al <strong><?=$final?></strong></p>
										<p class="apartir"><span>*</span><?=$word['apartir'][$idioma]?> <?=$raw[edat]?> <?=$word['years'][$idioma]?></p>	
									</div>
										
									
									
									
									<div class="nensmodul">
											
											<? foreach ($dadesnen as $value) {
												$coses=explode('/',$value);
												$id=$coses[0];	 				
												$nom=$coses[1];
												$naixament=$coses[2];
												$birthday2= new DateTime($naixament);
												$edat= $birthday2->diff(new DateTime);	
											

											//mirem al historial a veure si el mòdul ja està ple
											$historial=mysql_query("select id,status from historial where idmodul='$raw[id]' and status='inscrit'",$cxn);
											$numentrades=mysql_num_rows($historial);?>
											
											
											<? if($numentrades >= $raw[maximnens]) {?>
											
												<small>Activitat plena</small>
												
												
												<label for="neninside">	
										<input type="checkbox" disabled id="regularCheckbox<?=$i?>" name="xaval[]" value="<?=$id?>/<?=$raw[id]?>/<?=$nom?>"/>
											<span><?=ucfirst($nom)?></span>
											</label>
												
												
											<? } else {?>
											
											<? if($raw[edat] > $edat->y){ ?>	
											
											<label for="neninside">	
										<input type="checkbox" disabled id="regularCheckbox<?=$i?>" name="xaval[]" value="<?=$id?>/<?=$raw[id]?>/<?=$nom?>"/>
											<span><?=ucfirst($nom)?></span>
											</label>
												
												
											<? } else { ?>
												
												<label for="neninside">
												<input type="checkbox" id="regularCheckbox<?=$i?>" name="xaval[]" value="<?=$id?>/<?=$raw[id]?>/<?=$nom?>"/>
											<span><?=ucfirst($nom)?></span>
											</label>
												
												
											<? } ?>
											<? } //tanca if activitat plena ?>
											
																					
											<? } ?>
									</div><!--end nens-modul-->
										
										
										<div class="preumodul">
											<span class="preu"><?=$raw[preu]?></span><span class="simbol">€</span>
										</div>	
										
								
									</div>
	
								
								<? }//end moduls ?>				
	 					
	 				</div>
	 				
	 				
	 				
 				<? } //TANQUEM EL LOOP DE MÒDULS ?>
	
            <input type="hidden" name="idioma" value="<?=$idioma?>"/>

                  
          <!-- <a href="index.php?numeronens=<?=$numeronens?>" class="button">Anterior</a>-->
           
           <a class="button" href="www.kinobs.com" onclick="window.history.go(-1); return false;"><?=$word['previous'][$idioma]?></a>
           
            <input type="submit" value="<?=$word['next'][$idioma]?>"/>
      </form>

    
    </div>
  
   </div><!--tanca content-->
    
<?php include('footer.php')?>