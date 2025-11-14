<?php
  require_once ("./ventana.php");
  require_once ("./puerta.php");
  
  class vehiculo{
  private $numeroPuertas;
  private $puertas;
  private $tipoMotor;
  private $potencia;
  private $etiquetaMedioambiental;
  private $arrancado;

  public function __construct($numeroPuertas = 4,$tipoMotor = 'diesel',
                              $potencia = 10,
                              $etiquetaMedioambiental = 'ECO',
                              $arrancado = false) 
    {
    $this->numeroPuertas = $numeroPuertas;
    $this->tipoMotor = $tipoMotor;
    $this->potencia = $potencia;
    $this->etiquetaMedioambiental = $etiquetaMedioambiental;
    $this->arrancado = $arrancado;
    for ($i=0; $i < $numeroPuertas ; $i++) { 
      $this->puertas[] = new puerta();
    }

  }
  public function arrancar() {
    $this->arrancado = !$this->arrancado;
  }
  public function cerrarCoche() {
    foreach ($this->puertas as $puerta) {
      if ($puerta->getAbierta() === true) {
        $puerta->abrirCerrar();
      }
      if ($puerta->getVentana()->getAbierta() === true) {
        $puerta->getVentana()->abrirCerrar();
      } 
    }
  }

}
