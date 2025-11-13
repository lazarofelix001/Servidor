<?php
  require_once ("./ventana.php");

  class puerta {
  private $ventana;
  private $abierta;

  public function __construct(){
    $this->ventana = new ventana;
    $this->abierta = false;
  }

  /*Getters*/
  public function getVentana(){
    return $this->ventana;
  }
  public function getAbierta(){
    return $this->abierta;
  }

  /*Funciones requeridas*/
  public function abrirCerrar(){
    $this->abierta = !$this->abierta;
  } 
  public function __toString() {
    $estadoVentana = $this->ventana->getAbierta();
    return "Esta puerta esta: " . ($this->abierta ? "Abierta ": "Cerrada ") . "Y la ventana esta" . ($estadoVentana ? "Abierta":"Cerrada");
  }
}
