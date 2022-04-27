<?php
class serializacion{
    public static function almc_datos($listaAlumno){
        try{
            $array_almc=serialize($listaAlumno);
            file_put_contents("archivoEstudiantes",$array_almc);
            return true;
        }catch(Exception $e){
            echo "Ocurrio una exepción: ".$e->getMessage();
            return false;
        }
    }

    public static function retorna_datos(){
        try{
            $array_almc=file_get_contents("archivoEstudiantes");
            $alumnos=unserialize($array_almc);
            if(!is_array($alumnos)){
                $alumnos=array();
            }
        }catch(Exception $e){
           $alumnos=array();
        }
        return $alumnos;
    }
}