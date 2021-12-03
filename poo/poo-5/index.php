<?php
    //Incluyo los archivos necesarios
    require("./model/Coche.php");
    require("./controller/CocheController.php");

    //Instancio el controlador
    $controller = new CocheController;

    //Ruta de la home
    $home = "/carpeta-para-github/poo/poo-5/index.php/";

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