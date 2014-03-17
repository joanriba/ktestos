<?php
    require_once('checkoutWizard.class.php');
    $wizard = new CheckoutWizard();
    $action = $wizard->coalesce($_GET['action']);
    $wizard->process($action, $_POST, $_SERVER['REQUEST_METHOD'] == 'POST');
        // only processes the form if it was posted. this way, we
        // can allow people to refresh the page without resubmitting
        // form data
 
$idioma='ca'; 
 
include('header.php');
 
?>

	<div class="bandform">
	<div class="container">
		<div class="sixteen columns">
			<div class="wizard">
	
	<?php include('textos_form.php');?>
    
    <?php if ($wizard->isComplete()) { ?>
    
     
    <?php

    $email= $wizard->getValue('email');
    $pass= $wizard->getValue('pass');
    $pass2=utf8_decode($pass);
    $nom= $wizard->getValue('nom');
    $nom2=utf8_decode($nom);
    $cognoms= $wizard->getValue('cognoms');
    $cognoms2=utf8_decode($cognoms);
    $direccio= $wizard->getValue('direccio');
    $direccio2=utf8_decode($direccio);
    $poblacio= $wizard->getValue('poblacio');
    $poblacio2=utf8_decode($poblacio);
    $cp= $wizard->getValue('cp');
    $provincia= $wizard->getValue('provincies');
    $provincia2=utf8_decode($provincia);
    $telefon= $wizard->getValue('telefon');
    $pla= $wizard->getValue('plan');
    $comvas= $wizard->getValue('comvas');
    
    $oficina= $wizard->getValue('oficina');
    $entitat= $wizard->getValue('entitat');
    $dc= $wizard->getValue('dc');
    $numcompte= $wizard->getValue('numcompte');
    
    $complet=$entitat.$oficina.$dc.$numcompte;
    
    $dni= $wizard->getValue('dni');
    
    
    // Comprovem si el NUM DE COMPTE EXISTEIX
    $checkcompte = mysql_query("SELECT compte FROM users WHERE compte='$complet'");
	$existeix_compte = mysql_num_rows($checkcompte); 
	if ($existeix_compte>0) {echo 'Atenció! El teu Num. de compte ja està en ús i no s\'ha pogut trametre la teva petició.';} else {
    
    
     
    mysql_query("INSERT INTO users(email,pass,nom,cognoms,direccio,poblacio,cp,provincia,telefon,pla,procedencia,alta,compte,dni) 
    VALUES ('$email','$pass2','$nom2','$cognoms2','$direccio2','$poblacio2','$cp','$provincia2','$telefon','$pla','$comvas',NOW(),'$complet','$dni')",$cxn);

if (!$cxn){ echo "No ha conectat"; } else { echo '<p>'.$exit.'</p>'; }

	$sql = mysql_query("SELECT id_user FROM users");
	while ($row = mysql_fetch_array($sql)){
	$id_user=$row[id_user];}
	
	mysql_query("INSERT INTO llista(id_user) VALUES ('$id_user')",$cxn);
	mysql_query("INSERT INTO llista2(id_user) VALUES ('$id_user')",$cxn);
	

	
    ?>
 		
 		<a class="green" href="admin.php?idioma=<?=$idioma?>"><? if($idioma=="cat") {echo'Accedir al Meu Cinemapost';} else {echo'Acceder a Mi Cinemapost';}?></a>
 		<!--<a class="green" href="login.php?idioma=<?//=$idioma?>">Accedir com a usuari</a>-->
      <!--<form method="post" action="<?//= $_SERVER['PHP_SELF'] ?>?action=<?//= $wizard->resetAction ?>">
        <input type="submit" value="<?//=$clean?>" />
      </form>-->
      
      	<? } ?>
	<!--tanca else que verifica el num de compte-->
 
    <?php } else { ?>
    
 		<?php 

 		if($wizard->getStepName() == 'login') echo'Pas1<img src="img/w_01_'.$idioma.'.png"/>';
 		if($wizard->getStepName() == 'userdetails') echo'Pas2<img src="img/w_02_'.$idioma.'.png"/>'; 
 		if($wizard->getStepName() == 'complements') echo'Pas3<img src="img/w_03_'.$idioma.'.png"/>';
 		if($wizard->getStepName() == 'billingdetails') echo'Pas4<img src="img/w_04_'.$idioma.'.png"/>';
 		if($wizard->getStepName() == 'confirm') echo'Pas5<img src="img/w_05_'.$idioma.'.png"/>';?>
 
 		<div class="header_inscripcio"></div>
 
      <form class="inscripcio" method="post" action="<?= $_SERVER['PHP_SELF'] ?>?action=<?= $wizard->getStepName() ?>">
        <!--<h2><?= $wizard->getStepProperty('title') ?></h2>-->
		
		<?php if($wizard->getStepName() == 'login') { ?>
		
		<h3>Nom i data de naixament dels fills que vols inscriure</h3>
		
			
			 <div>
			 
			 <!--linia 1-->
			 <div>
			 <div style="display: inline-block;"> 
              <label for="fill1"></label>
              <input type="text" placeholder="Nom 1" name="fill1" value="<?= htmlSpecialChars($wizard->getValue('fill1')) ?>" />
              
              </div>
             
             
			 	<?php $i='1'; include('birthdate.php');?>
              
              <span class="advertise"><?php if ($wizard->isError('fill1')) { ?><?= $wizard->getError('fill1') ?><?php } ?></span>
              <span class="advertise"><?php if ($wizard->isError('dia1')) { ?><?= $wizard->getError('dia1') ?><?php } ?></span>
              
              
			 </div>
              
              <!--linia 2-->
              <div>
              <div style="display: inline-block;"> 
              <label for="fill2"></label>
              <input type="text" placeholder="Nom 2" name="fill2" value="<?= htmlSpecialChars($wizard->getValue('fill2')) ?>" />
              <span class="advertise"><?php if ($wizard->isError('fill2')) { ?><?= $wizard->getError('fill2') ?><?php } ?></span>
              </div>
              
              <?php $i='2'; include('birthdate.php');?>
              
              </div><!--linia2-->
              
              <!--linia 3-->
              <div>
              <div style="display: inline-block;"> 
              <label for="fill3"></label>
              <input type="text" name="fill3" placeholder="Nom 3" value="<?= htmlSpecialChars($wizard->getValue('fill3')) ?>" />
              <span class="advertise"><?php if ($wizard->isError('fill3')) { ?><?= $wizard->getError('fill3') ?><?php } ?></span>
              </div>
              
              <?php $i='3'; include('birthdate.php');?>
              
			 </div><!--linia 3-->
              
              
              <!--linia 4-->
              <div>
              <div style="display: inline-block;"> 
              <label for="fill3"></label>
              <input type="text" name="fill4" placeholder="Nom 4" value="<?= htmlSpecialChars($wizard->getValue('fill4')) ?>" />
              <span class="advertise"><?php if ($wizard->isError('fill4')) { ?><?= $wizard->getError('fill4') ?><?php } ?></span>
              </div>
              
              <?php $i='4'; include('birthdate.php');?>
              
              </div>
              
 
            <input type="hidden" name="idioma" value="<?=$idioma?>"/>
            <input type="hidden" value="<?= $wizard->getValue('idioma') ?>"/>
            
            
 
 
        <?php } else if ($wizard->getStepName() == 'userdetails') {  ?>
        
        <h2>Activitats a escollir</h2>
        
          <table>
    
    		<tr><td><input type="hidden" value="<?= $wizard->getValue('idioma') ?>"/></td></tr>
    
             <tr>
              <td class="descrip"><?=$name?></td>
              <td><input type="text" name="nom" value="<?= htmlSpecialChars($wizard->getValue('nom')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('nom')) { ?> <?= $wizard->getError('nom') ?><?php } ?></td>
            </tr>
            
            <tr>
              <td class="descrip"><?=$surname?></td>
              <td><input type="text" name="cognoms" value="<?= htmlSpecialChars($wizard->getValue('cognoms')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('cognoms')) { ?> <?= $wizard->getError('cognoms') ?><?php } ?></td>
            </tr>
            
            <tr>
              <td class="descrip">Direcció:</td>
              <td><input type="text" name="direccio" value="<?= htmlSpecialChars($wizard->getValue('direccio')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('direccio')) { ?> <?= $wizard->getError('direccio') ?><?php } ?></td>
            </tr>
            
            <tr>
              <td class="descrip"><?=$postcode?></td>
              <td><input type="text" name="cp" style="width:60px;" value="<?= htmlSpecialChars($wizard->getValue('cp')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('cp')) { ?> <?= $wizard->getError('cp') ?><?php } ?></td>
            </tr>
            
            <tr>
              <td class="descrip"><?=$town?></td>
              <td><input type="text" name="poblacio" value="<?= htmlSpecialChars($wizard->getValue('poblacio')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('poblacio')) { ?> <?= $wizard->getError('poblacio') ?><?php } ?></td>
            </tr>
            
            <tr>
              <td class="descrip"><?=$telephone?></td>
              <td><input type="text" name="telefon" value="<?= htmlSpecialChars($wizard->getValue('telefon')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('telefon')) { ?> <?= $wizard->getError('telefon') ?><?php } ?></td>
            </tr>
 			
            
            <tr>
              <td class="descrip"><?=$province?></td>
              <td><select name="provincies">
                  <option value=""></option>
                  <?php foreach ($wizard->provincies as $v) { ?>
                    <option value="<?= $v ?>"<?php if ($wizard->getValue('provincies') == $v) { ?> selected="selected"<?php } ?>>
                      <?= $v ?>
                    </option>
                  <?php } ?>
                </select>
              </td>
              <td><?php if ($wizard->isError('provincies')) { ?><?= $wizard->getError('provincies') ?><?php } ?></td>
            </tr>
          
            
            
            <tr>
              <td class="descrip"><?=$howdoyou?></td>
              <td><select name="comvas">
                  <option value=""></option>
                  <?php foreach ($wizard->comvas as $k => $v) { ?>
                    <option value="<?= $k ?>"<?php if ($wizard->getValue('comvas') == $k) { ?> selected="selected"<?php } ?>>
                      <?= $v ?>
                    </option>
                  <?php } ?>
                </select>
              </td>
              <td><?php if ($wizard->isError('comvas')) { ?><?= $wizard->getError('comvas') ?><?php } ?></td>
            </tr>
            
            
            
            
            </table>

 <?php } else if ($wizard->getStepName() == 'complements') { ?>
 
 		<h2><?=$titlechoose?></h2>
 
 
 			<table>
 		
            <tr>
              <td class="descrip"><?=$chooseplan?></td>
              <td>
                <select name="plan">
                  <option value=""></option>
                  <?php foreach ($wizard->plan as $k => $v) { ?>
                    <option value="<?= $k ?>"<?php if ($wizard->getValue('plan') == $k) { ?> selected="selected"<?php } ?>>
                      <?= $v ?>
                    </option>
                  <?php } ?>
                </select>
              </td>
              <td>
                <?php if ($wizard->isError('plan')) { ?>
                  <?= $wizard->getError('plan') ?>
                <?php } ?>
              </td>
            </tr>
            
            
          </table>

        <?php } else if ($wizard->getStepName() == 'billingdetails') { ?>

		<h2><?=$databanc?></h2>        
          <table>
              
              <tr>
           	<!-- --------------------------------------------- -->
           	<!-- ------------ENTITAT----------------- -->
           	<!-- --------------------------------------------- -->  
           	
           	
              
              <td>Entitat<br /><input type="text" name="entitat" maxlength="4" style="width:50px;" value="<?= htmlSpecialChars($wizard->getValue('entitat')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('entitat')) { ?> <?= $wizard->getError('entitat') ?><?php } ?></td>
            
           	 
           	<!-- --------------------------------------------- -->
           	<!-- ------------OFICINA----------------- -->
           	<!-- --------------------------------------------- -->  
           	
           	
              
              <td>Oficina<br /><input type="text" name="oficina" maxlength="4" style="width:50px;" value="<?= htmlSpecialChars($wizard->getValue('oficina')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('oficina')) { ?> <?= $wizard->getError('oficina') ?><?php } ?></td>
            
            
            <!-- --------------------------------------------- -->
           	<!-- ------------DC----------------- -->
           	<!-- --------------------------------------------- -->  
           	
           	
             
              <td>DC<br/><input type="text" name="dc" maxlength="2" style="width:27px; border:1px solid #cccccc;" value="<?= htmlSpecialChars($wizard->getValue('dc')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('dc')) { ?> <?= $wizard->getError('dc') ?><?php } ?></td>
            
            
            <!-- --------------------------------------------- -->
           	<!-- ------------NUM. DE COMPTE----------------- -->
           	<!-- --------------------------------------------- -->  
           	
           	
             
              <td>Num. Compte<br/><input type="text" name="numcompte" maxlength="10" style="width:120px;" value="<?= htmlSpecialChars($wizard->getValue('numcompte')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('numcompte')) { ?> <?= $wizard->getError('numcompte') ?><?php } ?></td>
            
         	
            <!-- --------------------------------------------- -->
            <!-- ------------DNI------------ -->
            <!-- --------------------------------------------- -->
            
            
            
              
              <td>Dni<br /><input type="text" name="dni" maxlength="9" style="width:120px;" value="<?= htmlSpecialChars($wizard->getValue('dni')) ?>" /></td>
              <span class="advertise"><?php if ($wizard->isError('dni')) { ?> <?= $wizard->getError('dni') ?><?php } ?></td>
            </tr>

            
          </table>
            
          
        <?php } else if ($wizard->getStepName() == 'confirm') { ?>
        
 			<h2><?=$confirm?></h2>
          <table>
          
          	<tr>
              <td>Mail:</td>
              <td><?= $wizard->getValue('email') ?></td>
            </tr>
            
            <tr>
              <td>Contrasenya:</td>
              <td><?= $wizard->getValue('pass') ?></td>
            </tr>

            <tr>
              <td>Nom i Cognoms:</td>
              <td><?= $wizard->getValue('nom') ?> <?= $wizard->getValue('cognoms') ?> </td>
            </tr>

   
            
            <tr>
              <td>Direcció:</td>
              <td><?= $wizard->getValue('direccio') ?></td>
              <td><?= $wizard->getValue('cp') ?></td>
              <td><?= $wizard->getValue('poblacio') ?></td>
              <td><?= $wizard->getValue('provincies') ?></td>
            </tr>
            
            
            <tr>
              <td>Telèfon de contacte:</td>
              <td><?= $wizard->getValue('telefon') ?></td>
            </tr>
            
            
            <tr>
              <td>Plà escollit:</td>
              <td>
              
              <?php if ($wizard->getValue('plan') == '01') echo'Plan Liviano 11,90€'; ?>
              <?php if ($wizard->getValue('plan') == '02') echo'Plan Cinéfilo 15,90€'; ?>
              <?php if ($wizard->getValue('plan') == '03') echo'Plan Adicto 20,90€'; ?>
              
              
              </td>
            </tr>
            
            
            <tr>
              <td>Num. de Compte:</td>
              <td><?= $wizard->getValue('entitat') ?>&nbsp;<?= $wizard->getValue('oficina') ?>&nbsp;<?= $wizard->getValue('dc') ?>&nbsp;<?= $wizard->getValue('numcompte') ?></td>
            </tr>
            
            <tr>
              <td>DNI:</td>
              <td><?= $wizard->getValue('dni') ?></td>
            </tr>
            
            <!--<tr><td><input type="checkbox" value="1" name="termin" id="termin" />He leído y acepto los <a href="#">términos y condiciones de uso</a></td></tr>-->
			
			
			<tr>
              <td class="descrip"><a class="green" target="_blank" href="conditions.php?idioma=<?=$idioma?>">He llegit i accepto les condicions</a></td>
              <td><input type="checkbox" name="checkbox"/></td>
            </tr>
			
			
			
            
          </table>
        <?php } ?>
 
 
          <?php if ($wizard->isFirstStep()) {} else { echo'<input id="submit" type=image src="img/button_forward.png" name="previous" value="Previous"/>';}?>
          
          <? if ($wizard->isLastStep()) {
          
          echo '<input id="submit" type="submit" value="finish">';} else {
          
          echo '<input id="submit" type="submit" value="next">';} ?>
        
      </form>
      
       <div class="footer_inscripcio"></div>
          
    <?php } ?>
    
    

    
    </div>
  
   </div><!--tanca content-->
    
<?php include('footer.php')?>