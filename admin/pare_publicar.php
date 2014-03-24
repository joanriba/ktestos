<?php 
ini_set( "memory_limit", "600M" );
include('../bdcon.php');
include('security.php');
include('menu.php');
?>


<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">

<? 
$id=$_GET[id];

//PUBLICAR
if (isset ($_POST['enviar'])) {
mysql_query("INSERT INTO pares(nom,cognoms,tel1,tel2,tel3,email1,email2,dni,famnum,fammono,entitat,titular,formapago,observacions) VALUES('$_POST[nom]','$_POST[cognoms]','$_POST[tel1]','$_POST[tel2]','$_POST[tel3]','$_POST[email1]','$_POST[email2]','$_POST[dni]','$_POST[famnum]','$_POST[fammono]','$_POST[entitat]','$_POST[titular]','$_POST[formapago]','$_POST[observacions]')",$cxn);
echo '<script>document.location = "pares.php"</script>'; 
} ?>


<? 
//BORRAR
if($_GET[borrar]=="yes") {
$result = mysql_query("delete from pares where id='$id'",$cxn);
echo '<script>document.location = "pares.php"</script>';
} ?>


<? 
//EDITAR
if (isset($_POST['reenviar'])) {

$result = mysql_query("update pares set nom='$_POST[nom]', cognoms='$_POST[cognoms]', tel1='$_POST[tel1]', tel2='$_POST[tel2]', tel3='$_POST[tel3]', email1='$_POST[email1]', dni='$_POST[dni]', famnum='$_POST[famnum]', fammono='$_POST[fammono]', observacions='$_POST[observacions]' where id='$_POST[id]'", $cxn);

if(isset($_POST['nen'])){ echo '<script>document.location = "nen.php?id='.$_POST[nen].'"</script>'; }
//tornem enrere
echo '<script>document.location = "pares.php"</script>';
} ?>


<?
//COLOCAR DADES PER EDITAR
$consulta=mysql_query("select * from pares where id=$id",$cxn);
while($row=mysql_fetch_array($consulta)){
$nom=$row[nom];$cognoms=$row[cognoms];$tel1=$row[tel1];$tel2=$row[tel2];$tel3=$row[tel3];$email1=$row[email1]; $dni=$row[dni];
$famnum=$row[famnum];$fammono=$row[fammono]; $observacions=$row[observacions];}
?>    


<div class="bandcontent-admin">
	<div class="container">
		
				<div class="sixteen columns">		

<!--variem el títol segons si estem publicant o editant-->
<h1><? if(isset($id)) {echo'Editar dades del pare';} else {echo 'Insertar pare manualment';}?></h1>
      	   
				</div><!--end sixteen-->
			
			<div class="seven columns">
			
			
			<form method="post" action="?" enctype="multipart/form-data">
			
			<!-- la id en el cas de que estiguem editant-->
			<input type="hidden" name="id" value="<?=$id?>">					
			
			
			<input type="hidden" name="nen" value="<?=$_GET[nen]?>">
			
			<label for="nom">Nom del pare/mare/tutor legal</label>
			<input type="text" name="nom" value="<? if(isset($id)){ echo $nom;}?>">
			
			<label for="cognoms">Cognoms</label>
			<input type="text" name="cognoms" value="<? if(isset($id)){ echo $cognoms;}?>">
			
			<hr size="3">
						
			<label for="tel1">Telèfon 1</label>			
			<input type="text" name="tel1" value="<? if(isset($id)){ echo $tel1;}?>">

			<label for="tel2">Telèfon 2</label>			
			<input type="text" name="tel2" value="<? if(isset($id)){ echo $tel2;}?>">
			
			<label for="tel3">Telèfon 3</label>			
			<input type="text" name="tel3" value="<? if(isset($id)){ echo $tel3;}?>">
			
			<hr size="3">
			
			<label for="email1">Email 1</label>			
			<input type="text" name="email1" value="<? if(isset($id)){ echo $email1;}?>">
			
			<!--<label for="email2">Email 2</label>			
			<input type="text" name="email2" value="<? if(isset($id)){ echo $email2;}?>">-->
			
			<label for="dni">DNI</label>			
			<input type="text" name="dni" value="<? if(isset($id)){ echo $dni;}?>">



			
			<label for="fammono">Numero carnet família monoparental</label>			
			<input type="text" name="fammono" value="<? if(isset($id)){ echo $fammono;}?>">
			
			<label for="famnum">Numero carnet família nombrosa</label>			
			<input type="text" name="famnum" value="<? if(isset($id)){ echo $famnum;}?>">

						
			
			
			
			
			<!--<h3>Dades bancàries</h3>
			
			
			<label for="entitat">Entitat bancària</label>			
			<input type="text" name="entitat" value="<? if(isset($id)){ echo $entitat;}?>">
			
			
			<label for="titular">Titular compte bancari</label>			
			<input type="text" name="titular" value="<? if(isset($id)){ echo $titular;}?>">
			
	
			
				
			<label for="formapago">Forma de pagament</label>
						<select name="formapago">		
							<? if(isset($id)){ ?><option value="<?=$formapago?>">Actualment: <?=$formapago?></option><? } ?>
							<option value="transf">Transferència bancaria</option>
							<option value="efectiu">Efectiu</option>
						</select>
			-->
			
			<label for="observacions">Observacions</label>
			<textarea name="observacions"><? if(isset($id)){ echo $observacions;}?></textarea>
			
														
			
			<input type="submit" value="<? if(isset($id)){ echo 'Guardar';} else {echo 'Publicar';}?>" name="<? if(isset($id)){ echo 'reenviar';} else {echo 'enviar';}?>"/>
			</form>

			
			
		</div>

		
	</div><!--end container-->
		

</div><!--tanca sixteen-->
</div><!--tanca container-->
</div><!--tanca bandadmin-->


<? include('footer.php');?>