<?php

//Requiero el archivo de conexión
require_once "conexion.php";

//Insert
$registros = $db->exec('INSERT INTO personas (nombre) VALUES ("José"),("Luís")');
if ($registros){
    echo "Se han activado $registros registros.";
}

//Delete
$registros = $db->exec('DELETE FROM personas WHERE id>3');
if ($registros){
    echo "Se han activado $registros registros.";
}

//Update
$registros = $db->exec('UPDATE personas SET activo=1 WHERE activo=0');
if ($registros){
    echo "Se han activado $registros registros.";
}

//Select con OBJ
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch(PDO::FETCH_OBJ)){ //Recorro el resultado
    echo $personas->id." ".$personas->nombre." ".$personas->activo."<br>";
}
