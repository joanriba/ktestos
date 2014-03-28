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
	
	//Comparem les contrasenyes
	if($_POST[noupassword] == $_POST[noupassword2]){
		
		$passwordfinal= md5($_POST[noupassword]);
		
		$result = mysql_query("update pares set password='$passwordfinal' where id='$_POST[id]'", $cxn);
		
		echo 'Contrasenya modificada amb èxit! <a href="panell.php?idioma='.$_POST[idioma].'">Tornar al Panell de control</a>';
		
	} else {
		
		echo '<a href="changepassword.php?id='.$_POST[id].'&idioma='.$_POST[idioma].'">Les contrasenyes no es corresponen. Torna-ho a intentar</a>';
	}
	
	
} else { ?>
		
				
		<form method="post" action="?">
			
			<input type="hidden" name="id" value="<?=$_SESSION[s_iduser]?>">
			<input type="hidden" name="idioma" value="<?=$idioma?>">
			
			<label for="noupassword">Nova Contrasenya</label>
			<input type="text" name="noupassword">
			
			<label for="repeatpassword">Repeteix la contrasenya</label>
			<input type="text" name="noupassword2">
			
			<input type="submit" name="submit" value="Canviar">
			
		</form>
				
		</div><!--end sixteen-->
	</div>
</div>

<? } ?>