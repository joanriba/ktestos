<?php
include('bdcon.php');

$numeronens=$_POST[numeronens];
include('data-europeu.php');


$idioma=$_POST[idioma];


include('header.php');
 
?>

	<div class="bandresum">
	<div class="container">
		<div class="sixteen columns">
		
			
			<h3>Vols inscriure a:</h3>
 				
 				
 				<ul class="volsinscriure">
 				
 				<? for ($i=1; $i<=$numeronens; $i++) {?>
 				
 					<li><span class="nom"><?=ucfirst($_POST['fill'.$i])?></span><br><span class="edat"> de  
 					
 					<? $birthday=$_POST['any'.$i].'-'.$_POST['mes'.$i].'-'.$_POST['dia'.$i];
	 					$birthday2= new DateTime($birthday);
	 					$edat= $birthday2->diff(new DateTime);	
 					?>
 					 
 					<? echo $edat->y;?>
 					anys</span><br> <em>(<?=$birthday?>)</em></li>
 						
 				
 				<? } ?>
 				
 				</ul>
 				
		</div><!--end sixteen-->
	</div><!--end container-->
	</div><!--end bandresum-->		
 				
 				
 	<div class="bandform">
 		<div class="container">
 			<div class="sixteen columns">	
 		
	 			 <form class="inscripcio" method="post" action="pas3.php">
 	
 				<h3>Selecciona les activitats</h3>
 				
 				<!-- FEM EL LOOP DE MÒDULS-->
 				<? $activitats=mysql_query("select * from activitats",$cxn);
 				while($row=mysql_fetch_array($activitats)){?>
	 				
	 				<div class="activitats">
	 						
	 						<h1><?=$row[nomca]?></h1>
	 						<p><?=$row[desca]?>
	 				
							<? $moduls=mysql_query("select * from moduls where idactivitat='$row[id]'",$cxn);
								while($raw=mysql_fetch_array($moduls)){
									
									$inici= FechaFormateada_ca(strtotime($raw[dinici]));
									$final= FechaFormateada_ca(strtotime($raw[dfinal]));
									
								?>
								
									
									
									<div class="frontmodul">
									
										
									
										
									
									<div class="infomodul">
									
										<p>Del <strong><?=$inici?></strong> al <strong><?=$final?></strong></p>
										
									</div>
										
									
									
									
									<div class="nensmodul">
																					
											<? for ($i=1; $i<=$numeronens; $i++) {
		
											$birthday=$_POST['any'.$i].'-'.$_POST['mes'.$i].'-'.$_POST['dia'.$i];
											$birthday2= new DateTime($birthday);
											$edat= $birthday2->diff(new DateTime);		
											?>
											
											
											
											<label for="neninside">
											<input type="checkbox" id="regularCheckbox<?=$i?>" name="xaval[]" value="<?=$_POST['fill'.$i]?>/<?=$birthday?>/<?=$raw[id]?>/<?=$numeronens?>"/>
											<span><?=ucfirst($_POST['fill'.$i])?></span>
											</label>

										
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
            <input type="hidden" name="numeronens" value="<?=$numeronens?>"/>
                  
          <!-- <a href="index.php?numeronens=<?=$numeronens?>" class="button">Anterior</a>-->
           
           <a class="button" href="www.kinobs.com" onclick="window.history.go(-1); return false;">Anterior</a>
           
            <input type="submit" value="Següent"/>
      </form>

    
    </div>
  
   </div><!--tanca content-->
    
<?php include('footer.php')?>