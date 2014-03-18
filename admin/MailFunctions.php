<?
function traspas_correcte($email, $nom, $idioma)
        {  
			global $head_cat,$head_esp,$foot_cat,$foot_esp,$traspas_correcte_cat,$traspas_correcte_esp,$headers2;
            include('hola.php');
        
			$to= $email;
			$subject_cat = "Has renovat la teva subscripció a Cinemapost Correctament!";
			$subject_esp = "Has renovado tu suscripción a Cinemapost correctamente"; 
			$message_cat= $head_cat.$traspas_correcte_cat.$foot_cat;
			$message_esp= $head_esp.$traspas_correcte_esp.$foot_esp;
			$headers;
			
			if($idioma=='cat') {$message=$message_cat and $subject=$subject_cat;} else {$message=$message_esp and $subject=$subject_esp;}

			//Envia el mail
			mail($to, $subject, $message, $headers); 
		}
        
?>