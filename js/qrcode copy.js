document.getElementById('generate-qr-pet-btn').addEventListener('click', function () {

  const inputText = document.getElementById('qr-pet-input').value;
  const qrCodeContainer = document.getElementById('qr-pet-code');

  // Limpiar el contenedor del código QR
  qrCodeContainer.innerHTML = '';

  if (inputText.trim() === '') {
    alert('Por favor, ingresa un texto o enlace válido.');
    return;
  }

  // Crear el código QR
  const qr = qrcode(0, 'L');
  qr.addData(inputText);
  qr.make();

  // Insertar el código QR en el contenedor
  qrCodeContainer.innerHTML = qr.createImgTag(6); // Tamaño del QR
});