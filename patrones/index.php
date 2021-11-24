<?php
$regex = "/ab[cd]e/";
$string = "abce";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/ab[cd]e/";
$string = "abde";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/ab[cd]e/";
$string = "abge";
echo preg_match($regex,$string); //0 porque no cumple el patrón
echo "<br>";

$regex = "/ab[cd]e/";
$string = "abcde";
echo preg_match($regex,$string); //0 porque no cumple el patrón
echo "<br>";

$regex = "/ab[c-e\d]/";
$string = "abcde1";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/ab?c/";
$string = "ac";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/ab?c/";
$string = "abc";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/ab?c/";
$string = "abbc";
echo preg_match($regex,$string); //0 porque no cumple el patrón
echo "<br>";

$regex = "/ab{1,3}c/"; //Lo cumplirían abc, abbc y abbbc

$regex = "/a(bc.)e/";
$string = "abcze"; //El . es cualquier caracter
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/a(bc.)e/";
$string = "abc7e"; //El . es cualquier caracter
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/a(bc.)+e/";
$string = "abc7e";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/a(bc.)+e/";
$string = "abc7bcte";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/[A-Za-zÑñ]/"; //Tiene que tener una letra
$string = "1a23";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/[0-9]/"; //Tiene que tener un número
$string = "a123";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/[^A-Za-z]/"; //Al menos una de ellas no es una letra
$string = "abcd1";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

$regex = "/[^0-9]/"; //Al menos una de ellas no es un número
$string = "123a";
echo preg_match($regex,$string); //1 porque cumple el patrón
echo "<br>";

//Ejercicio: crea una patrón que cumpla los siguientes requisitos:
//Al menos un número
//Al menos una mayúscula
//Al menos una minúscula
//Al menos un caracter especial
//Mínimo 12 caracteres
$regex = "/((?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^A-Za-z0-9])).{12,}/";
$string_si = '9a$A12345678';
$string_no = "aa$12345678910";
echo preg_match($regex,$string_si); //1 porque cumple el patrón
echo "<br>";
echo preg_match($regex,$string_no); //1 porque cumple el patrón
echo "<br>";

/*
 * 1. Condicionantes para comprobar una URL:
        * Debe empezar por http
        * Después puede o no llevar una s
        * Después, debe llevar ://
        * Un texto de al menos 2 caracteres con letras (sin tildes), números y el guion medio (pero no el primero ni el último)
        * Al menos un punto y nunca dos seguidos
        * Los dos anteriores, una o más veces.
        Puede haber un interrogante ?
        Puede haber una o más barras /
        Puede haber letras o números (con o sin tilde), así como cualquier carácter especial
        * Insensible a mayúsculas y minúsculas
        * El máximo es de 2048 caracteres
 */

//http://-ya.com NO
//http://ya.com SI
//http://a-b.com SI
//http://ya-es.com SI
//http://ya-.com NO

$regex = "/^https?:\/\/(([a-z0-9]+\-?[a-z0-9]+)\.{1})+[a-z]{2,6}$/i";
$string_si = 'http://ya.com';
$string_no = "http://ya-.com";
echo preg_match($regex,$string_si); //1 porque cumple el patrón
echo "<br>";
echo preg_match($regex,$string_no); //1 porque cumple el patrón
echo "<br>";
