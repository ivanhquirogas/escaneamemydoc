<?php include '../template/header.php' ?>
<link rel="stylesheet" href="css/main.css">

<main>
  <div class="container-fluid mt-0">
    <div class="row justify-content-center">
      <div class="col-md-3 py-2">
        <div class="card container-fluid">
          <div class="card-header text-center fw-bold fs-5">
            Generador de Códigos QR
          </div>
          <div style="text-align: center;">
            <p>Proporciona los siguientes datos para generar tu código QR:</p>
            <ul style="display: inline-block; text-align: left;">
              <li>Nombre de la mascota</li>
              <li>Nombre del dueño</li>
              <li>Teléfono de contacto</li>
            </ul>
          </div>
          <div class="form-group">
            <input type="text" id="qr-input" placeholder="Escribe aquí..." />
            <!-- <button id="generate-btn">Generar QR</button> -->
          </div>
          <div>
            <button id="generate-btn">Generar QR</button>
          </div>
          <div id="qr-code"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Importar biblioteca QRCode.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.4/qrcode.min.js"></script>
  <script src="../js/qrcode.js"></script>
</main>

<?php include '../template/footer.php' ?>