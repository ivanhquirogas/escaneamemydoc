<?php
//print_r($_POST);
if (empty($_POST["username"]) || empty($_POST["password"])) {
  //header('Location: /pages/login.php?mensaje=falta');
  exit();
}
include_once '../model/conexion.php';
$username = $_POST["username"];
$password = $_POST["password"];

$sentencia = $bd->prepare("SELECT * FROM users WHERE Users_Nickname = ?");

$sentencia->execute([$username]);

$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
// Verificar si se encontraron registros
if (count($resultado) > 0) {

  //echo "Contrasena ingresada <br />";
  //echo $password;
  //echo "Contrasena registrada <br />";
  //echo $resultado[0]["Users_Password"];
  if ($password == $resultado[0]["Users_Password"]) {
    header("Location: ../pages/paciente.php"); // Página principal después del login
    exit();
  } else {
    header("Location: ../pages/login.php?mensaje=falta"); // Redirigir al login
    exit();
  }
  // Redirigir si es necesario
  //header('Location:paciente.php?mensaje=registrado');
} else {
  //echo "No se encontró ningún usuario con ese nickname.<br>";
  header('Location:paciente.php?mensaje=error');
}
