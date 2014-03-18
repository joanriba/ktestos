<?
$Name = "Kinobs Inscripcions"; //senders name 
$mailnostre = "no-reply@kinobs.es"; //senders e-mail adress

//headers
$headers = "From: ".$Name."<".$mailnostre.">\r\n";
$headers .= "Reply-To: info@kinobs.es \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf-8\r\n";

$headers2 = "From: ".$Name."<".$mailnostre.">\r\n";
$headers2 .= "Reply-To: info@kinobs.es \r\n";
$headers2 .= "MIME-Version: 1.0\r\n";
$headers2 .= "Content-Type: text/html; charset=utf-8\r\n";
$headers2 .= "Cc: info@uebs.cat\r\n"; 

$headers3 = "From: ".$Name."<".$mailnostre.">\r\n";
$headers3 .= "Reply-To: info@kinobs.es \r\n";
$headers3 .= "MIME-Version: 1.0\r\n";
$headers3 .= "Content-Type: text/html; charset=utf-8\r\n";
$headers3 .= "Cc: info@uebs.cat\r\n"; 
 

//INVARIANTS HEADERS - cat - esp
$head_cat='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mail de confirmacio</title>
</head><body bgcolor="#dbc0dd" style="margin-bottom:20px; background-color:#dbc0dd;font-family: Lucida, sans-serif;font:9pt Verdana;color:#2b2b2b;margin-top:0px;"><div style="width:800px;margin-left:50px;margin-top:50px;padding:20px;background-color:#ffffff;border:3px solid #efefef;-webkit-border-top-left-radius: 11px;-webkit-border-top-right-radius: 11px;-moz-border-radius-topleft: 11px;-moz-border-radius-topright: 11px;border-top-left-radius: 11px;border-top-right-radius: 11px;"><div style="text-transform:capitalize; font-style:bold; font-weight:700; margin-bottom:10px; font-size:1em;color:#2b2b2b;">';

$head_esp = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Correo de confirmación</title>
</head><body bgcolor="#dbc0dd" style="margin-bottom:20px; background-color:#dbc0dd;font-family: Lucida, sans-serif;font:9pt Verdana;color:#2b2b2b;margin-top:0px;"><div style="width:800px;margin-left:50px;margin-top:50px;padding:20px;background-color:#ffffff;border:3px solid #efefef;-webkit-border-top-left-radius: 11px;-webkit-border-top-right-radius: 11px;-moz-border-radius-topleft: 11px;-moz-border-radius-topright: 11px;border-top-left-radius: 11px;border-top-right-radius: 11px;"><div style="text-transform:capitalize; font-style:bold; font-weight:700; margin-bottom:10px; font-size:1em;color:#2b2b2b;">';

//INVARIANTS FOOTERS - cat - esp
$foot_cat='Atentament,<br/><br/>


<table width="400" cellpadding="0" cellspacing="0">
<tr>

<td style=”line-height:1px;”>
<img style=”display:block” src="http://www.cinemapost.es/1.png" width="135" height="69" border="0" galleryimg=”no” alt="logotip de cinemapost"/><br/>CINEMAPOST.ES<br/>C/Mercaders nº7 Baixos<br/>17004 Girona<br/><a href="http://www.kinobs.es">www.kinobs.es</a><br/>info@kinobs.es
</td>

<td style=”line-height:1px;”><img style=”display:block” src="http://www.cinemapost.es/5.png" width="201" height="63" border="0" galleryimg="no" alt=""/></td>

<td valign="bottom" style=”line-height:1px;”>
<a href="http://www.facebook.com/home.php?#!/pages/CINEMAPOSTES/112056832163452?ref=ts" target="_blank"><img style=”display:block” style="margin-top:1px;" src="http://www.cinemapost.es/3.png" galleryimg=”no” alt="facebook" width="100" height="30" border="0"/></a>
</td>
<td valign="bottom" style=”line-height:1px;”>
<a href="http://twitter.com/CINEMAPOSTES" target="_blank"><img style=”display:block” src="http://www.cinemapost.es/2.png" galleryimg=”no” alt="twitter" width="78" height="30" border="0"/></a>
</td>

</tr>
</table><br/>


