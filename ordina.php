<?php
ob_start();
session_start();
if(!$_SESSION["AUTENTICATO"]=="ok"){
    header("Location: php/login.php");
}
const DEBUG = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Ordina</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.jpg" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/stile.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Day
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Updated: May 04 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="starter-page-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">panini@newtonpertini.edu.it</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+39 *** *** ****</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">Panini Newton-Pertini</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="index.php" class="">Home</a></li>
            <li><a href="visualizza_ordini.php">Visualizza ordini</a></li>
            <li><a href="php/logout.php">Logout</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>

    </div>

  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Ordina</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span class="">Inserimento nuovo ordine</span>
        <h2>Inserimento nuovo ordine</h2>
        <p>Compila il form con il tuo ordine</p>
      </div><!-- End Section Title -->

      <div class="container">

        <?php
        $msg = "";
        if (isset($_POST["inserimento"])) {
            $msg = "";

            try {
                $connessione = mysqli_connect(
                    "localhost",
                    "root",
                    "root",
                    "panini",
                );

                $sql =
                    "INSERT INTO prenotazioni (user, panino_cotto, panino_crudo, panino_formaggio, panino_sopressa, pizzetta, torta_salata, croissant, yogurt, plesso, data, ora) VALUES ('" .
                    $_SESSION["USER"] .
                    "','" .
                    $_POST["panino_cotto"] .
                    "','" .
                    $_POST["panino_crudo"] .
                    "','" .
                    $_POST["panino_formaggio"] .
                    "','" .
                    $_POST["panino_sopressa"] .
                    "','" .
                    $_POST["pizzetta"] .
                    "','" .
                    $_POST["torta_salata"] .
                    "','" .
                    $_POST["croissant"] .
                    "','" .
                    $_POST["yogurt"] .
                    "','" .
                    $_POST["plesso"] .
                    "','" .
                    date("Y-m-d") .
                    "','" .
                    date("H:i:s") .
                    "');";

                // Per il debug
                if (DEBUG) {
                    print_r($_POST);
                    print_r($sql);
                    //exit();
                }
                $connessione->query($sql);
                $msg = "Ordine inserito";
                
                ob_clean();
                header('Location: visualizza_ordini.php');
                exit();
                
              } catch (Exception $e) {
                  // Gestione dell'errore tramite try-catch:
                  // https://www.w3schools.com/php/php_exceptions.asp
                  // gestione dell'eccezione: https://www.php.net/manual/en/language.exceptions.php
                  $msg = "ERRORE: " . $e->getMessage();
              }
            // Prima di "abbandonare" la pagina chiudeo la connessione al database: l'oggetto $connessione verrà distrutto/de-allocato
            $connessione->close();

          }
        ?>
        <fieldset>
          <form class="form-panini" method="post" action="ordina.php">
              <label for="panino_cotto">Panin0 al prosciutto cotto</label>
              <input type="number" name="panino_cotto" max="8" min="0">

              <label for="panino_crudo">Panin0 al prosciutto crudo</label>
              <input type="number" name="panino_crudo" max="8" min="0">

              <label for="panino_formaggio">Panin0 al formaggio</label>
              <input type="number" name="panino_formaggio" max="8" min="0">

              <label for="panino_sopressa">Panin0 alla sopressa</label>
              <input type="number" name="panino_sopressa" max="8" min="0">

              <label for="pizzetta">Pizzetta</label>
              <input type="number" name="pizzetta" max="8" min="0">

              <label for="torta_salata">Torta salata</label>
              <input type="number" name="torta_salata" max="8" min="0">

              <label for="croissant">Croissant</label>
              <input type="number" name="croissant" max="8" min="0">

              <label for="yogurt">Yogurt</label>
              <input type="number" name="yogurt" max="8" min="0">

              <label for="plesso">Plesso</label>
              <select name="plesso">
                  <option value="P">Pertini</option>
                  <option value="N">Newton</option>
              </select>
              <input type="submit" value="Invio" name="inserimento">
          </form>
        </fieldset>
        <?php 
        // Controllo se il parametro err, passato mediante query-string, contiene messaggi

        //https://www.w3schools.com/php/func_var_empty.asp
        if (isset($_GET["msg"]) && !empty($_GET["msg"])) {
            echo "<p class='messaggio'>" . $_GET["msg"] . "</p>";
        } ?>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6">
          <div class="footer-about">
            <a href="index.php" class="logo sitename">Merende N-P</a>
            <div class="footer-contact pt-3">
              <p>Via Giacomo Puccini 27</p>
              <p>35012 Camposampiero PD</p>
              <p class="mt-3"><strong>Telefono:</strong> <span>+39 *** *** ****</span></p>
              <p><strong>Email:</strong> <span>panini@newtonpertini.edu.it</span></p>
            </div>
            <div class="social-links d-flex mt-4">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Link utili</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>I nostri servizi</h4>
          <ul>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Newsletter</h4>
          <p>Iscriviti alla nostra newsletter per ricevere gli ultimi aggiornamenti sui nostri prodotti e partnership!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Merende Newton-Pertini</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        Adapted by <a href="#">Gianni Nacu</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>