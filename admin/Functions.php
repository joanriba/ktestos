<?

function CreateThumb($path,$img){

$archivo = $path.$img;
$tamano = 200;
list($ancho, $alto) = getimagesize($archivo);
if($ancho>$alto)
{
    $new_alto = $tamano;
    $new_ancho = ($ancho/$alto)*$new_alto;

    $x = ($ancho-$alto)/2;
    $y = 0;
}
else {
    $new_ancho = $tamano;
    $new_alto = ($alto/$ancho)*$new_ancho;

    $y = ($alto-$ancho)/2;
    $x = 0;
}

$origen = imagecreatefromjpeg($archivo);
$temp = imagecreatetruecolor($tamano, $tamano);
imagecopyresampled($temp, $origen, 0, 0, $x, $y, $new_ancho, $new_alto, $ancho, $alto);


imagejpeg($temp, $path_destiny.$thumb, 100);
//imagedestroy($temp);
//imagedestroy($origen);

}



function shorten($text) { 

        // Change to the number of characters you want to display 
        $chars = 25; 

        $text = $text." "; 
        $text = substr($text,0,$chars); 
        $text = substr($text,0,strrpos($text,' ')); 
        $text = $text."..."; 

        return $text; 

    } 




?>