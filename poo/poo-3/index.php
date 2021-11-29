<?php

//Requiero el archivo de clase para incluirlo en este script
require("Coche.php");

//Título
echo "Ejemplo 3: Instanciar una clase externa";

//Instancio y configuro los coches
$coche1 = new Coche("Wolkswagen","Polo","negro","Rebeca");
$coche2 = new Coche("Toyota","Corolla","verde","Marcos");

//Accedo a las funciones o métodos get() para recuperar la información del coche 1 (opción 1)
echo "
        <strong>".$coche1->getPropietario()."</strong> se ha comprado un 
        <strong>".$coche1->getMarca()." ".$coche1->getModelo()."</strong> de color
        <strong>".$coche1->getColor()."</strong>.
";

//Accedo directamente a los atributos para recuperar la información del coche 2 (opción 2)
echo "
        <strong>".$coche2->propietario."</strong> se ha comprado un 
        <strong>".$coche2->marca." ".$coche2->modelo."</strong> de color
        <strong>".$coche2->color."</strong>.
";
