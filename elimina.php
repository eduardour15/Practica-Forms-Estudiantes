<?php
include_once('alumnos.php');
include_once('Includes/Conecta_estudiante.php');
if (isset($_POST['elimina'])) {
    $consultaElimina = "DELETE FROM informacion WHERE carnet='$_POST[numCarnet]'";
    $resultadoElimina = mysqli_query($conecta, $consultaElimina);
    if ($resultadoElimina) {
        header('Location: http://localhost/practica-forms/index.php');
        die();
    }else{
        echo "ERROR EN LA ELIMINACION";
    }
}
?>
<a href="index.php">regresar</a>