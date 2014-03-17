<?php

function FechaFormateada_ca($publi){
$ano = date('Y',$publi); //<-- Año
$mes = date('m',$publi); //<-- número de mes (01-31)
$dia = date('d',$publi); //<-- Día del mes (1-31)
$dialetra = date('w',$publi);  //Día de la semana(0-7)
switch($dialetra){
case 0: $dialetra="Diumenge"; break;
case 1: $dialetra="Dilluns"; break;
case 2: $dialetra="Dimarts"; break;
case 3: $dialetra="Dimecres"; break;
case 4: $dialetra="Dijous"; break;
case 5: $dialetra="Divendres"; break;
case 6: $dialetra="Dissabte"; break;
}
switch($mes) {
case '01': $mesletra="Gener"; break;
case '02': $mesletra="Febrer"; break;
case '03': $mesletra="Març"; break;
case '04': $mesletra="Abril"; break;
case '05': $mesletra="Maig"; break;
case '06': $mesletra="Juny"; break;
case '07': $mesletra="Juliol"; break;
case '08': $mesletra="Agost"; break;
case '09': $mesletra="Setembre"; break;
case '10': $mesletra="Octubre"; break;
case '11': $mesletra="Novembre"; break;
case '12': $mesletra="Desembre"; break;
}

if($mesletra=='Agost' or $mesletra=='Octubre' or $mesletra=='Abril'){ return "$dialetra, $dia d' $mesletra de $ano"; } else {return "$dialetra, $dia de $mesletra de $ano";}
}


function FechaFormateada_es($fecha){
$ano = date('Y',$fecha); //<-- Año
$mes = date('m',$fecha); //<-- número de mes (01-31)
$dia = date('d',$fecha); //<-- Día del mes (1-31)
$dialetra = date('w',$fecha);  //Día de la semana(0-7)
switch($dialetra){
case 0: $dialetra="Domingo"; break;
case 1: $dialetra="Lunes"; break;
case 2: $dialetra="Martes"; break;
case 3: $dialetra="Miércoles"; break;
case 4: $dialetra="Jueves"; break;
case 5: $dialetra="Viernes"; break;
case 6: $dialetra="Sábado"; break;
}
switch($mes) {
case '01': $mesletra="Enero"; break;
case '02': $mesletra="Febrero"; break;
case '03': $mesletra="Marzo"; break;
case '04': $mesletra="Abril"; break;
case '05': $mesletra="Mayo"; break;
case '06': $mesletra="Junio"; break;
case '07': $mesletra="Julio"; break;
case '08': $mesletra="Agosto"; break;
case '09': $mesletra="Septiembre"; break;
case '10': $mesletra="Octubre"; break;
case '11': $mesletra="Noviembre"; break;
case '12': $mesletra="Diciembre"; break;
}    
return "$dialetra, $dia de $mesletra de $ano";
}

function FechaFormateada_en($fecha){
$ano = date('Y',$fecha); //<-- Año
$mes = date('m',$fecha); //<-- número de mes (01-31)
$dia = date('d',$fecha); //<-- Día del mes (1-31)
$dialetra = date('w',$fecha);  //Día de la semana(0-7)
switch($dialetra){
case 0: $dialetra="Sunday"; break;
case 1: $dialetra="Monday"; break;
case 2: $dialetra="Tuesday"; break;
case 3: $dialetra="Wednesdey"; break;
case 4: $dialetra="Thursday"; break;
case 5: $dialetra="Friday"; break;
case 6: $dialetra="Saturday"; break;
}
switch($mes) {
case '01': $mesletra="January"; break;
case '02': $mesletra="February"; break;
case '03': $mesletra="March"; break;
case '04': $mesletra="April"; break;
case '05': $mesletra="May"; break;
case '06': $mesletra="June"; break;
case '07': $mesletra="July"; break;
case '08': $mesletra="August"; break;
case '09': $mesletra="September"; break;
case '10': $mesletra="October"; break;
case '11': $mesletra="November"; break;
case '12': $mesletra="December"; break;
}    
return "$dialetra, $dia of $mesletra of $ano";
//return "$dialetra, $mesletra $dia of $ano";
}

