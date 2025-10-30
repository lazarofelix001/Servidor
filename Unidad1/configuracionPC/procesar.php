<?php
include_once 'datos.php';



$procesador = $_POST['procesador'];
$ram = $_POST['ram'];
$disco = $_POST['disco'];
$grafica = $_POST['grafica'];
$alimentacion = $_POST['alimentacion'];
$cantidad = $_POST['cantidad'];
$codigo = $_POST['codigo'];

$precioProcesador = $componentes["Procesador"][$procesador];

$precioRam = $componentes["RAM"][$ram];

$precioDisco = $componentes["Memoria"][$disco];

$precioGrafica = $componentes["Grafica"][$grafica];

$precioAlimentacion = $componentes["Alimentacion"][$alimentacion];


$precioBaseOrdenador = $precioProcesador + $precioRam + $precioDisco + $precioGrafica + $precioAlimentacion;

$accesorios = [];
$precioAccesorios = 0;

$accesorios = $_POST['accesorios'];
foreach($accesorios as $accesorio){

  $precioAccesorios += $componentes["Accesorios"][$accesorio];

?>

