<?
include('security.php');
$idioma=$_GET[idioma];
if($idioma==""){ $idioma='ca';}
include('bdcon.php');
include('header.php');
?>






<div class="bandformtutor">
	<div class="container">
		<div class="sixteen columns">
		
		
		
		<? if(isset($_POST['submit'])){
		
		
		$result = mysql_query("update pares set tel1='$_POST[tel1]', tel2='$_POST[tel2]', tel3='$_POST[tel3]', email1='$_POST[email1]', dni='$_POST[dni]', famnum='$_POST[famnum]', fammono='$_POST[fammono]' where id='$_POST[id]'", $cxn);

//tornem enrere
echo '<script>document.location = "panell.php?idioma='.$_POST[idioma].'"</script>';

	
		
	
} else { ?>
		
		
		
		
		<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from pares where id='$_GET[id]'",$cxn);
while($row=mysql_fetch_array($consulta)){
$nom=$row[nom];$cognoms=$row[cognoms];$tel1=$row[tel1];$tel2=$row[tel2];$tel3=$row[tel3];$email1=$row[email1]; $email2=$row[email2]; $dni=$row[dni];
$famnum=$row[famnum];$fammono=$row[fammono]; $entitat=$row[entitat]; $numcompte=$row[numcompte]; $titular=$row[titular]; $formapago=$row[formapago]; $observacions=$row[observacions];}
?>    

		
			
			<form method="post" action="?" enctype="multipart/form-data">
			
			<!-- la id en el cas de que estiguem editant-->
			<input type="hidden" name="id" value="<?=$_GET[id]?>">	
			<input type="hidden" name="idioma" value="<?=$idioma?>">					
						
						
			<label for="tel1">Telèfon 1</label>			
			<input type="text" name="tel1" value="<?=$tel1?>">

			<label for="tel2">Telèfon 2</label>			
			<input type="text" name="tel2" value="<?=$tel2?>">
			
			<label for="tel3">Telèfon 3</label>			
			<input type="text" name="tel3" value="<?=$tel3?>">
			
			<hr size="3">
			
			<label for="email1">Email 1</label>			
			<input type="text" name="email1" value="<?=$email1?>">
			<small>Si modifiques el teu correu es pot donar el cas de que t'hagis de loguejar de nou</small>
			
			
			<label for="dni">DNI</label>			
			<input type="text" name="dni" value="<?=$dni?>">

			
			<label for="fammono">Numero carnet família monoparental</label>			
			<input type="text" name="fammono" value="<?=$fammono?>">
			
			<label for="famnum">Numero carnet família nombrosa</label>			
			<input type="text" name="famnum" value="<?=$famnum?>">

													
			
			<input type="submit" value="Guardar" name="submit"/>
			</form>

			

						
		</div><!--end sixteen-->
	</div>
</div>

<? } ?>