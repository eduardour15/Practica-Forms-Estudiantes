<?php
include_once('alumnos.php');
include_once('Includes/Conecta_estudiante.php');



if (isset($_POST['actualizarEstud'])) {
    $estudiante_temp = new Alumno();
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $nombreDirectorio = "img/";
        $id = time();
        $nombreFichero = $id . "-" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFichero);
    } else {
        echo "<h1>HUBO ERROR EN LAS IMAGENES</h1>";
    }
    $estudiante_temp->carnet = $_POST['numCarnet'];
    $estudiante_temp->nombre = $_POST['nombre'];
    $estudiante_temp->correo = $_POST['correo'];
    $estudiante_temp->edad = $_POST['edad'];
    $estudiante_temp->curso = $_POST['curso'];
    $estudiante_temp->foto = $nombreFichero;

    $consultaActualiza = "UPDATE informacion 
    SET nombre='$estudiante_temp->nombre', 
    correo='$estudiante_temp->correo', 
    edad= '$estudiante_temp->edad', 
    curso='$estudiante_temp->curso', 
    carnet='$estudiante_temp->carnet', 
    foto='$estudiante_temp->foto' 
    WHERE carnet= '$_POST[numCarnet]' ";
    
    $resultadoActualiza = mysqli_query($conecta, $consultaActualiza);
    if ($resultadoActualiza) {
        header('Location: http://localhost/practica-forms/index.php');
        die();
    } else {
        echo "HUBO UN PROBLEMA EN LA ACTUALIZACION";
    }
}
?>
<a href="index.php">regresar</a>