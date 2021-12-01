<?php

class Vehiculo
{
    //Variables o atributos
    var $marca;
    var $modelo;
    var $color;
    var $propietario;
    var $planta;
    var $plantas = array("superficie","subterraneo1","subterraneo2");

    function __construct($miMarca,$miModelo,$miColor,$miPropietario){

        $this->marca = $miMarca;
        $this->modelo = $miModelo;
        $this->color = $miColor;
        $this->propietario = $miPropietario;

    }

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

    function setPlanta($miPlanta){
        $this->planta = $miPlanta;
    }

    function getPlanta(){
        return $this->planta;
    }
}