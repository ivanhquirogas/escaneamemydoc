<?php
$contrasena = "";
$usuario = "root";
$nombre_bd = "db_escaneame";
try {
  $bd = new PDO(
    'mysql:host=localhost;
        dbname=' . $nombre_bd,
    $usuario,
    $contrasena
  );
} catch (Exception $e) {
  echo "Problema con la conexion" . $e->getMessage();
}
