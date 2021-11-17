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
<h1>Editar personaje</h1>
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
    <form method="post" enctype="multipart/form-data" action="index.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <strong>Nombre:</strong>
        <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" placeholder="Nombre"><br>
        <strong>Apellidos:</strong>
        <input type="text" name="apellidos" value="<?php echo $row['apellidos'] ?>" placeholder="Apellidos"><br>
        <strong>Fecha:</strong>
        <input type="text" name="fecha" value="<?php echo $row['fecha']->format("d/m/Y") ?>" placeholder="dd/mm/yyyy"><br>
        <strong>Nacionalidad:</strong>
        <input type="text" name="nacionalidad" value="<?php echo $row['nacionalidad'] ?>" placeholder="Nacionalidad"><br>
        <strong>Imagen:</strong>
        <input type="file" name="imagen"/><br>
        <input type="submit" name="guardar" value="Guardar">
        <br>
    </form>

    <img src="img/<?php echo $row['foto'] ?>" alt="<?php echo $row['nombre'] ?>">
    <?php
}
else{
    echo "No encuentro el personaje";
}
?>
</body>
</html>
