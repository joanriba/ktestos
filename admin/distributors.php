<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
?>


<? if(isset($_POST[enviar])){
	$country=$_POST[idcountry];
	$values = implode(",", $_POST['check_list']);
	mysql_query("update distributors set products='$values' where id='$_POST[idcountry]'",$cxn);
}
?>



<div class="bandcontent-admin distributors">
	<div class="container">
		<div class="sixteen columns"><h3>Distribuidors</h3></div>
		
		<div class="sixteen columns">
			
			<? $consulta=mysql_query("select country,products,id as idcountry from distributors where active='yes'",$cxn);
			while($row=mysql_fetch_array($consulta)){ 
				
				$countryprod=explode(',',$row[products]);	
			?>
			
			<h4><?=$row[country]?></h4>	
			
				<form method="post" action="?" name="<?=$row[idcountry]?>" enctype="multipart/form-data">
						<fieldset>
						<input type="hidden" name="idcountry" value="<?=$row[idcountry]?>">
		
				<? $productes=mysql_query("select * from products order by name asc",$cxn);
					while($raw=mysql_fetch_array($productes)){ ?>
												
						<input type="checkbox" name="check_list[]" value="<?=$raw[id]?>"    <? foreach($countryprod as $prod){  if($raw[id]==$prod){echo 'checked';}}?>><?=$raw[name]?>

					<? } ?>
					
						<script>
							$(function () {
							$('.checkall').on('click', function () {
							$(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
							});
							});
						</script>

						<input type="checkbox" class="checkall"> Check all
						
						</fieldset>
				
					<input type="submit" value="Actualitzar" name="enviar">
				</form>
				
				
			<? } ?>
			
			
		</div>


	</div><!--tanca container-->
</div><!-- tanca bandcontent-admin-->