<img style=”display:block” src="http://www.cinemapost.es/4.png" galleryimg="no" alt="fila" width="798" height="8" border="0"/></div><div style="padding:20px; margin-left:50px;border:3px solid #efefef; background-color:#efefef;width:800px;-webkit-border-bottom-right-radius: 11px;-webkit-border-bottom-left-radius: 11px;-moz-border-radius-bottomright: 11px;-moz-border-radius-bottomleft: 11px;
border-bottom-right-radius: 11px;border-bottom-left-radius: 11px; font-size:0.7em;">En compliment del que disposa la Llei Orgànica 15/1999 de Protecció de dades de caràcter personal, "CINEMAPOST.ES" l\'informa que les seves dades personals, nom, cognom i direcció de correu electrònic, estan incorporades en un fitxer automatitzat, titularitat de Federico A. Vega. Si ho desitja pot exercir el seu dret d\'accés, rectificació i cancelació, precistos per la llei, dirigint-se a "CINEMAPOST.ES"	en un escrit per correu electrònic o a la següent direcció postal: Cinemapost.es C/Mercaders nº7 Baixos 17004 Girona. En aquesta mateixa direcció pot obtenir més informació sobre la política de privacitat de l\'entitat.
</div></body></html>';

$foot_esp='<br/>Atentamente,<br/><br/>


<table width="400" cellpadding="0" cellspacing="0">
<tr>

<td style=”line-height:1px;”>
<img style=”display:block” src="http://www.cinemapost.es/1.png" width="135" height="69" border="0" galleryimg=”no” alt="cinemapost"/><br/>CINEMAPOST.ES<br/>C/Mercaders nº7 Baixos<br/>17004 Girona<br/><a href="http://www.kinobs.es">www.kinobs.es</a><br/>info@kinobs.es
</td>

<td style=”line-height:1px;”><img style=”display:block” src="http://www.cinemapost.es/5.png" width="201" height="63" border="0" galleryimg="no" alt=""/></td>

<td valign="bottom" style=”line-height:1px;”>
<a href="http://www.facebook.com/home.php?#!/pages/CINEMAPOSTES/112056832163452?ref=ts" target="_blank"><img style=”display:block” style="margin-top:1px;" src="http://www.cinemapost.es/3.png" galleryimg=”no” alt="facebook" width="100" height="30" border="0"/></a>
</td>
<td valign="bottom" style=”line-height:1px;”>
<a href="http://twitter.com/CINEMAPOSTES" target="_blank"><img style=”display:block” src="http://www.cinemapost.es/2.png" width="78" height="30" border="0" galleryimg=”no” alt="twitter"/></a>
</td>

</tr>
</table><br/>


<img style=”display:block” src="http://www.cinemapost.es/4.png" galleryimg="no" alt="fila" width="798" height="8" border="0"/></div><div style="padding:20px; margin-left:50px;border:3px solid #efefef; background-color:#efefef;width:800px;-webkit-border-bottom-right-radius: 11px;-webkit-border-bottom-left-radius: 11px;-moz-border-radius-bottomright: 11px;-moz-border-radius-bottomleft: 11px;border-bottom-right-radius: 11px;border-bottom-left-radius: 11px; font-size:0.7em;">
En cumplimiento de lo que dispone la Lei Orgánica 15/1999 de Protección de datos de carácter personal, "CINEMAPOST.ES" le informa que sus datos personales, nombre, apellido y dirección de correo electrónico, estan incorporadas en un fichero automatizado, titularidad de Federico A. Vega.<br/>Si lo desea puede ejercer su derecho de acceso, rectificación y cancelación, previstos por la ley, dirigiéndose a "CINEMAPOST.ES" en un escrito por correo electrónico o a la siguiente dirección postal: Cinemapost.es C/Mercaders nº7 Baixos 17004 Girona. En esta missma dirección puede obtener mas información sobre la política de privacidad de la entidad.</div></body></html>';

//TRASPASS CORRECTE
$traspas_correcte_cat='Hola '.$nom.',</div> La teva subscripció ha sigut renovada correctament! A partir d\'ara et cobrarem mensualment l\'import del pla del que disposes actualment.<br/><br/><img style=”display:block” src="http://www.cinemapost.es/admin/img/'.$pla.'_cat.png"/><br/><br/>Recorda que pots canviar fàcilment de pla des de la teva àrea de client.<br/><br/>Gràcies per seguir amb nosaltres. Esperem que segueixis gaudint del servei '.$nom.'!<br/><br/>';

$traspas_correcte_esp='Hola '.$nom.',</div> Tu suscripción ha sido renovada correctamente. A partir de ahora te cobraremos mensualmente el importe del plan del que disfrutas actualmente.<br/><br/><img style=”display:block” src="http://www.cinemapost.es/admin/img/'.$pla.'_esp.png"/><br/><br/>Recuerda que puedes cambiar de plan fácilmente des de tu area de cliente.<br/><br/>Gracias por continuar con nosotrsos. ¡Esperamos que sigas disfrutando del servicio '.$nom.'!<br/><br/>';


?>