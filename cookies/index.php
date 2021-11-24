<?php include "logica.php" ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies</title>
</head>
<body>
    <h1>Cookies</h1>
    <p>Introduce el valor de la cookie y haz clic en Aceptar (o haz clic en Reiniciar para borrarla)</p>
    <p style="color:red"><?php echo $mensaje ?></p>
    <form>
        <label>Cookie: </label>
        <?php if (isset($_COOKIE['galleta']) && $_COOKIE['galleta']){ ?>
            <?php echo $_COOKIE['galleta'] ?><br><br>
            <input type="submit" name="enviar" value="Reiniciar">
        <?php } else { ?>
            <input type="text" name="galleta"><br><br>
            <input type="submit" name="enviar" value="Aceptar">
        <?php } ?>
    </form>
</body>
</html>


