<?php
namespace Illuminate\Contracts\Routing;
interface UrlGenerator

    $x1 = $_POST["x1"];
        $y1 = $_POST["y1"];
        $x2 = $_POST["x2"];
        $y2 = $_POST["y2"];
        $anchura = $_POST["anchura"];
        $altura = $_POST["altura"];
        $imagen = $POST["imagen"];

        $imagenDeOrigen = 'Image/Articles/'.$image;
        $manejadorDeOrigen = imagecreatefromjpeg($anchura, $altura);
        $manejadorDeDestino = imagecreatetruecolor($anchura, $altura);
        imagecopyresampled(
            $manejadorDeDestino,
            $manejadorDeOrigen,
            0,
            0,
            $x1,
            $y1,
            $anchura,
            $altura,
            $anchura,
            $altura
        );
        imagejpeg($manejadorDeDestino, 'Image/Articles/recorte.jpg', 100);
 ?>
