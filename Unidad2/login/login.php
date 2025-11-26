<?php
session_start();

require_once ('./usuarios.php');

$email = $_POST['email'];
$password = $_POST['password'];
$inicio= false;
function inicioSecion($map,$email){
  $_SESSION['usuario'] = $map[$email]['nombre'];
  header('Location: ./hola.php');

}
foreach ($usuarios as $key => $usuario) {
  if ($key === $email && $usuario['password'] === $password) {
    $inicio = true;
  }
}
if ($inicio == true) {
  inicioSecion($usuarios, $email);
} else {
  echo 'inicio fallido, verifique los datos.';
  echo '<br><a href="./login.html">Volver al formulario</a>';
}
