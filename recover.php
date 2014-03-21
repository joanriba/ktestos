<?php
$idioma=$_GET[idioma];
if($idioma==''){ $idioma='ca';} 
include('header.php');
include('bdcon.php');
include('admin/MailFunctions.php');
?>


	<div class="bandform">
	<div class="container">
		<div class="sixteen columns">
			
		
	
	<? if(isset($_POST['submit'])){
	
			
		$sql=mysql_query("SELECT email1 from pares WHERE email1='$_POST[email]'",$cxn);
		if(mysql_num_rows($sql)>=1)
		{
			
			//El mail existeix!!
			
			
			//Generem un password pel pare
			$paraula='prov';
			$pass = md5($paraula.time()); 
			$pass2 = $paraula.time();
		
			$noupass='prov'.time();
			$noupass2=md5($noupass);
		
			$result = mysql_query("update pares set password='$pass' where email1='$_POST[email]'", $cxn);
	
		
		//enviem correu a la persona que ha perdut la contrasenya
		recuperar_pass($_POST[email], $pass2, $_POST[idioma]);
		
		
		//Mostrem el missatge segons l'idioma
		$message_ca='T\'acabem d\'enviar un correu perquè puguis recuperar la teva contrasenya. Moltes gràcies. <a href="index.php?idioma='.$_POST[idioma].'">Tornar a la pàgina d\'inici</a>';
		$message_es='Te acabamos de mandar un correo para que puedas recuperar tu contraseña. Muchas gracias. <a href="index.php?idioma='.$_POST[idioma].'">Volver a la página de inicio</a>';		
		
		if($_POST['idioma']=='ca'){ $message=$message_ca;} else if($_POST['idioma']=='es'){ $message=$message_es;}?>
	
		<p><?=$message?></p>
			
				


		<? } else { 
		
		
		//Mostrem el missatge segons l'idioma
		$message_ca='No tenim cap usuari registrat amb aquest correu. <a href="index.php?idioma='.$_POST[idioma].'">Tornar a la pàgina d\'inici</a>';
		$message_es='No tenemos a ningun usuario registrado con este correo. <a href="index.php?idioma='.$_POST[idioma].'">Volver a la página de inicio</a>';
		
		if($_POST['idioma']=='ca'){ $message=$message_ca;} else if($_POST['idioma']=='es'){ $message=$message_es;}?>
		
		<p><?=$message?></p>
  
    <?  } //end else mail existeix ?>
		
		
		
		
		
		
		
	
<? } else { ?>
 		
 	
		
		    <form method="POST" action="?">
		    
		    		<h3>He oblidat la meva contrasenya</h3>
      				
      				<label for="email">Escriu teu Email</label>
	      			<input id="email" name="email" type="text" >
	      			
	      			<input type="hidden" name="idioma" value="<?=$idioma?>">		      
	            	<input type="submit" name="submit" value="Recuperar"/>
	    
	        </form>
 
 
 

    <? } //tanca if submit ?>	
    
    </div>
  
   </div><!--tanca content-->
    
<?php include('footer.php')?>