<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Carta de colores</title>
</head>
<?php include "logica.php" ?>
<body>
    <h1>Carta de colores</h1>
    <form>
        <h2>RGB a HEX</h2>
        <p>Introduce los valores RGB y pulsa en Convertir a HEX</p>
        R: <input type="number" name="r" min="0" max="255" value="<?php echo $r ?? "" ?>"><br>
        G: <input type="number" name="g" min="0" max="255" value="<?php echo $g ?? "" ?>"><br>
        B: <input type="number" name="b" min="0" max="255" value="<?php echo $b ?? "" ?>"><br>
        <input type="submit" name="rgb2hex" value="Convertir a HEX"><br>
        <?php if ($mostrarHex){ ?>
            Color resultante en HEX: #<?php echo $hexCalc ?><br>
            <div style="background-color: #<?php echo $hexCalc ?>"></div>
        <?php } ?>
        <?php if ($errorHex){ ?>
            <p><?php echo $error ?></p>
        <?php } ?>
    </form>
    <hr>
    <form>
        <h2>HEX a RGB</h2>
        <p>Introduce el valor HEX y pulsa en Convertir a RGB</p>
        Hex: <input type="text" name="hex" placeholder="#000000"><br>
        <input type="submit" name="hex2rgb" value="Convertir a RGB"><br>
        <?php if ($mostrarRGB){ ?>
            Color resultante en RGB: <?php echo $rgbCalc ?><br>
            <div style="background-color: <?php echo $rgbCalc ?>"></div>
        <?php } ?>
        <?php if ($errorRGB){ ?>
            <p><?php echo $error ?></p>
        <?php } ?>
    </form>
</body>
</html>
