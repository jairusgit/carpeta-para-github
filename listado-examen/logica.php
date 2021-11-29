<?php
session_start();

//Reniciar sesión
if (isset($_GET['action']) && $_GET['action'] == "Reiniciar"){
    session_destroy();
    session_start();
    setcookie("busqueda","",-1);
    header("Location: index.php");
}

//Limpiar
if (isset($_GET['limpiar']) && $_GET['limpiar'] == "Limpiar"){
    $_SESSION['busqueda'] = "";
    setcookie("busqueda","",-1);
    header("Location: index.php");
}

//Buscar
if (isset($_GET['buscar']) && $_GET['buscar'] == "Buscar"){
    //Recupero el valor de búsqueda
    $texto = filter_input(INPUT_GET,'texto',FILTER_SANITIZE_STRING);
    //Si al menos hay 3 caracteres
    if (strlen($texto) > 2){
        $_SESSION['busqueda'] = $texto;
        //Almacena la cookie 1 día
        setcookie("busqueda", $texto, time() + 86400);
    }
}

function resultado($nombre){
    return (strpos(mb_strtolower($nombre,"utf-8"),mb_strtolower($_SESSION['busqueda'],"utf-8")) !== false);
}

//Ordenar
if (isset($_GET['orden'])){
    $array = [];
    $columna = "";
    $sentido = null;
    $tipo = "";
    switch ($_GET['orden']){
        case 0: //Nombre ASC
            $columna = "nombre";
            $sentido = SORT_ASC;
            $tipo = SORT_STRING;
            break;
        case 1: //Nombre DESC
            $columna = "nombre";
            $sentido = SORT_DESC;
            $tipo = SORT_STRING;
            break;
        case 2: //Precio Mayor
            $columna = "precio";
            $sentido = SORT_DESC;
            $tipo = SORT_NUMERIC;
            break;
        case 3: //Precio Menor
            $columna = "precio";
            $sentido = SORT_ASC;
            $tipo = SORT_NUMERIC;
            break;
    }
    foreach ($_SESSION['productos'] as $key => $row){
        $array[$key] = $row[$columna];
    }
    array_multisort($array, $sentido, $_SESSION['productos'],$tipo);
}

if (!isset($_SESSION['productos'])){
    //Creo mi array de productos
    $_SESSION['productos'] = [
        [
            'nombre' => 'Set de raqueta de tenis + pelota',
            'stock' => 27,
            'precio' => 49.95,
            'foto' => 'tenis.png'
        ],
        [
            'nombre' => 'Set de pesas',
            'stock' => 14,
            'precio' => 59.95,
            'foto' => 'pesas.png'
        ],
        [
            'nombre' => 'Set de bate de béisbol + pelota',
            'stock' => 12,
            'precio' => 29.95,
            'foto' => 'beisbol.png'
        ],
        [
            'nombre' => 'Set de bolos',
            'stock' => 8,
            'precio' => 129.95,
            'foto' => 'bolos.png'
        ],
        [
            'nombre' => 'Diana',
            'stock' => 16,
            'precio' => 89.95,
            'foto' => 'diana.png'
        ],
        [
            'nombre' => 'Bicicleta',
            'stock' => 3,
            'precio' => 249.95,
            'foto' => 'bicicleta.png'
        ],
        [
            'nombre' => 'Monopatín',
            'stock' => 1,
            'precio' => 69.95,
            'foto' => 'monopatin.png'
        ],
        [
            'nombre' => 'Balón de fútbol',
            'stock' => 28,
            'precio' => 19.95,
            'foto' => 'futbol.png'
        ],
        [
            'nombre' => 'Balón de baloncesto',
            'stock' => 26,
            'precio' => 19.95,
            'foto' => 'baloncesto.png'
        ],
        [
            'nombre' => 'Balón de rugby',
            'stock' => 4,
            'precio' => 25.95,
            'foto' => 'rugby.png'
        ],
    ];

    //Creo mi array de opciones de ordenación
    $_SESSION['ordenacion'] = ['Nombre A-Z','Nombre Z-A','Precio Mayor','Precio Menor'];

    //Inicializo el valor de búsqueda
    if (isset($_COOKIE['busqueda']) && $_COOKIE['busqueda']){
        $_SESSION['busqueda'] = $_COOKIE['busqueda'];
        header("Location:index.php");
    }
    else{
        $_SESSION['busqueda'] = "";
    }
}
?>
