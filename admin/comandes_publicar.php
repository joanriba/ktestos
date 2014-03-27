<?php 
include('security.php');
include('../bdcon.php');
include('menu.php');
?>


<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">

<? $id=$_GET[id];
//BORRAR
if($_GET[borrar]=="yes") {
$result = mysql_query("delete from comandes where id='$id'",$cxn);
echo '<script>document.location = "comandes.php"</script>';

} ?>


</div><!--tanca sixteen-->
</div><!--tanca container-->
</div><!--tanca bandadmin-->


<? include('footer.php');?>