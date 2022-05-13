<?php
$servidor="localhost";
$usuario="root";
$password="";
$bd="estudiante";
$conecta=mysqli_connect($servidor,$usuario,$password,$bd);
if($conecta->connect_error){
    die("Error al conectar al servidor: ". $conecta->connect_error);
}