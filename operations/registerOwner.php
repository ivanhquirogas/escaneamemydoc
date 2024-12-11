<?php
//print_r($_POST);
if (
  empty($_POST["txtperson_id"]) ||
  empty($_POST["txtnombre"]) ||
  empty($_POST["txtapellidos"]) ||
  empty($_POST["txtcorreo"]) ||
  empty($_POST["txtciudad"]) ||
  empty($_POST["txttelefono"]) ||
  empty($_POST["txtdireccion"]) ||
  empty($_POST["txtprofesion"])
) {
  header('Location: /pages/registerPerson.php?mensaje=falta');
  exit();
}
include_once '../model/conexion.php';
session_start();

$txtperson_id = $_POST["txtperson_id"];
$txtnombre = $_POST["txtnombre"];
$txtapellidos = $_POST["txtapellidos"];
$txtcorreo = $_POST["txtcorreo"];
$txtciudad = $_POST["txtciudad"];
$txttelefono = $_POST["txttelefono"];
$txtdireccion = $_POST["txtdireccion"];
$txtprofesion = $_POST["txtprofesion"];

$getUsersByUsername = $bd->prepare("SELECT * FROM users WHERE Users_Nickname = ?"); // validar que no existe
$getUsersByUsername->execute([$txtcorreo]);

$usersRegistered = $getUsersByUsername->fetchAll(PDO::FETCH_ASSOC);

if (count($usersRegistered) > 0) {
  // Redirigir si es necesario
  header('Location: /pages/registerPerson.php?mensaje=registrado'); //mensaje control error
  //echo "USUARIO YA REGISTRADO.<br>";
  exit();
  //header('Location:paciente.php?mensaje=registrado');
}

$addUser = $bd->prepare("INSERT INTO Users (Users_Nickname, Users_Password, Users_Status) VALUES (?, \"00000000\", \"Activo\")");
$addUserRes = $addUser->execute([$txtcorreo]);

$lastId = $bd->lastInsertId();
echo "lastId: ";
echo $lastId;

$addPerson = $bd->prepare("INSERT INTO Person (
  Person_Id, 
  Person_Role, 
  Person_Names, 
  Person_Surnames, 
  Person_Email, 
  Person_City, 
  Person_Phone, 
  Person_Address, 
  Person_Profession, 
  Person_Users_ID_FK) 
VALUES (?,\"Owner\",?,?,?,?,?,?,?,?)");
$addPersonRes = $addPerson->execute([
  $txtperson_id,
  $txtnombre,
  $txtapellidos,
  $txtcorreo,
  $txtciudad,
  $txttelefono,
  $txtdireccion,
  $txtprofesion,
  $lastId
]);

echo "addUserRes: ";
echo $addUserRes;
echo "addPersonRes: ";
echo $addPersonRes;


// Verificar si se encontraron registros
if ($addUserRes && $addPersonRes) {
  //echo "No se encontró ningún usuario con ese nickname.<br>";

  // Redirigir si es necesario
  $_SESSION["createdUserId"] = $txtperson_id;
  header('Location: /pages/registerPerson.php?mensaje=success');
} else {
  //echo "No se encontró ningún usuario con ese nickname.<br>";
  header('Location: /pages/registerPerson.php?mensaje=fallo');
  //header('Location:paciente.php?mensaje=error');
}
