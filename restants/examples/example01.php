<?php
    include_once('phpToPDF.php') ;
    //Code to generate PDF file from specified URL
    phptopdf_url('http://work.carlus.cat/','pdf/', 'my_pdf_filename.pdf');
	echo "<a href='pdf/my_pdf_filename.pdf'>Download PDF</a>";
?> 