<?php include "logica.php" ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda de deportes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>
<body>
    <h1>Tienda de deportes</h1>
    <p>
        <a href="index.php?action=Reiniciar" title="Reiniciar">
            Reiniciar sesión
        </a>
    </p>
    <form name="buscar">
        <input type="text" name="texto" value="<?php echo $_SESSION['busqueda'] ?>">
        <input type="submit" name="buscar" value="Buscar">
        <input type="submit" name="limpiar" value="Limpiar"> <br><br>
    </form>
    <form name="ordenar">
        Selecciona un órden: <select name="orden" onchange="ordenar.submit()">
            <option value="">Órden</option>
            <?php foreach ($_SESSION['ordenacion'] as $key => $row){ ?>
                <option value="<?php echo $key ?>"><?php echo $row ?></option>
            <?php } ?>
        </select>
    </form><br>
    <ul class="cabecera">
        <li>Foto</li>
        <li>Nombre</li>
        <li class="centro">Stock</li>
        <li class="derecha">Precio</li>
    </ul>
    <?php foreach ($_SESSION['productos'] as $key => $row){ ?>
        <?php if (!$_SESSION['busqueda'] || resultado($row['nombre'])){ ?>
            <ul>
                <li>
                    <img src="img/<?php echo $row['foto'] ?>" alt="<?php echo $row['nombre'] ?>">
                </li>
                <li><?php echo $row['nombre'] ?></li>
                <li class="centro"><?php echo $row['stock'] ?></li>
                <li class="derecha">
                    <?php echo number_format($row['precio'],2,",","") ?>€
                </li>
            </ul>
        <?php } ?>
    <?php } ?>

</body>
</html>

