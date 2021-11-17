<?php include "logica.php" ?>
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
    <h1>Listado de personajes</h1>
    <p>
        <a href="index.php?action=Reiniciar" title="Reiniciar">
            Reiniciar sesión
        </a>
        <br>
        <a href="index.php?action=Ordenar" title="Ordenar por fecha ascendente">
            Ordenar por fecha ascendente
        </a>
    </p>
    <ul class="cabecera">
        <li>Foto</li>
        <li>
            Nombre
            <a href="index.php?action=ordenar&campo=nombre&orden=asc">
                <span class="lnr lnr-arrow-down"></span>
            </a>
            <a href="index.php?action=ordenar&campo=nombre&orden=desc">
                <span class="lnr lnr-arrow-up"></span>
            </a>
        </li>
        <li>Apellidos</li>
        <li>Nacionalidad</li>
        <li>Fecha</li>
        <li>Acciones</li>
    </ul>
    <?php foreach ($_SESSION['personajes'] as $key => $row){ ?>
        <ul>
            <li>
                <img src="img/<?php echo $row['foto'] ?>" alt="<?php echo $row['nombre'] ?>">
            </li>
            <li><?php echo $row['nombre'] ?></li>
            <li><?php echo $row['apellidos'] ?></li>
            <li><?php echo $row['nacionalidad'] ?></li>
            <li><?php echo $row['fecha']->format("d/m/Y") ?></li>
            <li>
                <a href="ver.php?id=<?php echo $key ?>" title="Ver">
                    <span class="lnr lnr-eye"></span>
                </a>
                <a href="editar.php?id=<?php echo $key ?>" title="Editar">
                    <span class="lnr lnr-pencil"></span>
                </a>
                <a href="index.php?action=borrar&id=<?php echo $key ?>" title="Borrar">
                    <span class="lnr lnr-trash"></span>
                </a>
            </li>
        </ul>
    <?php } ?>

</body>
</html>

