<?php include 'template/header.php' ?>
<link rel="stylesheet" href="css/main.css">

<body>
  <header class="borde">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/BirdsWater.png" class="img-fluid" alt="Slide1">
        </div>
        <div class="carousel-item">
          <img src="./img/CatEyes1.png" class="img-fluid" alt="Slide2">
        </div>
        <div class="carousel-item">
          <img src="./img/DogPugRest.png" class="img-fluid" alt="Slide3">
        </div>
        <div class="carousel-item">
          <img src="./img/Birds.png" class="img-fluid" alt="Slide1">
        </div>
        <div class="carousel-item">
          <img src="./img/CatEyes2.png" class="img-fluid" alt="Slide2">
        </div>
        <div class="carousel-item">
          <img src="./img/Dogs.png" class="img-fluid" alt="Slide3">
        </div>
        <div class="carousel-item">
          <img src="./img/BirdEating.png" class="img-fluid" alt="Slide1">
        </div>
        <div class="carousel-item">
          <img src="./img/CatEyes3.png" class="img-fluid" alt="Slide2">
        </div>
        <div class="carousel-item">
          <img src="./img/DogStick.png" class="img-fluid" alt="Slide3">
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </header>

  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card" style="width: 15rem;">
          <img src="./img/DocsCat.jpeg" class="card-img-top" alt="Medicos con gato en consulta">
          <div class="card-body">
            <h5 class="card-title">Consulta Medica</h5>
            <p class="card-text">Especialistas en medicina veterinaria para tus peluditos.</p>
            <br>
            <a href="./pages/consultamed.php" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 15rem;">
          <img src="./img/CatInjection.jpg" class="card-img-top" alt="Gato recibiendo vacuna">
          <div class="card-body">
            <h5 class="card-title">Vacunación</h5>
            <p class="card-text">La mejor protección para tu peludito con las vacunas necesarias para su bienestar y salud.</p>
            <a href="./pages/vacunacion.php" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 15rem;">
          <img src="./img/DogsQr.jpeg" class="card-img-top" alt="Perros con codigo Qr en el collar">
          <div class="card-body">
            <h5 class="card-title">Codigo QR</h5>
            <p class="card-text">Contamos con nuestro propio sistema de identificacion ara esos traviesos que se escapan.</p>
            <a href="./pages/qrcode.php" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <section class="w-auto mx-auto text-ceter pt-1" id="intro">
      <h3 class="text-center">
        ¿Por qué somos diferentes?<br>
        <span class="text-primary">Escaneame My Doc</span>
      </h3>
      <p class="text-center fs-4">
        <span class="text-primary">Medicina Integral</span><br>
        Somos especialistas en perros y gatos con atencionen emergencias y asesoria preventiva para cuidar la salud de tu mascota.
      </p>
    </section>
  </div>

  <section class="borde nosotros">
    <div class="border-top border-2 d-flex" id="local">
      <div class="mapa p-3" style="flex: 1">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.3400522848033!2d-74.11447392415582!3d4.710862741567595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bf8054fdd45%3A0x51e46a5a7a9a8e79!2sPortal%2080%20-%20TransMilenio!5e0!3m2!1ses!2sco!4v1731628493543!5m2!1ses!2sco"
          width="400"
          height="400"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="wrapper p-3 fs-8" style="flex: 2">
        <h1 class="text-center">Ubicados en Bogotá D.C.</h1>
        <h1 class="text-center text-primary mb-2 fs-8" id="typewriter"></h1>
        <p class="fs-4" style="text-align: justify;">
          Clínica ubicada en la capital de la república en una excelente
          zona comercial con parqueaderos cercanos y centros comerciales
          para que disfrutes tu día mientras consentimos a tu mascota.
          También contamos con domicilio dentro y fuera de la ciudad. <br>
        </p>
        <p class="text-center fs-4">
          ¡Somos a mejor opción para tus peluditos especiales!
        </p>
        <section class="d-flex justify-content-center text-center" id="numeros-local">
          <div>
            <p class="text-primary fs-2 text-center">365</p>
            <p class="text-center">Días del año</p>
          </div>
          <div>
            <p class="text-primary fs-2 text-center">24</p>
            <p class="text-center">Horas</p>
          </div>
          <div>
            <p class="text-primary fs-2 text-center">Transporte</p>
            <p class="text-center">$ 0 Cop</p>
          </div>
        </section>
      </div>
    </div>
  </section>

  <section id="seccion-contacto">
    <div>
      <div id="bg-contacto border-bottom border-secondary border-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -440 1440 760">
          <path
            fill="#0d6efd"
            fill-opacity="1"
            d="M0,160L40,181.3C80,203,160,245,240,224C320,203,400,117,480,80C560,43,640,53,720,90.7C800,128,880,192,960,186.7C1040,181,1120,107,1200,106.7C1280,107,1360,181,1400,218.7L1440,256L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
        <div class="container" id="contenedor-formulario">
          <div id="titulo-formulario" class="text-center mb-4">
            <div>
              <img
                src="./img/soporte.png"
                alt="Logo Empresa contacto"
                class="img-fluid" />
            </div>
            <h2>Contactanos</h2>
            <p class="fs-4">
              te esperamos para conocer a tus mejores peludos amigos
            </p>
          </div>
          <form action="">
            <div class="mb-3">
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="name@example.com" />
            </div>
            <div class="mb-3">
              <input
                type="text"
                class="form-control"
                id="nombre"
                placeholder="Nombre" />
            </div>
            <div class="mb-3">
              <input
                type="tel"
                class="form-control"
                id="tel"
                placeholder="000-000-0000" />
            </div>
            <div class="mb-3">
              <textarea
                class="form-control"
                id="mensaje"
                rows="3"
                placeholder="Cuentanos"></textarea>
            </div>
            <div class="mb-3">
              <button type="button" class="btn btn-primary w-100 fs-4">
                Enviar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

<?php include 'template/footer.php' ?>