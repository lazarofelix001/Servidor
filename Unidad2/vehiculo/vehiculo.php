<?php
  require_once "puerta.php";
  
  class vehiculo{
    private $numeroPuertas;
    private $puertas = [];
    private $tipoMotor;
    private $potencia;
    private $etiquetaMedioHambiental;
    private $arrancado;

  public function __construct($numeroPuertas = 4, $tipoMotor = "Gasolina", $potencia = "100CV", $etiquetaMedioambiental = null)
  {
    $this-> numeroPuertas = $numeroPuertas;

    for ($i = 0; $i < $numeroPuertas; $i++){
      $nuevaPuerta = new Puerta;
      $this->puertas[] = $nuevaPuerta;
    }
  }
  public function getPuertas(){
    return $this->puertas;
  }
  
  }

  $vehiculo = new Vehiculo();
  print_r($vehiculo->getPuertas());
  $vehiculo->abrirCerrar();
  echo "<br>";
  print_r($vehiculo->getPuertas());
