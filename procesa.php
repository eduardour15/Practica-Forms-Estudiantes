<?php
include_once('alumnos.php');
if (isset($_POST['enviar'])) {
    $_POST['foto']="this";
    $student = new Alumno($_POST['correo'], $_POST['nombre'], $_POST['numCarnet'], $_POST['edad'], $_POST['curso'], $_POST['foto']);
    $student->imprimir();

} else {
    echo "no se abrio ni verga";
}
