<?php
$cp = [];
$string = file_get_contents("cp.txt");
$array = explode("\n",$string);
foreach ($array as $fila){
    $item = explode(" ",$fila);
    //El índice es el código de provincia
    //El valor es el nombre de la provincia
    $cp[$item[0]] = $item[1];
}

if (isset($_GET['enviar'])){

    $id_provincia = filter_input(INPUT_GET,'id_provincia',FILTER_SANITIZE_NUMBER_INT);
    $codigo = filter_input(INPUT_GET,'cp',FILTER_SANITIZE_STRING);

    if ($id_provincia == substr($codigo,0,2)){
        echo "La provincia es correcta.";
    }
    else{
        echo "La provincia no coincide.";
    }
}

?>

<form>
    Selecciona provincia: <br>
    <select name="id_provincia">
        <option value="">Selecciona provincia</option>
        <?php foreach ($cp as $indice => $valor){ ?>
            <option value="<?php echo $indice ?>"><?php echo $valor ?></option>
        <?php } ?>
    </select><br>
    CP: <input type="text" name="cp"><br>
    <input type="submit" name="enviar" value="Comprobar">
</form>
