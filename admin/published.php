<? include('../bdcon.php');
$result = mysql_query("update $_GET[table] set published='$_GET[status]' where id='$_GET[id]'", $cxn);
echo '<script>document.location = "'.$_GET[page].'.php?"</script>';
?>
