	<h3>Dades bancàries</h3>
			
			
			<label for="entitat">Entitat bancària</label>			
			<input type="text" name="entitat" value="" required>
			
			
			<label for="titular">Titular compte bancari</label>			
			<input type="text" name="titular" value="" required>
			
				
				<!--select forma de pagament-->
			<label for="formapago">Forma de pagament</label>
						<select name="formapago" required>
							<option value=""></option>		
							<option value="transf">Transferència bancaria</option>
							<option value="efectiu">Efectiu</option>
						</select>
						
						
		<table>      
              <tr>
              <td>Entitat<br><input type="text" name="pentitat" maxlength="4" style="width:50px;" value="" required/></td>
              <td>Oficina<br><input type="text" name="oficina" maxlength="4" style="width:50px;" value="" required/></td>
              <td>DC<br><input type="text" name="dc" maxlength="2" style="width:27px; border:1px solid #cccccc;" value="" required/></td>
              <td>Num. Compte<br><input type="text" name="numcompte" maxlength="10" style="width:120px;" value="" required/></td>       
              </tr>
          </table>




	<h3>Dades bancàries</h3>
			Entitat bancària: <?=$_POST[entitat]?><br>
			<input type="hidden" name="entitat" value="<?=$_POST[entitat]?>">
			Titular compte bancari: <?=$_POST[titular]?><br>
			<input type="hidden" name="titular" value="<?=$_POST[titular]?>">
			Forma de pagament: <?=$_POST[formapago]?><br>
			<input type="hidden" name="formapago" value="<?=$_POST[formapago]?>">
			Número de compte: 
			<?=$_POST[pentitat]?>
			<input type="hidden" name="pentitat" value="<?=$_POST[pentitat]?>"> 
			<?=$_POST[oficina]?>
			<input type="hidden" name="oficina" value="<?=$_POST[oficina]?>"> 
			<?=$_POST[dc]?>
			<input type="hidden" name="dc" value="<?=$_POST[dc]?>"> 
			<?=$_POST[numcompte]?> 
			<input type="hidden" name="numcompte" value="<?=$_POST[numcompte]?>">        