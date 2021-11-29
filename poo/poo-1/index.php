<?php

//Crear o definir una clase
class Coche{

    //Variables o atributos
    var $marca;
    var $modelo;
    var $color;
    var $propietario;

    //Funciones o métodos
    function setMarca($miMarca){
        $this->marca = $miMarca;
    }

    function getMarca(){
        return $this->marca;
    }

    function setModelo($miModelo){
        $this->modelo = $miModelo;
    }

    function getModelo(){
        return $this->modelo;
    }

    function setColor($miColor){
        $this->color = $miColor;
    }

    function getColor(){
        return $this->color;
    }

    function setPropietario($miPropietario){
        $this->propietario = $miPropietario;
    }

    function getPropietario(){
        return $this->propietario;
    }
}

//Título
echo "<h1>Ejemplo 1: Definir o instanciar una clase</h1>";

//Instanciar o utilizar una clase
$coche1 = new Coche;
$coche2 = new Coche;

//Accedo a las funciones o métodos set() para configurar el coche 1 (opción 1)
$coche1->setMarca("Wolkswagen");
$coche1->setModelo("Polo");
$coche1->setColor("negro");
$coche1->setPropietario("Rebeca");

//Accedo a las funciones o métodos get() para recuperar la información del coche 1 (opción 1)
echo "
        <strong>".$coche1->getPropietario()."</strong> se ha comprado un 
        <strong>".$coche1->getMarca()." ".$coche1->getModelo()."</strong> de color
        <strong>".$coche1->getColor()."</strong>.
";

//Accedo directamente a los atributos para configurar el coche 2 (opción 2)
$coche2->marca = "Toyota" ;
$coche2->modelo = "Corolla";
$coche2->color = "verde";
$coche2->propietario = "Marcos";

//Accedo directamente a los atributos para recuperar la información del coche 2 (opción 2)
echo "
        <strong>".$coche2->propietario."</strong> se ha comprado un 
        <strong>".$coche2->marca." ".$coche2->modelo."</strong> de color
        <strong>".$coche2->color."</strong>.
";
