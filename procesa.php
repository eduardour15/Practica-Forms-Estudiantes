<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<?php

include_once('alumnos.php');
include_once('serializa.php');
include_once('Includes/Conecta_estudiante.php');
if (isset($_POST['enviar'])) {
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $nombreDirectorio = "./img/";
        $id = time();
        $nombreFichero = $id . "-" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFichero);
    } else {
        echo "<h1>HUBO ERROR EN LAS IMAGENES</h1>";
    }
    $student = new Alumno($_POST['correo'], $_POST['nombre'], $_POST['numCarnet'], $_POST['edad'], $_POST['curso'], $nombreFichero);

    //Insertando en la base de datos 
    $inserta = "INSERT INTO informacion VALUES('$student->correo','$student->nombre','$student->carnet','$student->edad','$student->curso','$student->foto')";
    $query = mysqli_query($conecta, $inserta);
    header('Location: http://localhost/practica-forms/index.php');
    die();
} else {
    echo "<h1>NO SE ABRIO</h1>";
}

?>
<a href="index.php"><button type="submit" class="btn btn-primary btn-lg">Regresar</button></a>