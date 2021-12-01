<?php
//Requiero el archivo de clase para extenderlo en este script
require_once("Vehiculo.php");

class Furgoneta extends Vehiculo
{
    function puedeAparcar($miPlanta){

        //True si está en el array y no es subterraneo2
        return (array_search($miPlanta,$this->plantas) !== false && array_search($miPlanta,$this->plantas) < 2);

    }


}