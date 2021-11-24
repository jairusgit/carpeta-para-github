<?php
session_start();

//Reniciar sesión
if (isset($_GET['action']) && $_GET['action'] == "Reiniciar"){
    session_destroy();
    session_start();
}

//Borrar elemento
if (isset($_GET['action']) && $_GET['action'] == "borrar"){
    $id = $_GET['id'];
    unset($_SESSION['personajes'][$id]);
}

//Guardar elemento
if (isset($_POST['guardar'])){

    //Recojo datos del form
    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
    $nombre = filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_STRING);
    $apellidos = filter_input(INPUT_POST,'apellidos',FILTER_SANITIZE_STRING);
    $fecha = filter_input(INPUT_POST,'fecha',FILTER_SANITIZE_STRING);
    $nacionalidad = filter_input(INPUT_POST,'nacionalidad',FILTER_SANITIZE_STRING);

    //Guardo el personaje en el array de sesión
    $_SESSION['personajes'][$id]['nombre'] = $nombre;
    $_SESSION['personajes'][$id]['apellidos'] = $apellidos;
    $_SESSION['personajes'][$id]['fecha'] = DateTime::createFromFormat("d/m/Y",$fecha, new DateTimeZone("Europe/Madrid"));
    $_SESSION['personajes'][$id]['nacionalidad'] = $nacionalidad;

    //Modificar imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']){
        $archivo_recibido = $_FILES['imagen'];
        $directorio_subida = '/var/www/html/carpeta-para-github/listado/img/';
        $archivo_subido = $directorio_subida . basename($archivo_recibido['name']);

        //Si se ha subido correctamente
        //sudo chown -R www-data:www-data img (para cambiar los permisos de la carpeta de subida)
        if (is_uploaded_file($archivo_recibido['tmp_name']) &&
            move_uploaded_file($archivo_recibido['tmp_name'], $archivo_subido)) {
            //Asigno al personaje en sesión esa foto que acabo de subir
            $_SESSION['personajes'][$id]['foto'] = basename($archivo_recibido['name']);
        } else {
            echo "Se ha producido un error al subir el archivo.";
        }
    }
}

//Ordenar
if (isset($_GET['action']) && $_GET['action'] == "Ordenar"){
    foreach ($_SESSION['personajes'] as $key => $row){
        $fechas[$key] = $row['fecha'];
    }
    array_multisort($fechas, SORT_ASC, $_SESSION['personajes']);
}


if (!isset($_SESSION['personajes'])){
    $_SESSION['personajes'] = [
        [
            'nombre' => 'Pierce',
            'apellidos' => 'Brosnan',
            'fecha' => DateTime::createFromFormat("d/m/Y","23/01/1943", new DateTimeZone("Europe/Madrid")),
            'nacionalidad' => 'USA',
            'foto' => 'pierce.jpg'
        ],
        [
            'nombre' => 'Penélope',
            'apellidos' => 'Cruz',
            'fecha' => DateTime::createFromFormat("d/m/Y","24/03/1943", new DateTimeZone("Europe/Madrid")),
            'nacionalidad' => 'España',
            'foto' => 'pe.jpg'
        ],
        [
            'nombre' => 'Hugh',
            'apellidos' => 'Grant',
            'fecha' => DateTime::createFromFormat("d/m/Y","30/12/1961", new DateTimeZone("Europe/Madrid")),
            'nacionalidad' => 'UK',
            'foto' => 'hugh.jpg'
        ],
    ];
}

//Generar la URL de ver
function ver($id){
    return "ver.php?id=$id";
}

function vista($pagina,$id){
    return "$pagina?id=$id";
}
?>
