<?php
    session_start();
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $personaje = $_SESSION['personajes'][$id];
        echo $personaje['nombre'];
    }
    else{
        echo "No encuentro el personaje";
    }
?>
<a href="index.php" title="Volver">Volver</a>
