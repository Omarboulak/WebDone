<!-- Abro PHP -->
<?php
//Definir las variables y establecer valores vacíos
$nameErr  = $emailErr = $subjectErr = $messageErr = "";//todos los Err valen nada
$name = $email = $subject = $message = "";//estas variables no valen nada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //validación del nombre
    if(empty($_POST["name"])) {
        $nameErr = "El nombre es obligatorio";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Sólo se permitn letras y espacios en blanco";
        }
    }


    //validación del correo electrónico
    if(empty($_POST["email"])) {
        $emailErr = "El correo electrónico es obligatorio";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de correo inválido";
        }
    }

    //Validación del asunto
    if(empty($_POST["subject"])) {
        $subjectErr = "El asunto es obligatorio";
    } else {
        $subject = test_input($_POST["subject"]);
    }

    //validación del mensaje
    if(empty($_POST["message"])) {
        $messageErr = "El mensaje es obligatorio";
    } else {
        $message = test_input($_POST["message"]);
    }

    //Si no hay errores, vamos a procesar el formulario enviándolo por correo
    if($nameErr == "" && $apellidoErr == "" && $emailErr == "" && $subjectErr == "" && $messageErr == "") {
        $to = "omarboulakchour@gmail.com";//aquí el correo donde queréis mandarlo
        $headers =  "From: " .$email."\r\n". 
                    "Reply-to: ".$email."\r\n".
                    "X-Mailer: PHP/".phpversion();
        $full_message = "Nombre: $name\nApellido: $apellido\n Correo: $email\n\nMensaje:\n$message";
        if (mail($to, $subject,$full_message,$headers)) {
            echo "<h3>Gracias por contactarnos, $name. Te responderemos lo antes posible</h3>";
            $name = $apellido = $email = $subject = $message = "";
        } else {
            echo "<h3>Lo siento, ocurrió un error al enviar tu mensaje. Inténtalo de nuevo</h3>";
        }
        //limpiar los valores después de enviar
        $name = $apellido = $email = $subject = $message = "";
        
    }
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!-- cierro PHP -->



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>eBusiness Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/logo.svg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Nabvar -->
  <link rel="stylesheet" href="navbar/navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header class="sticky-top">

    <!-- ==============  NAVBAR  ===========================-->

    <nav class="navbar navbar-expand-custom navbar-mainbg">
      <a class="navbar-brand navbar-logo" href="index.php">
        <img src="img/logo.png" alt="" height="100" width="200">
      </a>
      <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars text-black"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto me-5">
          <div class="hori-selector">
            <div class="left"></div>
            <div class="right"></div>
          </div>
          <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i>Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="diseño.php"><i class="far fa-address-book"></i>Diseño</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="promociones.php"><i class="far fa-clone"></i>Promociones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nosotros.php"><i class="far fa-calendar-alt"></i>Sobre Nosotros</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contacto.php"><i class="far fa-chart-bar"></i>Contactos</a>
          </li>
        </ul>
      </div>
    </nav>


    <!-- ============== FIN NAVBAR  ===========================-->


  </header><!-- End Header -->


  <main id="main">
    <div class="con">
      <div class="container">
        <div class="row ">
          <div class="col-lg-6 ">
            <img src="img/contacto_img.svg" alt="">
          </div>
          <div class="col-lg-6 ">`
            
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <h1 class="title text-center mb-4">Contactanos</h1>

              <!-- Name -->
              <div class="form-group position-relative mb-3">
                <input type="text" name="name" value="<?php echo $name;?>" class="form-control form-control-lg thick" placeholder="Nombre">
                <span class="error"><?php echo $nameErr;?></span>
              </div>

              <!-- E-mail -->
              <div class="form-group position-relative mb-3">
                <input type="email" name="email" value="<?php echo $email;?>" class="form-control form-control-lg thick" placeholder="E-mail">
                <span class="error"><?php echo $emailErr;?></span>
              </div>

              <!-- Asunto -->
              <div class="form-group position-relative mb-3">
                <input type="subject" name="subject" value="<?php echo $subject;?>" class="form-control form-control-lg thick" placeholder="Asunto">
                <span class="error"><?php echo $subjectErr;?></span>
              </div>

              <!-- Mensaje -->
              <div class="form-group message mb-3">
                <textarea name="message" class="form-control form-control-lg" rows="7"
                  placeholder="Mensaje"><?php echo $message;?></textarea>
                  <span class="error"><?php echo $messageErr;?></span>
              </div>

              <!-- Submit btn -->
              <div class="text-center">
                <button class="btn btn-primary" type="submit" name="submit" value="Enviar">Enviar mensaje</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 pd-add">
          <div class="address-item">
            <div class="address-icon">
              <img src="img/pin-fill.svg" alt="icono de ubicacion" height="38" width="38">
            </div>
            <h3>Ubicacion</h3>
            <p>Calle salcillo 4
              <br> Mostoles 28933 Madris
            </p>
          </div>
          <div class="address-item">
            <div class="address-icon">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
            <h3>Email Us</h3>
            <p>info@webdone.com
              <br>presupuesto@webdone.com
            </p>
          </div>
          <div class="address-item">
            <div class="address-icon">
              <img src="img/telephone-plus-fill.svg" alt="icono de telefono de contacto" height="38" width="38">
            </div>
            <h3>Llamanos</h3>
            <p>+34 123 456 789
              <br>+34 123 456 789
            </p>
          </div>
        </div>
      </div><!-- end row -->

      <div class="row mb-5">
        <div class="col">
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d760.3393048306405!2d-3.8647297303586705!3d40.33442102051278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDDCsDIwJzAzLjkiTiAzwrA1MSc1MC43Ilc!5e0!3m2!1ses!2ses!4v1721374265025!5m2!1ses!2ses" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div><!-- end container -->


  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 foot">
            <div class="copyright">
              <p>
                © 2024 WEBDONE - TODOS LOS DERECHOS RESERVADOS
              </p>
            </div>
            <div class="redes_foot">
              <a href="#"><img src="img/facebook.svg" alt="logo de facebook"></a>
              <a href="#"><img src="img/twitter-x.svg" alt="logo de twitter-x"></a>
              <a href="#"><img src="img/instagram.svg" alt="logo de instagram"></a>
            </div>
            <div class="credits">
              <span> 
                <a href="sitemap.html">Mapa del sitio</a> |
                <a href="contacto.htm">Contacto</a>
              </span> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- navbar -->
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="navbar/nabvar.js"></script>
  <!-- fin navbar -->

</body>

</html>