<?php
    print_r($_GET);
    $nombre = $_GET["nombre"];
    $edad = $_GET["edad"];
    echo "<br>";

    echo "hola " . $nombre . " Tienes " . $edad . " Años de edad ";