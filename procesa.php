<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<?php

include_once('alumnos.php');
include_once('serializa.php');
if (isset($_POST['enviar'])) {
    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
        $nombreDirectorio="img/";
        $id=time();
        $nombreFichero=$id."-".$_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'],$nombreDirectorio.$nombreFichero);
    }else{
        echo "<h1>HUBO ERROR EN LAS IMAGENES</h1>";
    }

    $almc_estudiante=serializacion::retorna_datos();
    $student = new Alumno($_POST['correo'], $_POST['nombre'], $_POST['numCarnet'], $_POST['edad'], $_POST['curso'], $nombreFichero);
    array_push($almc_estudiante,$student);
    $retorno=serializacion::almc_datos($almc_estudiante);
    if($retorno){
        //aquí retornaré a la página principal
    }else{
        //mostrará un mensaje de error con JS
    }
} else {
    echo "<h1>NO SE ABRIO</h1>";
}

?>
<a href="index.php"><button type="submit"> regresar</button></a>
