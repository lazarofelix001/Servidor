<?php
  class Perro {
    public $nombre;
    public $edad;
    public $raza;
    public $sexo;

    public function __construct($nombre="", $edad=0, $raza="", $sexo=""){
      $this->nombre = $nombre;
      $this->edad = $edad;
      $this->raza = $raza;
      $this->sexo = $sexo;
    }

    public function ladrar() {
      echo "<br> guau guau";
    }
    public function aniosHumanos(){
      return $this->edad * 7;
    }
    public function __toString()
    {
      $edadHumana = $this->aniosHumanos();
      return "El perro se llama $this->nombre y tiene $this->edad anios de edad, es de raza $this->raza y su sexo es $this->sexo y en edad humana tiene
      $edadHumana";
    }

  }
$miperro = new Perro ("Firulais","4","pomerania","mucho");
$miOtroPerro = new Perro("Firulais2","42","pomerania2","muchoMas");

print_r($miOtroPerro);

$miperro->ladrar();

echo "<br> Estos son los datos de mi perro: $miperro";
