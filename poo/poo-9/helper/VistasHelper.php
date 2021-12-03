<?php
namespace App\Helper;

class VistasHelper
{
    public function vista($vista,$datos){

        $archivo = "../view/$vista.php";
        require($archivo);

    }
}