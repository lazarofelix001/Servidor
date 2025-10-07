<?php

print_r($_POST);
$nombre=$_POST["Nombre"];
$apellidos=$_POST["Apellidos"];
$edad=$_POST["Edades"];
$peso=$_POST["Peso"];
$sexo=$_POST["sexo"];
$estado=$_POST["estadocivil"];
echo "<h1> tu nombre es: $nombre $apellidos</h1>";
echo "<p> $edad <br>";
echo "<p> $peso <br>";
echo "<p> $sexo <br>";
echo "<p> $estado <br>";


