<?php
//print_r($_POST);
echo $_POST["username"];
echo $_POST["password"];
session_start();

if (empty($_POST["username"]) || empty($_POST["password"])) {
  header('Location: /pages/login.php?mensaje=falta');
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

    $_SESSION["username"] = $username;
    $_SESSION["userId"] = $resultado[0]["Users_ID"];
    header("Location: /pages/registerPerson.php"); // Página principal después del login
    exit();
  }
}
unset($_SESSION["username"]);
header('Location: ../pages/login.php?mensaje=validos');
exit();
