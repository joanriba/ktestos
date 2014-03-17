<?php 
$cxn = mysql_connect('localhost','root','root');
//$cxn = mysql_connect('qqn276.futurecobioscience.com','qqn276','Fb1234321');
mysql_query("SET NAMES  'utf8'");
mysql_query('SET character_set_client = utf8;');
mysql_query('SET character_set_results = utf8;');
mysql_select_db('kinobs',$cxn);
//mysql_select_db('ikinobs',$cxn);
?>