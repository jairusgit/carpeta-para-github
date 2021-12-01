<?php
//Requiero el archivo de clase para extenderlo en este script
require_once("Vehiculo.php");

class Autobus extends Vehiculo
{
    var $empresa;

    function __construct($miMarca,$miModelo,$miColor,$miPropietario,$miEmpresa){

        $this->marca = $miMarca;
        $this->modelo = $miModelo;
        $this->color = $miColor;
        $this->propietario = $miPropietario;
        $this->empresa = $miEmpresa;

    }

    //Funciones o métodos
    function setEmpresa($miEmpresa){
        $this->empresa = $miEmpresa;
    }

    function getEmpresa(){
        return $this->empresa;
    }


    function puedeAparcar($miPlanta){
        //True si está en el array y es superficie
        return (array_search($miPlanta,$this->plantas) !== false && array_search($miPlanta,$this->plantas) == 0);
    }

}