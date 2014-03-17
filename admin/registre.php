<?php include('security.php');?>
<?php include('../bdcon.php');?>
<?php include('menu.php');?>


<body>
<form method="post" action="registre_procesa.php"  enctype="multipart/form-data">
<table width='450' border='0' style='margin-bottom:10px; padding:6px; padding:10px; width:450px; height:auto; background-color:#e0e1da;
border: 4px solid #fff; border-radius: 10px; -ms-border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px; -khtml-border-radius: 10px; '>
<tr>
<td align="right">Alias/Nom Curt: <input maxlength="25" 
size="15" name="nick" /><br /><em><span style='font:8pt Arial,Verdana; color:red;'>Quan et loguegis se't demanarà aquest nom</span></em></td></tr>

<tr>
<td align="right">Nom: <input maxlength="25" 
size="15" name="nom" /> </td></tr>

<tr>
<td align="right">Cognom: <input maxlength="25" 
size="15" name="cognom" /> </td></tr>

<tr>
<td align="right">Password: <input type="password" maxlength="25" 
size="15" name="password" /> </td></tr>
<tr>
<td align="right">Repeteix el Password: <input type="password" maxlength="25" 
size="15" name="repeatpassword" /> </td></tr>

<tr>
<td align="right">
<select name="nivell"> 
<option value="">Selecciona el teu poder</option> 
<option value="A">Administrador</option>
<option value="B">Editor</option>
</select></br></br></td>
</tr>

<tr>
<td align="right">Selecciona una imatge que et representi:<br/><input type="file" name="adjuntar"><br />
<span style='font:8pt Arial,Verdana; color:red;'>Cal que sigui una imatge quadrada (Ex: 60x60px)</span></td>
</tr>

<tr>
<td align="center"><input type="submit" value="Registrar" /></td></tr>
</table>
</form>

</body>
</html>