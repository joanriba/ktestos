<?
function netejar($str){
	$str= trim($str);
	$str= ereg_replace( '\"+', '', $str);
	
	$str = str_replace("\'","",$str); //aquí eliminamos las comillas simples (')
	$str = str_replace('\"',"",$str); //eliminamos las comillas dobles (")
	$str = stripslashes($str);//al treure cometes poden quedar diagonals
	$str = explode("\\",$str);
	$str = implode("",$str);//ja tenim el valor sense comilles
	$str = strtolower($str);//minuscula
	$str = trim($str);//espais en blanc de les puntes
	
	$str = ereg_replace(' +','-',$str); //treiem blancs i hi posem guiones mitjos (-)
$b = array("á","é","í","ó","ú","ä","ë","ï","ö","ü","à","è","ì","ò","ù","ñ"," ",",",".",";",":","¡","!","¿","?","/","*","+","´","{","}","¨","â","ê","î","ô","û", "^","#","|","°","=","[","]","&lt;","&gt;","`","(",")","&amp;","%","$","¬", "@","Á","É","Í","Ó","Ú","Ä","Ë","Ï","Ö","Ü","Â","Ê","Î","Ô","Û","~","À", "È","Ì","Ò","Ù","_","\\","'"); //Estos arreglos nos ayudaran a reemplazar todos estos símbolos por letras que no causen problemas
$c = array("a","e","i","o","u","a","e","i","o","u","a","e","i","o","u","n","","","", "","","","","","","","","","","","","","a","e","i","o","u","","","","","", "","","","","","","","","","","","","A","E","I","O","U","A","E","I","O", "U","A","E","I","O","U","","A","E","I","O","U","-","","");
$str = str_replace($b,$c,$str); //Fem la substitució	
	
	return $str;
} 



function shorten($str, $n, $delim='...')
{
   $len = strlen($str);
   if ($len > $n) {
       preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches);
       return rtrim($matches[1]) . $delim;
   }
   else {
       return $str;
   }
}





function escursar($text, $char) {
    $text = substr($text, 0, $char); //First chop the string to the given character length
    if(substr($text, 0, strrpos($text, ' '))!='') $text = substr($text, 0, strrpos($text, ' ')); //If there exists any space just before the end of the chopped string take upto that portion only.
    //In this way we remove any incomplete word from the paragraph
    $text = $text.'...'; //Add continuation ... sign
    return $text; //Return the value
}



function abreviate($input,$width) {
            if(empty($input)) return $input ;
            
            if (strlen($input) <= $width) {
                return $input;
            }
            
            $output = substr($input,0,$width);
            
            //normals words are seldom more than 30 chars
            $pos = 0 ;
            $found = false ;
            
            for($i = $width ; $i >= 0 ; $i--) {
                 if(ctype_space($output[$i])) {
                    $found = true ;
                    break ;
                 }
                 $pos++ ;
            }
            
            if($found && ($pos > 0)) {
                $output = substr($output,0,($width-$pos));
                $output = rtrim($output) ;
            }
            
            $output .= '...' ;
            return $output;
        }
        
?>