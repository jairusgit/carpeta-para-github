<?php
namespace App;

use App\Controller\CocheController;

    //Defino la función que atocargará la clase cuando se instancie
    spl_autoload_register('App\autoload');

    function autoload($clase,$dir=null){

        //Directorio raíz de mi proyecto (ruta absoluta)
        if (is_null($dir)){
            $dir = realpath(dirname(__FILE__));
        }

        //Escaneo en busca de clases de forma recursiva
        foreach (scandir($dir) as $file){

            //Si es un directorio (y no es de sistema) busco la clase dentro de él
            if (is_dir($dir."/".$file) AND substr($file, 0, 1) != "."){
                autoload($clase, $dir."/".$file);
            }
            //Si es archivo y el nombre coincide con la clase que quiero instanciar
            else if (is_file($dir."/".$file) AND $file == substr(strrchr($clase, "\\"), 1).".php"){
                require($dir."/".$file);
            }
        }
    }

    //Instancio el controlador
    $controller = new CocheController;

    //Ruta de la home
    $home = "/carpeta-para-github/poo/poo-8/index.php/";

    //Quito la home de la ruta de la barra de direcciones
    $ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

    //Creo el array de ruta (filtrando los vacíos)
    $array_ruta = array_filter(explode("/", $ruta));

    //Decido la ruta en función de los elementos del array
    if (isset($array_ruta[0]) && $array_ruta[0] == "ver" && is_numeric($array_ruta[1])){
        //Llamo al método ver pasándole la clave que me están pidiendo
        $controller->ver($array_ruta[1]);
    }
    else{
        //Llamo al método por defecto del controlador
        $controller->index();
    }