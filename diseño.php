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


  <!-- Slider diseño js y css -->
  <link href="slider/themes/2/js-image-slider.css" rel="stylesheet" type="text/css" />
  <script src="slider/themes/2/js-image-slider.js" type="text/javascript"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Nabvar -->
  <link rel="stylesheet" href="navbar/navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header class="fixed-top">

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
          <li class="nav-item active">
            <a class="nav-link" href="diseño.php"><i class="far fa-address-book"></i>Diseño</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="promociones.php"><i class="far fa-clone"></i>Promociones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nosotros.php"><i class="far fa-calendar-alt"></i>Sobre Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacto.php"><i class="far fa-chart-bar"></i>Contacto</a>
          </li>
        </ul>
      </div>
    </nav>


    <!-- ============== FIN NAVBAR  ===========================-->





  </header><!-- End Header -->

  <!-- ======= hero Section ======= -->
  <section class="hero" class="hero_d">
    <div class="hero-container">
      <div class="carousel-item active" style="background-image: url(img/port_diseño.png)">
        <div class="carousel-container">
          <div class="container">
            <h2>Empresa de informatica</h2>
            <p>Diseñamos tu pagina web</p>
            <a href="#nosotros" class="btn-get-started scrollto">Conocenos</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->



  <!-- ================== MAIN ================ -->

  <main id="main">





    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Our Services</h2>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-code"></i>
                  </a>
                  <h4>Experto en Programación</h4>
                  <p>
                    El experto en programación se encargará de asegurarse de que el prototipo tenga un aspecto
                    terminado, insertando texto o fotos según sea necesario.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-window-fullscreen"></i>
                  </a>
                  <h4>Diseñador Creativo</h4>
                  <p>
                    El diseñador creativo tendrá que asegurarse de que el prototipo parezca acabado, insertando texto o
                    fotos para completar el diseño.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-wordpress"></i>
                  </a>
                  <h4>Desarrollador de Wordpress</h4>
                  <p>
                    El desarrollador de Wordpress deberá asegurarse de que el prototipo esté completo, añadiendo texto o
                    imágenes para dar un aspecto finalizado.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-globe"></i>
                  </a>
                  <h4>Redes Sociales</h4>
                  <p>
                    El especialista en marketing en redes sociales deberá garantizar que el prototipo tenga un aspecto
                    terminado, insertando texto o fotos según sea necesario.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-graph-up-arrow"></i>
                  </a>
                  <h4>SEO</h4>
                  <p>
                    El experto en SEO tendrá la responsabilidad de asegurarse de que el prototipo luzca terminado,
                    añadiendo texto o imágenes para completar el aspecto final.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-calendar4-week"></i>
                  </a>
                  <h4>Soporte 24/7</h4>
                  <p>
                    El equipo de soporte 24/7 se asegurará de que el prototipo tenga un aspecto acabado, insertando
                    texto o fotos cuando sea necesario para dar una impresión final.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Services Section -->


    <!-- ======= Pricing Section ======= -->
    <div id="pricing" class="pricing-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Pricing Table</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="pri_table_list">
              <h3>Basica <br /> <span> 400€</span></h3>
              <ol>
                <li class="check"><i class="bi bi-check"></i><span>cinco secciones</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Responsive</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Redes Sociales</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Contacto y localizacion</span></li>
                <li class="cross"><i class="bi bi-x"></i><span>Free domin</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Maquetacion</span></li>
                <li class="check"><i class="bi bi-x"></i><span>SEO</span></li>
                <li class="cross"><i class="bi bi-x"></i><span>Pago online</span></li>
              </ol>
              <button><a class="nada" href="contacto.php">Pedir presupuesto</a></button>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="pri_table_list active">
              <span class="saleon">Popular</span>
              <h3>Estandar <br /> <span>1000€</span></h3>
              <ol>
                <li class="check"><i class="bi bi-check"></i><span>Diez secciones</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Responsive</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Redes Sociales</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Contacto y localizacion</span></li>
                <li class="cross"><i class="bi bi-x"></i><span>Free domin</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Maquetacion</span></li>
                <li class="check"><i class="bi bi-check"></i><span>SEO</span></li>
                <li class="check"><i class="bi bi-x"></i><span>Pago online</span></li>
              </ol>
              <button><a class="nada" href="contacto.php">Pedir presupuesto</a></button>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="pri_table_list">
              <h3>Avanzada <br /> <span>2100€</span></h3>
              <ol>
                <li class="check"><i class="bi bi-check"></i><span>Secciones que sean necesarias</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Responsive</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Redes Sociales</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Contacto y localizacion</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Free domin</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Maquetacion</span></li>
                <li class="check"><i class="bi bi-check"></i><span>SEO</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Pago online</span></li>
              </ol>
              <button><a class="nada" href="contacto.php">Pedir presupuesto</a></button>
            </div>
          </div>
        </div>
      </div>


      <!-- ======================= LOGO Y MANTENIMIENTO =========================== -->

        <div class="container lym">
          <div class="row justify-content-between">
            <div class="col-md-4 offset-lg-2 col-offset-md-2 col-sm-6">
              <div class="pricingTable10">
                <div class="pricingTable-header">
                  <h3 class="heading">Mantenimiento</h3>
                  <span class="price-value">
                    <span class="currency">€</span> 30
                  </span>
                </div>
                <div class="pricing-content">
                  <ul>
                    <li>1 revision gratis</li>
                    <li>1 mes gratis</li>
                  </ul>
                  <a href="contacto.php" class="read">Contactanos</a>
                </div>
              </div>
            </div><!-- fin col-->
            <div class="col-md-4 col-sm-6">
              <div class="pricingTable10">
                <div class="pricingTable-header">
                  <h3 class="heading">Logo</h3>
                  <span class="price-value">
                    <span class="currency">€</span> 40
                  </span>
                </div>
                <div class="pricing-content">
                  <ul>
                    <li>2 revisiones gratis</li>
                    <li>2 diseños a elegir</li>
                  </ul>
                  <a href="contacto.php" class="read">Contactanos</a>
                </div>
              </div>
            </div><!-- fin col -->

            <div class="col-md-2 col-lg-2"></div>
          </div>
        </div>
    </div><!-- End Pricing Section -->

    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
      <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Contactanos</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-phone"></i>
                  <p>
                    Telefono: +34 123456789<br>
                    <span>Lunes-Viernes (9am-6pm)</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-envelope"></i>
                  <p>
                    Email: info@webbdone.com<br>
                    <span>Web: www.webbdone.com</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-geo-alt"></i>
                  <p>
                    Ubicacion: calle salcillo<br>
                    <span>Mostoles 28922, Madrid</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- Start Google Map -->
            <div class="col-md-6">
              <!-- Start Map -->
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d760.3425146212533!2d-3.8626830088944177!3d40.334136156973734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1718185156570!5m2!1ses!2ses"
                width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
              <!-- End Map -->
            </div>
            <!-- End Google Map -->

            <!-- Start  contact -->
            <div class="col-md-6">
              <div class="form contact-form">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form" class="php-email-form">
                  <div class="form-group">
                    <input type="text" name="name" value="<?php echo $name;?>" class="form-control" id="name" placeholder="Nombre">
                    <span class="error"><?php echo $nameErr;?></span>
                  </div>
                  <div class="form-group mt-3">
                    <input type="email" class="form-control" value="<?php echo $email;?>"  name="email" id="email" placeholder="Email">
                    <span class="error"><?php echo $emailErr;?></span>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" value="<?php echo $subject;?>" name="subject" id="subject" placeholder="Asunto">
                    <span class="error"><?php echo $subjectErr;?></span>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Mensaje"><?php echo $message;?></textarea>
                    <span class="error"><?php echo $messageErr;?></span>
                  </div>
                  <div class="my-3">
                    <div class="loading">Cargando</div>
                    <div class="error-message"></div>
                    <div class="sent-message">El mensaje ha sido enviado. ¡Muchas gracias!</div>
                  </div>
                  <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
                </form>
              </div>
            </div>
            <!-- End Left contact -->
          </div>
        </div>
      </div>
    </div><!-- End Contact Section -->
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





  <!-- ======= POLITICA DE COOKIES  ======= -->

  <div class="cookiesms" id="cookies1">
    Este sitio web usa cookies, pedes ver <a href="http//www.eldominio.com/politica-cookies.html">la política de cookies
      aquí</a> -
    <button onclick="controlcookies()">Aceptar</button>
    <div class="cookies2">
      Política de cookies +
    </div>
  </div>

  <script>
    if (!localStorage.controlcookies > 0) {
      cookies1.setAttribute("style", "animation:desaparecer 5s;");
    }
  </script>

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