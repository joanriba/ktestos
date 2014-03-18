       
              <td class="descrip">Pass</td>
              <td><input type="password" name="pass" value="<?= htmlSpecialChars($wizard->getValue('pass')) ?>" />
              <span class="advertise"><?php if ($wizard->isError('pass')) { ?><?= $wizard->getError('pass') ?><?php } ?>
            
            
            
              <td class="descrip">repass</td>
              <td><input type="password" name="repass" value="<?= htmlSpecialChars($wizard->getValue('repass')) ?>" />
              <span class="advertise"><?php if ($wizard->isError('repass')) { ?><?= $wizard->getError('repass') ?><?php } ?>
     
     
     
     
     
     //VERIFICA EMAIL//////////////////////////////////////
        	 $fill1 = $this->coalesce($form['fill1']);
            if ($this->isValidEmail($fill1))
                $this->setValue('fill1', $fill1);
            else
                $this->addError('email', 'Si us plau, escriu un nom vàlid');
 
 			
 			//VERIFICA EL PASS//////////////////////////////////////
            $pass = $this->coalesce($form['pass']);
            if (strlen($pass) > 0)
                $this->setValue('pass', $pass);
            else
                $this->addError('pass', 'Si us plau, escriu una contrasenya');
                
            //VERIFICA EL REPASS//////////////////////////////////////
            $repass = $this->coalesce($form['repass']);
            if ($pass == $repass)
                $this->setValue('repass', $repass);
            else
                $this->addError('repass', 'Les contrasenyes no es corresponen'); 
            

     
     
     
     
     
     
     // Comprobamos si el nombre de usuario o la cuenta de correo ya existÌan
			$checkuser = mysql_query("SELECT email FROM users WHERE email='$email'");
			$existeix_mail = mysql_num_rows($checkuser); 
			$checkpass = mysql_query("SELECT pass FROM users WHERE pass='$pass'");
			$existeix_password = mysql_num_rows($checkpass);
			if ($existeix_password>0|$existeix_mail>0)  $this->addError('email','Mail i usuari ja existeixen');
