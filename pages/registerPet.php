<?php include '../template/header.php' ?>
<link rel="stylesheet" href="css/main.css">
<?php include_once "../model/conexion.php";

if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
  $userconsult = $bd->prepare("SELECT * 
  FROM PET 
  INNER JOIN PERSON_PET ON PET.Pet_ID = PERSON_PET.Pet_ID_FK
  INNER JOIN PERSON ON PERSON.Person_ID = PERSON_PET.Person_ID_FK
  INNER JOIN BREED ON BREED.Breed_ID = PET.Pet_Breed_ID_FK
  WHERE PET.Pet_ID = ? ;
  ");
  $userconsult->execute([$_SESSION["createdPetId"]]);

  $users = $userconsult->fetchAll(PDO::FETCH_OBJ);
}

?>

<body>
  <div class="container-fluid mt-0">
    <div class="row justify-content-center">
      <div class="col-md-12 py-2">
        <div class="card d-flex col-md-12">
          <div class="card-header text-center fw-bold fs-5">
            Ingresar Nueva Mascota
          </div>
          <form action="../operations/addPet.php" class="mb-2" method="POST">
            <div class="row mb-2">
              <div class="col-md-3">
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="txtnombre" autofocus>
              </div>
              <div class="col-md-2">
                <label class="form-label">Fecha Nacimiento:</label>
                <input type="date" class="form-control" name="txtfechanacimiento" autofocus>
              </div>
              <div class="col-md-2">
                <label class="form-label">Raza:</label>
                <input type="text" class="form-control" name="txtraza" autofocus>
              </div>
              <div class="col-md-2">
                <label class="form-label">Altura:</label>
                <input type="text" class="form-control" name="txtaltura" autofocus>
              </div>
              <div class="col-md-2">
                <label class="form-label">Peso:</label>
                <input type="text" class="form-control" name="txtpeso" autofocus>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-3">
                <label class="form-label">Tamaño:</label>
                <input type="text" class="form-control" name="txttamaño" autofocus>
              </div>
              <div class="col-md-3">
                <label class="form-label">Esterilizado:</label>
                <!-- <input type="text" class="form-control" name="txtesterilizado" autofocus> -->
                <select class="form-control" name="txtesterilizado" required>
                  <option value="">Seleccione...</option>
                  <option value="Sí">Sí</option>
                  <option value="No">No</option>
                </select>
              </div>
              <div class="col-md-3">
                <label class="form-label">Tipo de Sangre:</label>
                <input type="text" class="form-control" name="txttsangre" autofocus>
              </div>
              <div class="col-md-3">
                <label class="form-label">Codigo QR:</label>
                <input type="text" class="form-control" id="qr-pet-input" name="txtqrcode" autofocus>
              </div>
            </div>
            <div class="mb-6">
              <label class="form-label">Descripción:</label>
              <textarea class="form-control" name="txtdescripcion" rows="5" maxlength="2000"></textarea>
              <small class="text-muted">Máximo 2000 caracteres.</small>
            </div>
            <div class="d-flex justify-content-center">
              <input type="hidden" name="oculto" value="1">
              <input type="submit" class="btn btn-primary me-2" value="Registrar">
              <?php
              if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
              ?>
                <button type="button" id="generate-qr-pet-btn" class="btn btn-success">Generar Código QR</button>
              <?php
              }
              ?>
              <div id="qr-pet-code"></div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-md-12 container-fluid">
        <!--Alerta-->

        <div class="card d-flex col-md-12">
          <div class="card-header text-center fw-bold fs-5">
            Mascotas Registradas
          </div>
          <div class="p-1">
            <div class="table-responsive" style="height: 150px; overflow-y: scroll;">
              <table class="table table-primary align-middle">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">Pet ID</th>
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Fecha Nacimineto</th>
                    <th scope="col" class="text-center">Especie</th>
                    <th scope="col" class="text-center">Tamaño</th>
                    <th scope="col" class="text-center">Altura</th>
                    <th scope="col" class="text-center">Peso</th>
                    <th scope="col" class="text-center">Esterilizado</th>
                    <th scope="col" class="text-center">Tipo de Sangre</th>
                    <th scope="col" class="text-center">Codigo QR</th>
                    <th scope="col" class="text-center">ID Dueño</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Telefono</th>
                    <th scope="col colspan=2" class="text-center">Opcion</th>
                    <th scope="col colspan=2" class="text-center">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                    foreach ($users as $mascota) {
                  ?>
                      <tr class="">
                        <td scope="row"><?php echo $mascota->Pet_ID; ?></td>
                        <td><?php echo $mascota->Pet_Name; ?></td>
                        <td><?php echo $mascota->Pet_DateOfBirth; ?></td>
                        <td><?php echo $mascota->Breed_Name; ?></td>
                        <td><?php echo $mascota->Pet_Size; ?></td>
                        <td><?php echo $mascota->Pet_Height; ?></td>
                        <td><?php echo $mascota->Pet_Weight; ?></td>
                        <td><?php echo $mascota->Pet_Sterilized; ?></td>
                        <td><?php echo $mascota->Pet_Blood_Type; ?></td>
                        <td><?php echo $mascota->Pet_QRCode; ?></td>
                        <td><?php echo $mascota->Person_ID; ?></td>
                        <td><?php echo $mascota->Person_Names; ?></td>
                        <td><?php echo $mascota->Person_Phone; ?></td>
                        <!-- <td>
                          <button class="btn btn-warning" type="button">
                            Editar
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-danger" onClick="deleteUser(<? echo $mascota->Pet_ID; ?>,<? echo $mascota->Person_ID; ?>)" type="button">
                            Eliminar
                          </button>
                        </td> -->
                      </tr>
                  <?php
                    }
                  } else {
                    echo "<tr><td colspan='14' class='text-center'>No hay mascotas registradas.</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.4/qrcode.min.js"></script>
<script src="/js/qrcode copy.js"></script>

<?php include '../template/footer.php' ?>