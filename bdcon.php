<?php 
//$cxn = mysql_connect('localhost','root','root');
$cxn = mysql_connect('nautilus.cat','joanuebs','uebs.cat');
mysql_query("SET NAMES  'utf8'");
mysql_query('SET character_set_client = utf8;');
mysql_query('SET character_set_results = utf8;');
mysql_select_db('ikinobs',$cxn);
//mysql_select_db('kinobs',$cxn);
?>