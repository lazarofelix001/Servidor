<?php
    $nombre = $_GET["Nombre"];
    $edad = $_GET["Edad"];
    $altura = $_GET["Altura"];
    $peso = $_GET["Peso"];

    echo $nombre, "<br>";
    echo $edad, "<br>";
    echo $altura, "<br>";
    echo $peso, "<br>";

    $estatura = $altura / 100;
    $estaturaAlCuadrado = $estatura * $estatura;
    $IMC = round(($peso / $estaturaAlCuadrado) , 2);

    echo "Tu indice de masa corporal es: " . $IMC;
