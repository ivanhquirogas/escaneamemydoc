<?php
print_r($_POST);
if (
  empty($_POST["txtnombre"]) ||
  empty($_POST["txtfechanacimiento"]) ||
  empty($_POST["txtraza"]) ||
  empty($_POST["txtaltura"]) ||
  empty($_POST["txtpeso"]) ||
  empty($_POST["txttamaño"]) ||
  empty($_POST["txtesterilizado"]) ||
  empty($_POST["txttsangre"]) ||
  empty($_POST["txtqrcode"])
) {
  echo "Error";
  #header('Location: /pages/registerPet.php?mensaje=falta');
  exit();
}
include_once '../model/conexion.php';
session_start();

$nombre = $_POST["txtnombre"];
$fechanacimiento = $_POST["txtfechanacimiento"];
$raza = $_POST["txtraza"];
$altura = $_POST["txtaltura"];
$peso = $_POST["txtpeso"];
$tamaño = $_POST["txttamaño"];
$esterilizado = $_POST["txtesterilizado"];
$tsangre = $_POST["txttsangre"];
$qrcode = $_POST["txtqrcode"];


$getPetsByPetname = $bd->prepare("SELECT * FROM breed WHERE Breed_Name = ?");
$getPetsByPetname->execute([$raza]);

$petRegistered = $getPetsByPetname->fetchAll(PDO::FETCH_ASSOC);

// Verificar si se encontraron registros
if (count($petRegistered) == 0) {
  header("Location: ../pages/login.php?mensaje=falta"); // Redirigir al login
  exit();
}

$petBreed = $petRegistered[0]["Breed_ID"];


$addPet = $bd->prepare("INSERT INTO Pet (
  Pet_Name,
  Pet_DateOfBirth,
  Pet_Height,
  Pet_Weight,
  Pet_Size,
  Pet_Sterilized,
  Pet_Blood_Type,
  Pet_QRCode,
  Pet_Breed_ID_FK)
VALUES
(?,?,?,?,?,?,?,?,?)");
$addPetRes = $addPet->execute([
  $nombre,
  $fechanacimiento,
  $altura,
  $peso,
  $tamaño,
  $esterilizado,
  $tsangre,
  $qrcode,
  $petBreed
]);

$lastId = $bd->lastInsertId();
$addPetPerson = $bd->prepare("INSERT INTO person_pet (Pet_ID_FK, Person_ID_FK)
VALUES
(?,?)");
$addPetPersonRes = $addPetPerson->execute([
  $lastId,
  $_SESSION["createdUserId"]
]);

$_SESSION["createdPetId"] = $lastId;


if ($addPetPersonRes && $addPetRes) {
  header('Location: /pages/registerPet.php?mensaje=registrado');
} else {
  header('Location: /pages/registerPet.php?mensaje=error');
  exit();
}
