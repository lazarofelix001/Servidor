<?php
session_start();
if (isset($_SESSION['usuario'])) {
  echo "Hola " . $_SESSION['usuario'] . "!!!!!!!!!!!";
  echo '<br><a href="./cerrarSesion.php">Cerrar Sesion</a>';
}
