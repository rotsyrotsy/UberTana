<?php
  if (!isset($page) || $page == null ) {
      $page = 'accueil';
  }
  // echo $page;
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>
    Uber Tana
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />


  <link href="<?php echo site_url("assets/css/bootstrap.css") ?>" rel="stylesheet">
  <link href="<?php echo site_url("assets/css/style.css") ?>" rel="stylesheet">
  <link href="<?php echo site_url("assets/css/responsive.css") ?>" rel="stylesheet">



  <script type="text/javascript" src="<?php echo site_url("assets/js/jquery-3.4.1.min.js") ?>"></script>
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="#">
            <img src="<?php echo site_url("assets/images/logo.png") ?>" alt="" />
          </a>
          <button style="background-color: rgba(255,255,255,0.25);" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link " href="<?php echo site_url('Accueil/index'); ?>">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url("Accueil/guide"); ?>">
                    Guide
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url("Accueil/login"); ?>">
                    Connexion
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('Accueil/inscription')?>?option=passager">Inscription passager</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('Accueil/inscription')?>?option=chauffeur">Inscription chauffeur</a>
                </li>

              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>
  <!-- end hero area -->


  <!-- contact section -->

  <?php include $page . ".php"; ?>

  <!-- info section -->

  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <img src="<?php echo site_url("assets/images/fb.png") ?>" alt="">
        </a>
        <a href="">
          <img src="<?php echo site_url("assets/images/twitter.png") ?>" alt="">
        </a>
        <a href="">
          <img src="<?php echo site_url("assets/images/linkedin.png") ?>" alt="">
        </a>
        <a href="">
          <img src="<?php echo site_url("assets/images/youtube.png") ?>" alt="">
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              A PROPOS
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Instagram
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipi
              scing elit, sed doLorem ipsum dolor sit
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              AIDE
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACTEZ-NOUS
            </h6>
            <div class="info_link-box">
              <a href="">
                <img src="<?php echo site_url("assets/images/location.png") ?>" alt="">
                <span> Gb road 123 london Uk </span>
              </a>
              <a href="">
                <img src="<?php echo site_url("assets/images/call.png") ?>" alt="">
                <span>+261 34 59 426 51</span>
              </a>
              <a href="">
                <img src="<?php echo site_url("assets/images/mail.png") ?>" alt="">
                <span> uberTana@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <section class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span>
          <a href="#"> Uber Tana</a>
        </p>
      </div>
    </section>
    <!-- footer section -->

  </section>

  <!-- end info section -->
  
   <script type="text/javascript" src="<?php echo site_url("assets/js/jquery-3.4.1.min.js") ?>"></script>
  <script type="text/javascript" src="<?php echo site_url("assets/js/bootstrap.js") ?>"></script>
  <script type="text/javascript" src="<?php echo site_url("assets/js/owl.carousel.min.js") ?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url("assets/js/custom.js") ?>"></script>
  <!-- <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script> -->
  <!-- <script type="text/javascript" src="assets/js/bootstrap.js"></script> -->
  <!-- <script type="text/javascript" src="assets/js/custom.js"></script> -->



</body>

</html>