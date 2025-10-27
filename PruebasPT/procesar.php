<?php

include_once './datos.php';

$basePocion = $_POST['base'];
$esenciaArcana = $_POST['esencia'];
$infusion = $_POST['infusion'];
$cantidadPociones = $_POST['cantidad'];
$descuento = 0;
$precioBasePocion = $inventario['bases'][$basePocion]['precio'];
$precioEsenciaArcana = $inventario['esencias'][$esenciaArcana]['precio'];
$precioInfusion = $inventario['infusion'][$infusion]['precio'];
$nombreBasePocion = $inventario['bases'][$basePocion]['nombre_completo'];
$nombreEsenciaArcana = $inventario['esencias'][$esenciaArcana]['nombre_completo'];
$nombreInfusion = $inventario['infusion'][$infusion]['nombre_completo'];

$ingredientesIniciales = [];
$catalizadores = [];

    if (isset($_POST['ingredientes'])) {
        $ingredientesIniciales = $_POST['ingredientes'];
        foreach ($ingredientesIniciales as $ingrediente) {
            $precioingredientes += $inventario['ingredientes'][$ingrediente]['precio'];
        }
    }

    if (isset($_POST['catalizadores'])) {
        $catalizadores = $_POST['catalizadores'];
        foreach ($catalizadores as $catalizador) {
            $precioCatalizador += $inventario['catalizadores'][$catalizador]['precio'];
        }
    }

print_r($_POST);

$precioIndividual = $precioBasePocion + $precioEsenciaArcana + $precioInfusion;
$precioGeneral = $precioIndividual * $cantidadPociones;
 

    if (($cantidadPociones > 100) && (cantidadPociones <= 200)) {
        $descuento = 5;
    } else if ($cantidadPociones > 200) {
        $descuento = 10;
    }
if ($descuento != 0) {
    $precioTotal = $precioGeneral * ($descuento / 100);
} else {
    $precioTotal = $precioGeneral;
}

echo 'Inventario Seleccionado';

    foreach ($catalizadores as $catalizador) {
            echo 'Ingrediete: ';
            echo $inventario['ingredientes'][$ingrediente]['nombre_completo'];
            echo '<br>';
        }
echo 'Base:';
echo $nombreBasePocion;
echo '<br>';
echo 'Escencia: ';
echo $nombreEsenciaArcana;
echo '<br>';
echo 'Infusion: ';
echo $nombreInfusion;
echo '<br>';

    foreach ($ingredientesIniciales as $ingrediente) {
            echo 'Catalizador: ';
            echo $inventario['catalizadores'][$catalizador]['nombre_completo'];;
            echo '<br>';
        }

echo 'Precio por pocion: ';
echo $precioIndividual;
echo '<br>';
echo 'Numero de Pociones: ';
echo $cantidadPociones;
echo '<br>';
echo 'Descuento aplicado: ';
echo $descuento;
echo '<br>';

echo 'Coste total del ritual: ';
echo $precioTotal;

//al seleccionar mas de 100 pociones el programa no muestra nada, mientras es menor o igual a 100 si imprime, no se porque.



