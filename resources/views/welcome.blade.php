<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proyecto Bases de datos</title>
  <!-- Incluye el CSS de Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilo para la imagen de fondo en el body */
    body {
      background-image: url('https://www.unipamplona.edu.co/unipamplona/portalIG/home_1/recursos/noticias_2023/junio/28062023/fondo_acre_blanco.jpg'); /* Aquí puedes poner tu propia URL de imagen */
      background-size: cover;
      background-position: center;
      height: 150vh; /* Asegura que el fondo cubra todo el alto de la pantalla */
    }

    /* Estilo para el header con color gris */
    header {
      background-color: #ad3333; /* Gris */
      padding: 3px 0;
    }

    /* Estilo para el footer con color rojo */
    footer {
      background-color: #003366; /* Rojo */
      color: white;
      text-align: center;
      padding: 10px 0;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    /* Estilo para el texto en el body */
    .content {
      color: white;
      text-align: center;
      font-size: 2rem;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand text-white" href="#">Ingenio TIC</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          @if (Route::has('login'))
          @auth
            <li class="nav-item">
              <a href="{{ url('/dashboard') }}" class="nav-link text-white" href="#">Dasboard</a>
            </li>
          @else
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link text-white" href="#">Login</a>
            </li>

            @if (Route::has('register'))

            @endif
            <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link text-white" href="#">Registro</a>
            </li>
            @endauth
          @endif
        </ul>
      </div>
    </nav>
  </header>

  <!-- Body (contenido principal) -->
  <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100%;">
    <div class="content">
      <h1></h1>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 Proyecto realizado por Wilfredo Ortega Fernández & Laura Daniela Molina Celis Materia: Bases de Datos</p>
  </footer>

  <!-- Incluye el JS de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
