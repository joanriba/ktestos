<?
//NOU THUMB QUADRAT CASTELLÀ
$imagen=$carpeta.$img_original;
$tamano= 260;
list($ancho, $alto) = getimagesize($imagen);

if($ancho>$alto)
{
	$new_alto = $tamano;
	$new_ancho = ($ancho/$alto)*$new_alto;
	
	$x = ($alto-$ancho)/2;
	$y = 0;
} else {
	$new_ancho = $tamano;
	$new_alto = ($alto/$ancho)*$new_ancho;
	
	$y = ($alto-$ancho)/2;
	$x = 0;
}

$img2 = imagecreatefromjpeg($imagen);
$nova = imagecreatetruecolor($tamano, $tamano);
imagecopyresampled($nova, $img2, 0,0,0,0, $new_ancho, $new_alto, $ancho, $alto);
imagejpeg($nova,$carpeta.$img_thu_es);

///////////////////////////////////
// COMENÇA LA CREACIÓ DEL MEDIUM CASTELLÀ
///////////////////////////////////

		$imagen=$carpeta.$img_original;
		$thumbWidth= 700;
		$thumbHeight=610;

		 // load image and get image size
      	$img2 = imagecreatefromjpeg($imagen);
      	$width = imagesx($img2);
      	$height = imagesy($img2);

		// calculate thumbnail size
     	if($width > $height){
     	$new_width = $thumbWidth;
      	$new_height = floor( $height * ( $thumbWidth / $width ) );}
      	
     	if($width < $height){
     	$new_height = $thumbHeight;
      	$new_width = floor( $width * ( $thumbHeight / $height ) );}
    
      
      	// esta será la nueva imagen reescalada
		$nova = imagecreatetruecolor($new_width,$new_height);

      	// create a new temporary image
     	$tmp_img = imagecreatetruecolor($new_width, $new_height);

      	// copy and resize old image into new image
      	imagecopyresampled( $nova, $img2, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		imagejpeg($nova,$carpeta.$img_med_es);

///////////////////////////////////
// COMENÇA LA CREACIÓ DEL BIG CASTELLÀ
///////////////////////////////////

		$novaWidth= 1000;
		$novaHeight=800;


		 // load image and get image size
      	$img2 = imagecreatefromjpeg($imagen);
      	$width = imagesx($img2);
      	$height = imagesy($img2);

		// calculate thumbnail size
     	if($width > $height){
     	$new_width = $novaWidth;
      	$new_height = floor( $height * ( $novaWidth / $width ) );}
      	
     	if($width < $height){
     	$new_height = $novaHeight;
      	$new_width = floor( $width * ( $novaHeight / $height ) );}
    
      
      	// esta será la nueva imagen reescalada
		$nova = imagecreatetruecolor($new_width,$new_height);

      	// create a new temporary image
     	$tmp_img = imagecreatetruecolor($new_width, $new_height);

      	// copy and resize old image into new image
      	imagecopyresampled( $nova, $img2, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		imagejpeg($nova,$carpeta.$img_big_es);
		
		
		
		
		
		
		
		
		
		
//NOU THUMB QUADRAT ANGLÈS
$imagen=$carpeta.$img_original;
$tamano= 260;
list($ancho, $alto) = getimagesize($imagen);

if($ancho>$alto)
{
	$new_alto = $tamano;
	$new_ancho = ($ancho/$alto)*$new_alto;
	
	$x = ($alto-$ancho)/2;
	$y = 0;
} else {
	$new_ancho = $tamano;
	$new_alto = ($alto/$ancho)*$new_ancho;
	
	$y = ($alto-$ancho)/2;
	$x = 0;
}

$img2 = imagecreatefromjpeg($imagen);
$nova = imagecreatetruecolor($tamano, $tamano);
imagecopyresampled($nova, $img2, 0,0,0,0, $new_ancho, $new_alto, $ancho, $alto);
imagejpeg($nova,$carpeta.$img_thu_en);

///////////////////////////////////
// COMENÇA LA CREACIÓ DEL MEDIUM ANGLÈS
///////////////////////////////////

		$imagen=$carpeta.$img_original;
		$thumbWidth= 700;
		$thumbHeight=610;

		 // load image and get image size
      	$img2 = imagecreatefromjpeg($imagen);
      	$width = imagesx($img2);
      	$height = imagesy($img2);

		// calculate thumbnail size
     	if($width > $height){
     	$new_width = $thumbWidth;
      	$new_height = floor( $height * ( $thumbWidth / $width ) );}
      	
     	if($width < $height){
     	$new_height = $thumbHeight;
      	$new_width = floor( $width * ( $thumbHeight / $height ) );}
    
      
      	// esta será la nueva imagen reescalada
		$nova = imagecreatetruecolor($new_width,$new_height);

      	// create a new temporary image
     	$tmp_img = imagecreatetruecolor($new_width, $new_height);

      	// copy and resize old image into new image
      	imagecopyresampled( $nova, $img2, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		imagejpeg($nova,$carpeta.$img_med_en);

///////////////////////////////////
// COMENÇA LA CREACIÓ DEL BIG ANGLÈS
///////////////////////////////////

		$novaWidth= 1000;
		$novaHeight=800;


		 // load image and get image size
      	$img2 = imagecreatefromjpeg($imagen);
      	$width = imagesx($img2);
      	$height = imagesy($img2);

		// calculate thumbnail size
     	if($width > $height){
     	$new_width = $novaWidth;
      	$new_height = floor( $height * ( $novaWidth / $width ) );}
      	
     	if($width < $height){
     	$new_height = $novaHeight;
      	$new_width = floor( $width * ( $novaHeight / $height ) );}
    
      
      	// esta será la nueva imagen reescalada
		$nova = imagecreatetruecolor($new_width,$new_height);

      	// create a new temporary image
     	$tmp_img = imagecreatetruecolor($new_width, $new_height);

      	// copy and resize old image into new image
      	imagecopyresampled( $nova, $img2, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		imagejpeg($nova,$carpeta.$img_big_en);
		
	
		
?>