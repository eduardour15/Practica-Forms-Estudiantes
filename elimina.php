<?php
include_once('alumnos.php');
include_once('serializa.php');

if (isset($_POST['elimina'])) {

    $almc_estudiante = serializacion::retorna_datos();

    for ($i = 0; $i < count($almc_estudiante); $i++) {
        if ($almc_estudiante[$i]->carnet == $_POST['auxCarnet']) {
            unset($almc_estudiante[$i]);
            $almc_estudiante=array_values($almc_estudiante);

            break;
        }
    }

    $retorno = serializacion::almc_datos($almc_estudiante);
    if ($retorno) {
        header('Location: http://localhost/practica-forms/index.php');
        die();
    } else {
        echo "<h1>HUBO UN PROBLEMA AL ELIMINAR DATOS</h1>";
    }
}
?>
<a href="index.php">regresar</a>
