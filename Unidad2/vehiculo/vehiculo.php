<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
  public function getPuerta($indice){
    return $this->puertas[$indice];
  }
public function __toString(){
        $salida = "Nº puertas: $this->numeroPuertas"
                ."<br>Tipo de motor: $this->tipoMotor"
                ."<br>Potencia: $this->potencia"
                ."<br>El vehículo está " . ($this->arrancado ? "arrancado" : "NO arrancado")
                ."<br>El vehículo " . ($this->etiquetaMedioambiental ? "tiene etiqueta" : "NO tiene etiqueta")
                ."<br>Puertas del vehículo:";

        foreach ($this->puertas as $puerta) {
            $salida = $salida . "<br>$puerta";
        }
        
        return $salida;

  }
  
}
$miVehiculo = new vehiculo();
echo $miVehiculo;
$miVehiculo->arrancar();
$miVehiculo->getPuerta(2)->abrirCerrar();
echo $miVehiculo;
$miVehiculo->getPuerta(2)->getVentana()->abrirCerrar();
echo $miVehiculo;
$miVehiculo->cerrarCoche();
echo $miVehiculo;
