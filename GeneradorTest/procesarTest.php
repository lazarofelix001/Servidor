<?php
    $asignatura=$_POST["asignatura"];
    print_r($asignatura);
    echo "<br>";
    $cantidadPreguntas=$_POST["preguntas"];
    print_r($cantidadPreguntas);
    echo "<br>";

    $preguntasMates = array("MatesPregunta1","MatesPregunta2","MatesPregunta3","MatesPregunta4","MatesPregunta5","MatesPregunta6","MatesPregunta7","MatesPregunta8","MatesPregunta9","MatesPregunta10");
    $preguntasHistoria = array("HistoriaPregunta1","HistoriaPregunta2","HistoriaPregunta3","HistoriaPregunta4","HistoriaPregunta5","HistoriaPregunta6","HistoriaPregunta7","HistoriaPregunta8","HistoriaPregunta9","HistoriaPregunta10");
    $preguntasLengua = array("LenguaPregunta1","LenguaPregunta2","LenguaPregunta3","LenguaPregunta4","LenguaPregunta5","LenguaPregunta6","LenguaPregunta7","LenguaPregunta8","LenguaPregunta9","LenguaPregunta10");


    if ($asignatura === "matematicas") {
        for ($i = 0; $i < $cantidadPreguntas; $i++) {
            echo $preguntasMates[$i] . "<br>";
            echo "<input type="radio" id="contactChoice2" name="contact" value="phone" />";
            echo "<label for="contactChoice2">Phone</label>";

        }
    } elseif ($asignatura === "historia") {
        for ($i = 0; $i < $cantidadPreguntas; $i++) {
            echo $preguntasHistoria[$i] . "<br>";

        }
    } elseif ($asignatura === "lengua") {
        for ($i = 0; $i < $cantidadPreguntas; $i++) {
            echo $preguntasLengua[$i] . "<br>";

        }
    }