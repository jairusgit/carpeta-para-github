<?php
    //Leo el fichero
    $string = file_get_contents("files/lectura.txt");

    //Array de salida
    $salida = [];

    //Array de líneas del archivo
    $lineas = explode("\n",$string);

    //Recorro cada línea y añado elementos al array de salida
    foreach ($lineas as $fila){
        $item = explode(" ",$fila);
        $salida[] = [
            'numero' => $item[1],
            'texto' => $item[0]
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
    <title>Leer fichero</title>
</head>
<body>
    <h1>Leer fichero</h1>
    <table>
        <tr>
            <th>Número</th>
            <th>Texto</th>
        </tr>
        <!-- Recorro el array y lo imprimo -->
        <?php foreach ($salida as $fila): ?>
            <tr>
                <td><?php echo $fila['numero'] ?></td>
                <td><?php echo $fila['texto'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
