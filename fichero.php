<?php
$meses = [];
$string = file_get_contents("archivo.txt");
$array = explode("\n",$string);
foreach ($array as $fila){
    $item = explode(" ",$fila);
    $meses[] = [
        'numero' => $item[0],
        'nombre' => $item[1]
    ];
}
print_r($meses);
