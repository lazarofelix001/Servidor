<?php
  require_once "ventana.php";
  class Puerta{
    private $ventana;
    private $abierta;

    public function __construct()
    {
      $this->abierta = false;
      $this->ventana = new ventana; 
    }
    public function abrirCerrar()
    {
      $this->abierta = !$this->abierta;
    }
    public function getVentana()
    {
      return $this->ventana;
    }
    public function getAbierta()
    {
      return $this->abierta;
    
    }
    public function __toString()
    {
      return "<br> La puerta esta: " . ($this->abierta ? "Abierta" : "Cerrada") . "Y su ventana esta: " . $this->ventana;
    }
}
