<?php
//print_r($_POST);
if (empty($_POST["userId"]) || empty($_POST["personId"])) {
  //header('Location: /pages/login.php?mensaje=falta');
  exit();
}
include_once '../model/conexion.php';
$userId = $_POST["userId"];
$personId = $_POST["personId"];

$delPerson = $bd->prepare("DELETE FROM PERSON WHERE PERSON_ID = ?");
$delPersonRes = $delPerson->execute([$personId]);

$delUser = $bd->prepare("DELETE FROM user WHERE users_ID = ?");
$delUserRes = $delUser->execute([$userId]);

echo "delPerson: ";
echo $delPersonRes;
echo "delUserRes: ";
echo $delUserRes;


// // Verificar si se encontraron registros
// if ($resultado) {
//   //echo "No se encontró ningún usuario con ese nickname.<br>";

//   // Redirigir si es necesario
//   //header('Location:paciente.php?mensaje=registrado');
// } else {
//   //echo "No se encontró ningún usuario con ese nickname.<br>";
//   //header('Location:paciente.php?mensaje=error');
// }
