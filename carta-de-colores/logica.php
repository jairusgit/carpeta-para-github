<?php
/* FUNCIONES Y VARIABLES COMUNES **********************************************/
function decimalValido($numero){
    return ($numero >= 0 && $numero <= 255);
}

$mostrarHex = false;
$mostrarRGB = false;
$errorHex = false;
$errorRGB = false;

/* RGB A HEX ***************************************************************/

if (isset($_GET['rgb2hex'])){

    //Recojo los valores RGB
    $r = filter_input(INPUT_GET,'r',FILTER_SANITIZE_NUMBER_INT);
    $g = filter_input(INPUT_GET,'g',FILTER_SANITIZE_NUMBER_INT);
    $b = filter_input(INPUT_GET,'b',FILTER_SANITIZE_NUMBER_INT);

    //Si los 3 valores son válidos
    if (decimalValido($r) && decimalValido($g) && decimalValido($b)){
        //Formateo el hexadecimal para que siempre tenga 2 caracteres
        $rCalc = str_pad(dechex($r),2,"0",STR_PAD_LEFT);
        $gCalc = str_pad(dechex($g),2,"0",STR_PAD_LEFT);
        $bCalc = str_pad(dechex($b),2,"0",STR_PAD_LEFT);
        //Calculo hexadecimal
        $hexCalc = $rCalc.$gCalc.$bCalc;
        $mostrarHex = true;
    }
    else{
        $errorHex = true;
        $error = "Introduce valores válidos";
    }

}
