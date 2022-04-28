<?php
include_once('alumnos.php');
include_once('serializa.php');

if (isset($_POST['actualizarEstud'])) {
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $nombreDirectorio = "img/";
        $id = time();
        $nombreFichero = $id . "-" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFichero);
    } else {
        echo "<h1>HUBO ERROR EN LAS IMAGENES</h1>";
    }

    $almc_estudiante = serializacion::retorna_datos();

    for ($i = 0; $i < count($almc_estudiante); $i++) {
        if ($almc_estudiante[$i]->carnet == $_POST['numCarnet']) {
            $almc_estudiante[$i]->nombre = $_POST['nombre'];
            $almc_estudiante[$i]->carnet = $_POST['numCarnet'];
            $almc_estudiante[$i]->correo = $_POST['correo'];
            $almc_estudiante[$i]->edad = $_POST['edad'];
            $almc_estudiante[$i]->curso = $_POST['curso'];
            $almc_estudiante[$i]->foto = $nombreFichero;
            break;
        }
    }

    $retorno = serializacion::almc_datos($almc_estudiante);
    if ($retorno) {
        header('Location: http://localhost/practica-forms/index.php');
        die();
    } else {
        echo "<h1>HUBO UN PROBLEMA AL ACTUALIZAR DATOS</h1>";
    }
}
?>
<a href="index.php">regresar</a>
