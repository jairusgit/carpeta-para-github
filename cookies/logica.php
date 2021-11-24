<?php
    //Inicializo el valor de mensaje
    $mensaje = "";

    //Si se ha enviado el form
    if (isset($_GET['enviar'])){

        //Si tengo que setear la cookie
        if ($_GET['enviar'] == "Aceptar"){

            //Seteo la cookie (si el valor no está vacío)
            $galleta = filter_input(INPUT_GET,'galleta',FILTER_SANITIZE_STRING);
            if ($galleta){
                //Almacena la cookie 1 día
                setcookie("galleta", $galleta, time() + 30);
                //Recargo la página
                header("Location:index.php");
            }
            else{
                $mensaje = "No has introducido un valor para la cookie";
            }

        }

        //Si tengo que borrar la cookie
        else if ($_GET['enviar'] == "Reiniciar"){
            //Borro la cookie
            setcookie("galleta", "", -1);
            //Recargo la página
            header("Location:index.php");
        }

    }
