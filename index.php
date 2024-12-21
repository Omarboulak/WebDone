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
          <li class="nav-item active">
            <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i>Inicio</a>
          </li>
          <li class="nav-item ">
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
  <section class="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(img/slider_design.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Empresa de informatica</h2>
                <p class="animate__animated animate__fadeInUp">diseñamos tu pagina web</p>
                <a href="#nosotros" class="btn-get-started scrollto animate__animated animate__fadeInUp">Conocenos</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(datos/slider.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Hacemos que tu empresa crezca</h2>
                <p class="animate__animated animate__fadeInUp">Mejoraremos el aspecto de tu empresa para atraer clientes
                </p>
                <a href="#nosotros" class="btn-get-started scrollto animate__animated animate__fadeInUp">Conocenos</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <div id="nosotros" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Sobre WeBDone</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="img/sobre.png" alt="">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">project Maintenance</h4>
                </a>
                <p>
                  Transforma tu presencia online con un diseño web profesional y personalizado que refleje la calidad de
                  tu negocio y atraiga a tus clientes potenciales como un imán.</p>
                <p> Diseñamos web profesionales, atractivas y funcionales que diferencien tu negocio de la competencia y
                  atraigan a tu cliente ideal. </p>
                <p> Con WebDone, puedes hacer realidad cualquier idea.</p>
                <ul>
                  <li>
                    <i class="bi bi-check"></i> Crecimiento de empresa
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Precios asequibles
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Profesionalidad
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Rapidez
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Experiencia
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div><!-- End About Section -->


    <!-- ======== ELEGIRNOS ======== -->
      <div class="container elegirnos">
        <div class="row">
          <div class="col">
            <div class="wrap">
              <div class="h-slide header">
              <div class="row">
              <div class="col-lg-3 col-md-3 col-6"><label for="slide-1-trigger">Web</label></div>
              <div class="col-lg-3 col-md-3 col-6"><label for="slide-2-trigger">Logos</label></div>
              <div class="col-lg-3 col-md-3 col-6"><label for="slide-3-trigger">SEO</label></div>
              <div class="col-lg-3 col-md-3 col-6"><label for="slide-4-trigger">Mantenimiento</label></div>      
                </div>
              </div>

              <input id="slide-1-trigger" type="radio" name="slides" checked>
              <section class="slide slide-one">
                <div class="row">
                  <div class="col-lg-4 col-sm-12">
                    <img src="img/diseño_web.png" alt="">
                  </div><!-- fin col imagen -->
                  <div class="col-lg-8 col-sm-12 txt_slide align-self-center">
                    <h1>Diseño web </h1>
                    <p>En nuestro estudio, creemos que el diseño web es más que una simple apariencia; es la fusión
                      perfecta entre estética y funcionalidad. Creamos experiencias digitales únicas que capturan la
                      esencia de tu marca y la convierten en una presencia online impactante. Desde sitios web
                      intuitivos y responsivos hasta diseños innovadores que destacan, estamos comprometidos en llevar
                      tu visión al siguiente nivel. Permítenos ayudarte a hacer realidad tu proyecto digital con
                      creatividad, precisión y dedicación. </p>
                  </div><!-- fin col texto -->
                </div>

              </section>
              <input id="slide-2-trigger" type="radio" name="slides">
              <section class="slide slide-two">
                <div class="row">
                  <div class="col-lg-4">
                    <img src="img/logo_tip.png" alt="">
                  </div><!-- fin col imagen -->
                  <div class="col-lg-8 txt_slide align-self-center">
                    <h1>Creacion de logos</h1>
                    <p>Un logo es más que un simple símbolo; es la representación visual de la identidad de tu marca. En
                      nuestro equipo, diseñamos logos únicos y memorables que comunican los valores y la esencia de tu
                      empresa. Con una combinación de creatividad y estrategia, nos aseguramos de que tu logo no solo
                      destaque, sino que también resuene con tu audiencia y deje una impresión duradera. Confía en
                      nosotros para crear un logo que sea el emblema perfecto de tu marca. </p>
                  </div><!-- fin col texto -->
              </section>
              <input id="slide-3-trigger" type="radio" name="slides">
              <section class="slide slide-three">
                <div class="row">
                  <div class="col-lg-4">
                    <img src="img/seo_tip3.png" height="600" width="415" alt="">
                  </div><!-- fin col imagen -->
                  <div class="col-lg-8 txt_slide align-self-center">
                    <h1>SEO</h1>
                    <p>En la era digital, ser encontrado es tan importante como tener una presencia online. Nuestro
                      equipo de expertos en SEO trabaja incansablemente para mejorar la visibilidad de tu sitio web en
                      los motores de búsqueda. Implementamos estrategias personalizadas que incluyen investigación de
                      palabras clave, optimización on-page y off-page, y análisis de competencia, para asegurarnos de
                      que tu negocio se destaque en los resultados de búsqueda. Con nuestras soluciones de SEO, atraemos
                      tráfico cualificado a tu sitio web, incrementando tu alcance y potencial de conversión.</p>
                  </div><!-- fin col texto -->
              </section>
              <input id="slide-4-trigger" type="radio" name="slides">
              <section class="slide slide-four">
                <div class="row">
                  <div class="col-lg-4">
                    <img src="img/mantenimiento_tip.png" alt="">
                  </div><!-- fin col imagen -->
                  <div class="col-lg-8 txt_slide align-self-center">
                    <h1>Mantenimiento</h1>
                    <p>Mantener tu sitio web en óptimas condiciones es clave para garantizar una experiencia de usuario
                      fluida y segura. Nuestro servicio de mantenimiento web se encarga de actualizar, optimizar y
                      proteger tu sitio, asegurando que funcione de manera eficiente y sin interrupciones. Desde
                      actualizaciones de contenido y seguridad hasta monitoreo de rendimiento y resolución de problemas,
                      estamos aquí para que puedas centrarte en tu negocio mientras nosotros nos ocupamos del resto.
                      Confía en nuestro equipo para mantener tu presencia online siempre en su mejor estado.</p>
                  </div><!-- fin col texto -->
              </section>
            </div><!-- fin wrap -->
          </div>
        </div>

        <!-- ====== empresas ====== -->
        <div class="empresas text-center mt-5">
          <div class="row">
            <div class="col-4 col-md-4 col-lg-2">
              <a href="#"><a href="#"><img src="img/logo_01.png" alt=""></a>
            </div><!-- fin col -->
            <div class="col-4 col-md-4 col-lg-2">
              <a href="#"><img src="img/logo_02.png" alt=""></a>
            </div><!-- fin col -->
            <div class="col-4 col-md-4 col-lg-2">
              <a href="#"><img src="img/logo_03.png" alt=""></a>
            </div><!-- fin col -->
            <div class="col-4 col-md-4 col-lg-2">
              <a href="#"><img src="img/logo_04.png" alt=""></a>
            </div><!-- fin col -->
            <div class="col-4 col-md-4 col-lg-2">
              <a href="#"><img src="img/logo_05.png" alt=""></a>
            </div><!-- fin col -->
            <div class="col-4 col-md-4 col-lg-2">
              <a href="#"><img src="img/logo_06.png " alt=""></a>
            </div><!-- fin col -->
          </div>
        </div><!-- fin empresas-->
      </div><!-- fin container -->



    <!-- ======= Rviews Section ======= -->
    <div class="reviews-area">
      <div class="row g-0">
        <div class="col-lg-12 work-right-text text-center">
          <div class="px-5 py-5 py-lg-0">
            <h2 class="mb-5">Quieres trabajar con nosotros</h2>
            <h5>Diseño | Logos | SEO | Mantenimiento</h5>
            <a href="contacto.php" class="ready-btn scrollto">saber mas</a>
          </div>
        </div>
      </div>
    </div><!-- End Reviews Section -->


    <!-- ======= Team Section ======= -->
    <div id="team" class="our-team-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Nuestro Equipo</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="assets/img/team/1.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Omar Boulakchour</h4>
                <p>Ceo</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="assets/img/team/2.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Andrew Arnold</h4>
                <p>Web Developer</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="assets/img/team/3.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Lellien Linda</h4>
                <p>Web Design</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="assets/img/team/4.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Jhon Powel</h4>
                <p>Seo Expert</p>
              </div>
            </div>
          </div>
          <!-- End column -->
        </div>
      </div>
    </div><!-- End Team Section -->


    <!-- ======= Portfolio Section ======= -->
    <div id="portfolio" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Our Portfolio</h2>
            </div>
          </div>
        </div>
        <div class="row wesome-project-1 fix">
          <!-- Start Portfolio -page -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Todo</li>
              <li data-filter=".filter-app">Logo</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row awesome-project-content portfolio-container">
          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="img/web1.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/web1.jpg">
                      <h4>CakeZone</h4>
                      <span>Diseño web</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="img/geodes_logo.svg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/geodes_logo.svg">
                      <h4>Geodes</h4>
                      <span>Logo</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="img/web2.png" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/web2.png">
                      <h4>SpasMag</h4>
                      <span>Diseño web</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="img/adno_logo.svg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/adno_logo.svg">
                      <h4>Creative Team</h4>
                      <span>Web design</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="img/web4.png" alt="" /></a>
                <div class="add-actions text-center text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/web4.png">
                      <h4>Adnox</h4>
                      <span>Logo</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="img/web3.png" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="img/web3.png">
                      <h4>Uoni</h4>
                      <span>Diseño web</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

        </div>
      </div>
    </div><!-- End Portfolio Section -->



    <!-- ======= Suscribe Section ======= -->
    <div class="suscribe-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
            <div class="suscribe-text text-center">
              <h3>Bienvenido a WebbDone</h3>
              <a class="sus-btn" href="diseño.php">Ver Presupuesto</a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Suscribe Section -->

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