<?php
//Leo el fichero de datos
$string = file_get_contents(".claves");

//Array de líneas del archivo
$lineas = explode(" ",$string);

//Datos de la conexión
$bbdd = $lineas[0]; //Quito el espacio al final de cada línea
$usuario = $lineas[1];
$clave = $lineas[2];
$opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

//Conexión mediante PDO
try {
    $db = new PDO("mysql:host=localhost;dbname=$bbdd", $usuario, $clave, $opciones);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

//Comprobación de la versión
//echo $db->getAttribute(PDO::ATTR_SERVER_VERSION);
