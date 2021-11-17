<?php
/* FUNCIONES Y VARIABLES COMUNES **********************************************/
function decimalValido($numero){
    return ($numero >= 0 && $numero <= 255);
}

function hexValido($string){
    //https://stackoverflow.com/questions/8027423/how-to-check-if-a-string-is-a-valid-hex-color-representation/8027444
    return (preg_match("/^#([0-9A-F]{3}){1,2}$/i",$string) == 1);
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

/* HEX A RGB ***************************************************************/

if (isset($_GET['hex2rgb'])){

    //Recojo el valor HEX
    $hex = filter_input(INPUT_GET,'hex',FILTER_SANITIZE_STRING);

    //Si el valor es válido, tendrá 7 o 4 caracteres (#123456 o #123)
    if (hexValido($hex)){
        //Si tiene 3, primero lo paso a 6
        if (strlen($hex) == 3){
            $hex = $hex[0].$hex[1].$hex[1].$hex[2].$hex[2].$hex[3].$hex[3];
        }
        //Calculo el decimal de 2 en 2 (saltándome el #)
        $rCalc = hexdec(substr($hex,1,2));
        $gCalc = hexdec(substr($hex,3,2));
        $bCalc = hexdec(substr($hex,5,2));
        //Calculo rgb
        $rgbCalc = "rgb($rCalc,$gCalc,$bCalc)";
        $mostrarRGB = true;
    }
    else{
        $errorRGB = true;
        $error = "Introduce un valor válido";
    }

}