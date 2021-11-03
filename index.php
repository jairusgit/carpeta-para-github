<?php
    session_start();

    if (isset($_GET['action']) && $_GET['action'] == "Reiniciar"){
        session_destroy();
        session_start();
    }

    if (isset($_GET['action']) && $_GET['action'] == "borrar"){
        $id = $_GET['id'];
        unset($_SESSION['personajes'][$id]);
    }

    if (!isset($_SESSION['personajes'])){
        $_SESSION['personajes'] = [
            [
                'nombre' => 'Pierce',
                'apellidos' => 'Brosnan',
                'edad' => 67,
                'nacionalidad' => 'USA',
                'foto' => 'pierce.jpg'
            ],
            [
                'nombre' => 'Penélope',
                'apellidos' => 'Cruz',
                'edad' => 47,
                'nacionalidad' => 'España',
                'foto' => 'pe.jpg'
            ],
            [
                'nombre' => 'Hugh',
                'apellidos' => 'Grant',
                'edad' => 61,
                'nacionalidad' => 'UK',
                'foto' => 'hugh.jpg'
            ],
        ];
    }
?>
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
        <li>Edad</li>
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
            <li><?php echo $row['edad'] ?></li>
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