//----------------------------------------------------
function FechaFormateada_fr($fecha){
$ano = date('Y',$fecha); //<-- Año
$mes = date('m',$fecha); //<-- número de mes (01-31)
$dia = date('d',$fecha); //<-- Día del mes (1-31)
$dialetra = date('w',$fecha);  //Día de la semana(0-7)
switch($dialetra){
case 0: $dialetra="Dimanche"; break;
case 1: $dialetra="Lundi"; break;
case 2: $dialetra="Mardi"; break;
case 3: $dialetra="Mercredi"; break;
case 4: $dialetra="Jeudi"; break;
case 5: $dialetra="Vendredi"; break;
case 6: $dialetra="Samedi"; break;
}
switch($mes) {
case '01': $mesletra="Janvier"; break;
case '02': $mesletra="février"; break;
case '03': $mesletra="Mars"; break;
case '04': $mesletra="Avril"; break;
case '05': $mesletra="Mai"; break;
case '06': $mesletra="Juin"; break;
case '07': $mesletra="Juillet"; break;
case '08': $mesletra="Août"; break;
case '09': $mesletra="Septembre"; break;
case '10': $mesletra="Octobre"; break;
case '11': $mesletra="Novembre"; break;
case '12': $mesletra="Décembre"; break;
}    
return "$dialetra, $dia du $mesletra du $ano";
//return "$dialetra, $mesletra $dia $ano";
}
//-----------------------------------------------------








function Mes_ca($publi){

$mes = date('m',$fecha); //<-- número de mes (01-31)
switch($mes) {
case '01': $mesletra="Gener"; break;
case '02': $mesletra="Febrer"; break;
case '03': $mesletra="Març"; break;
case '04': $mesletra="Abril"; break;
case '05': $mesletra="Maig"; break;
case '06': $mesletra="Juny"; break;
case '07': $mesletra="Juliol"; break;
case '08': $mesletra="Agost"; break;
case '09': $mesletra="Setembre"; break;
case '10': $mesletra="Octubre"; break;
case '11': $mesletra="Novembre"; break;
case '12': $mesletra="Desembre"; break;
}    
return $mesletra;
}



function Mes_es($publi){

$mes = date('m',$publi); //<-- número de mes (01-31)
switch($mes) {
case '01': $mesletra="Enero"; break;
case '02': $mesletra="Febrero"; break;
case '03': $mesletra="Marzo"; break;
case '04': $mesletra="Abril"; break;
case '05': $mesletra="Mayo"; break;
case '06': $mesletra="Junio"; break;
case '07': $mesletra="Julio"; break;
case '08': $mesletra="Agosto"; break;
case '09': $mesletra="Septiembre"; break;
case '10': $mesletra="Octubre"; break;
case '11': $mesletra="Noviembre"; break;
case '12': $mesletra="Diciembre"; break;
}    
return $mesletra;
}



function Mes_en($publi){

$mes = date('m',$publi); //<-- número de mes (01-31)
switch($mes) {
case '01': $mesletra="January"; break;
case '02': $mesletra="February"; break;
case '03': $mesletra="March"; break;
case '04': $mesletra="April"; break;
case '05': $mesletra="May"; break;
case '06': $mesletra="June"; break;
case '07': $mesletra="July"; break;
case '08': $mesletra="August"; break;
case '09': $mesletra="September"; break;
case '10': $mesletra="October"; break;
case '11': $mesletra="November"; break;
case '12': $mesletra="December"; break;
}    
return $mesletra;
}


function Dia_ca($publi){
$dia = date('d',$publi); //<-- Día del mes (1-31)
$dialetra = date('w',$publi);  //Día de la semana(0-7)
switch($dialetra){
case 0: $dialetra="Diumenge"; break;
case 1: $dialetra="Dilluns"; break;
case 2: $dialetra="Dimarts"; break;
case 3: $dialetra="Dimecres"; break;
case 4: $dialetra="Dijous"; break;
case 5: $dialetra="Divendres"; break;
case 6: $dialetra="Dissabte"; break;
}
return $dialetra;
}

?>
