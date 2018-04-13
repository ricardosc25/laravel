<?php 

function directoryImages(){

	$anio = date("Y");
    $mes = date("m");
    $dia = date("d");
    $estructura = "image/articles/$anio/$mes/$dia";

    $ruta = $estructura;
    $exists = file_exists($ruta); //Preguntamos si el directorio ya existe (Responde falso o verdadero)
    if(!$exists){//Si no existe el directorio
        mkdir($ruta, 0777, true);//Creamos el directorio
    }

    return $ruta;
}

?>