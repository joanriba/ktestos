<?
//El correu on arribaran les alertes de nous membres
$mailadmin='info@uebs.cat';

//Email que s'enviarà al pare que acaba de realitzar una inscripció
function traspas_correcte($email, $nom, $pass, $idioma)
        {  
			global $head_cat,$head_esp,$foot_cat,$foot_esp,$formcorrecte_ca,$formcorrecte_es,$headers2;
            include('MailConstruct.php');
        
			$to= $email;
			$subject_cat = "La teva inscripció s'ha realitzat correctament";
			$subject_esp = "Tu inscripción se ha realizado correctamente"; 
			$message_cat= $head_cat.$formcorrecte_ca.$foot_cat;
			$message_esp= $head_esp.$formcorrecte_es.$foot_esp;
			$headers;
			
			if($idioma=='ca') {$message=$message_cat and $subject=$subject_cat;} else {$message=$message_esp and $subject=$subject_esp;}

			//Envia el mail
			mail($to, $subject, $message, $headers); 
		}
        

//Email que s'enviarà a l'administrador de Kinobs per avisar que hi ha un nou membre
function noumembre($email, $nom, $cognoms, $telefon1, $telefon2, $id, $idioma)
        {  
			global $head_cat,$head_esp,$foot_cat,$foot_esp,$noumembre,$headers2;
            include('MailConstruct.php');
        
			$to= 'info@uebs.cat';
			$subject = "Nova inscripció a les activitats de Kinobs";
			$message= $head_cat.$noumembre.$foot_cat;
			$headers;
			
			//Envia el mail
			mail($to, $subject, $message, $headers); 
		}
        
?>