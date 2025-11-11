<?php

  class Ventana{
    private $abierta;

  public function __construct(){
    $this->abierta = false;    
  }

  public function getAbierta()
  {
    return $this->abierta;
  }
  public function abrirCerrar(){
    if ($this->abierta === false){
      $this->abierta = true;
    } else {
      $this->abierta = false;
    }
  }
  public function __toString()
  {
  return "<br> Las ventanas están " . ($this->abierta ? "Abiertas" : "Cerradas");
  }
    }

  
