<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de personajes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>
<body>
    <h1>Ver personaje</h1>
    <p>
        <a href="index.php" title="Volver">
            Volver al listado
        </a>
    </p>
    <?php
    session_start();
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $_SESSION['personajes'][$id];
        ?>
            <strong>Nombre:</strong><?php echo $row['nombre'] ?><br>
            <strong>Apellidos:</strong><?php echo $row['apellidos'] ?><br>
            <strong>Fecha:</strong><?php echo $row['fecha']->format("d/m/Y") ?><br>
            <strong>Nacionalidad:</strong><?php echo $row['nacionalidad'] ?><br><br>
            <img src="img/<?php echo $row['foto'] ?>" alt="<?php echo $row['nombre'] ?>">
    <?php
        }
        else{
            echo "No encuentro el personaje";
        }
    ?>
</body>
</html>
