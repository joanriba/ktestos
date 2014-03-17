<?php 
	$idioma=$_POST[idioma];
	include('bdcon.php');
    require_once('ZervWizard.class.php');
 
    class CheckoutWizard extends ZervWizard
    {
        function CheckoutWizard()
        {
            // start the session and initialize the wizard
            session_start();
            parent::ZervWizard($_SESSION, __CLASS__);
 
 
            // create the steps, we're only making a simple 3 step form
          	
          	@$this->addStep('login');
            @$this->addStep('userdetails');
            @$this->addStep('complements');
            @$this->addStep('billingdetails');
            @$this->addStep('confirm');
        }
 
        // here we prepare the user details step. all we really need to
        // do for this step is generate the list of countries.
 		
 		
 	   function process_login(&$form)
 	   {
 	   		
 	   		//VERIFICA EL NOM//////////////////////////////////////////////////////////////////////
            $fill1 = $this->coalesce($form['fill1']);
            if (strlen($fill1) > 0 && !is_numeric($fill1))
                $this->setValue('fill1', $fill1);
            else
                $this->addError('fill1', 'Si us plau, escriu almenys un nom vàlid');
 	   		 	   		
 	   
 	   		
 	   		$idioma=$this->coalesce($form['idioma']);
 	   		$this->setValue('idioma', $idioma);
 	   
 	  		                  
            return !$this->isError();
        
 	   }
 		
 		///////////////////////////////////////////////////////////////////////////////////////////
 	
 		function prepare_userdetails(&$form){
 		@$this->loadProvincies();
        @$this->loadComvas(); 
 		}
 
        function process_userdetails(&$form)
        {	
            //VERIFICA EL NOM//////////////////////////////////////////////////////////////////////
            $nom = $this->coalesce($form['nom']);
            if (strlen($nom) > 0 && !is_numeric($nom))
                $this->setValue('nom', $nom);
            else
                $this->addError('nom', 'Si us plau, escriu el teu nom');
                
             //VERIFICA EL COGNOM//////////////////////////////////////////////////////////////////
            $cognoms = $this->coalesce($form['cognoms']);
            if (strlen($cognoms) > 1 && !is_numeric($cognoms))
                $this->setValue('cognoms', $cognoms);
            else
                $this->addError('cognoms', 'Si us plau, escriu uns cognoms vàlids');
                
            //VERIFICA LA DIRECCIO//////////////////////////////////////////////////////////////////
            $direccio = $this->coalesce($form['direccio']);
            if (strlen($direccio) > 8 && !is_numeric($direccio))
                $this->setValue('direccio', $direccio);
            else
                $this->addError('direccio', 'Si us plau, escriu una direcció vàlida');
                
            //VERIFICA CODI POSTAL//////////////////////////////////////////////////////////////////
            $cp = $this->coalesce($form['cp']);
            if (strlen($cp) == 5 && is_numeric($cp))
                $this->setValue('cp', $cp);
            else
                $this->addError('cp', 'Si us plau, escriu un codi postal vàlid');
            
 			
 			 //VERIFICA POBLACIO//////////////////////////////////////////////////////////////////
            $poblacio = $this->coalesce($form['poblacio']);
            if (strlen($poblacio) > 1 && !is_numeric($poblacio)) $this->setValue('poblacio', $poblacio); else $this->addError('poblacio', 'Si us plau, escriu un poble vàlid');
 			
 			
 			 //VERIFICA EL TELÈFON//////////////////////////////////////////////////////////////////
            $telefon = $this->coalesce($form['telefon']);
            if (strlen($telefon) > 8 && is_numeric($telefon)) $this->setValue('telefon', $telefon); else $this->addError('telefon', 'Si us plau, escriu un telèfon de contacte vàlid');
 			
 
	        //VERIFICA PROVINCIA///////////////////////////////////////////////////////////////////
            $provincies = $this->coalesce($form['provincies']);
            $this->loadProvincies();
            if (in_array($provincies, $this->provincies)) $this->setValue('provincies', $provincies);
            else $this->addError('provincies', 'Selecciona la teva província');
            
            
 			  //VERIFICA COM VAS CONÈIXER CINEMAPOST/////////////////////////////////////////////////
            $comvas = $this->coalesce($form['comvas']);
            $this->loadComvas();
            if (array_key_exists($comvas, $this->comvas)) $this->setValue('comvas', $comvas);
            else $this->addError('comvas', 'Selecciona la forma en com vas conèixer cinemapost');
          
 			return !$this->isError(); }
 		
 			
 		function prepare_complements(){ $this->loadPlan();}
 		
 		function process_complements(&$form) {
 			
 			$plan = $this->coalesce($form['plan']);
            $this->loadPlan();
 			if (array_key_exists($plan, $this->plan)) $this->setValue('plan', $plan); else $this->addError('plan', 'Si us plau, selecciona el teu plà');
              
            return !$this->isError();
        }
 		
 
        function process_billingdetails(&$form)
        {
            
            
            
            //VERIFICA ENTITAT////////////////////////////////////////////////////////////////////
            $entitat = $this->coalesce($form['entitat']);
            if (strlen($entitat) == 4 && is_numeric($entitat)) $this->setValue('entitat', $entitat); else $this->addError('entitat', 'El Num. d\'entitat ha de tenir 4 dígits');
            
            //VERIFICA OFICINA////////////////////////////////////////////////////////////////////
            $oficina = $this->coalesce($form['oficina']);
            if (strlen($oficina) == 4 && is_numeric($oficina)) $this->setValue('oficina', $oficina); else $this->addError('oficina', 'El Num. d\'oficina ha de tenir 4 dígits');
 			
 			//VERIFICA DC////////////////////////////////////////////////////////////////////
            $dc = $this->coalesce($form['dc']);
            if (strlen($dc) == 2 && is_numeric($dc)) $this->setValue('dc', $dc); else $this->addError('dc', 'El Num. DC ha de tenir 2 dígits');
 			
 			//VERIFICA NUMCOMPTE////////////////////////////////////////////////////////////////////
            $numcompte = $this->coalesce($form['numcompte']);
            if (strlen($numcompte) == 10 && is_numeric($numcompte)) $this->setValue('numcompte', $numcompte); else $this->addError('numcompte', 'El Num. de compte ha de tenir 10 dígits');
            
            
            
            //VERIFICA DNI////////////////////////////////////////////////////////////////////
            $dni = $this->coalesce($form['dni']);
            if (strlen($dni) == 9) $this->setValue('dni', $dni); else $this->addError('dni', 'Si us plau, escriu un dni vàlid');
            
            // Comprovem si el dni ja existeix
			$checkdni = mysql_query("SELECT dni FROM users WHERE dni='$dni'");
			$existeix_dni = mysql_num_rows($checkdni); 
			if ($existeix_dni>0) $this->addError('dni','Aquest DNI ja està en ús');
            
            
 
            return !$this->isError();
        }
 
        
        function process_confirm(&$form)
        {
        	
            //VERIFICA EL CHECKBOX//////////////////////////////////////////////////////////////////
            $checkbox = $this->coalesce($form['checkbox']);
            if ($checkbox=="0") {$this->addError('checkbox', 'Has de llegir termes i condicions');} else {$this->setValue('checkbox', $checkbox);} 			
        
            $confirm = (bool) $this->coalesce($form['confirm'], true);
 
            return $confirm;
        	
 
            return $confirm;
        }
 
 
        function completeCallback()
        {
 
            $this->sendUserConfirmationEmail($this->getValue('email'));
        }
 
 
 
 		function sendUserConfirmationEmail($email)
		{
		
			$nom = $this->getValue('nom');
            $pass = $this->getValue('pass');
            $provincia = $this->getValue('provincies');
            
			global $head_cat,$head_esp,$foot_cat,$foot_esp,$wellcome_cat,$wellcome_esp,$headers;
            include('admin/hola.php');
        
			$to= $email;
			$subject_cat = "Benvingut/a a Cinemapost";
			$subject_esp = "Bienvenido/a a Cinemapost";
			$message_cat= $head_cat.$wellcome_cat.$foot_cat;
			$message_esp= $head_esp.$wellcome_esp.$foot_esp;
			$headers;
			
   			if($provincia=="Girona" or $provincia=="Barcelona" or $provincia=="Tarragona" or $provincia=="Lleida") {$subject=						$subject_cat and $message=$message_cat;} else {$subject=$subject_esp and $message=$message_esp;};

			//Envia el mail
			mail($to, $subject, utf8_decode($message), $headers); 	
		}				

  
        /*** Miscellaneous utility functions*/
 
 
        function isValidEmail($email)
        {
            return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i', $email);
        }
 
 
		function loadDies() {$this->dies = array('01','02','03','04','05','06','07','08','09','10',  
'11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');}



 		
 		    

        
        function loadPlan() {$this->plan = array('01'=>'Plan Liviano 12,90€', '02'=>'Plan Cinéfilo 16,90€', '03'=>'Plan adicto 21,90€');}
       
    }
?>