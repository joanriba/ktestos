<?php
include_once('phpToPDF.php') ;

//contingut $html;
include('PdfBody.php');
//prenem el moment d'ara mateix per insertar en el nom del pdf
$ara= time();

//AMB TOT AIXÒ MUNTEM UN PDF DE COLLONS
phptopdf_html($html,'pdf/', $nomnet.'_'.$idpare.'_'.$ara.'.pdf');
echo '<a class="button" href="pdf/'.$nomnet.'_'.$idpare.'_'.$ara.'.pdf">Download PDF</a>';
?>