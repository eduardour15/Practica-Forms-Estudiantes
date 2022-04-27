<?php
include_once("alumnos.php");
include_once("serializa.php");
if (isset($_POST['nombre'])) {
    $nombre_editar = $_POST["nombre"];

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Editar estudiante</title>
    </head>

    <body>

        <div class="container">
            <div class="card">
                <h5 class="card-header cabecera-card">PRACTICA FORMS</h5>
            </div>
            <h5 class="card-header cabecera-datos">EDITANDO ESTUDIANTES</h5>

            <form class="row g-3 needs-validation form" action="procesa.php" enctype='multipart/form-data' method="post">
                <div class="col-md-8">
                    <label class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label"> Número de carnet</label>
                    <input type="text" class="form-control" name="numCarnet" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label"> Edad</label>
                    <input type="number" class="form-control" name="edad" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label"> Correo electrónico</label>
                    <input type="mail" class="form-control" name="correo" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label"> Curso actual</label>
                    <input type="number" class="form-control" name="curso" min="1" max="5" id="numero" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label"> Foto</label>
                    <input type="file" class="form-control" name="foto" required>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

    </html>
<?php } else {
    echo "<h1>NO SE ENCONTRÓ A ESA PERSONA</h1>";
}
?>