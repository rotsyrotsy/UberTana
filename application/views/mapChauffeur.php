<?php
  $chauffeur = null;
  if ($this->session->userdata('chauffeur')==null){
    redirect(site_url());
  }else{
    $chauffeur =  $this->session->userdata('chauffeur');
  }
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <style type="text/css">
    html {
      height: 100%
    }

    body {
      height: 100%;
      margin: 0;
      padding: 0
    }

    #carteId {
      height: 100%
    }
  </style>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />

  <link href="<?php echo site_url("assets/css/style.css") ?>" rel="stylesheet">
  <link href="<?php echo site_url("assets/css/responsive.css") ?>" rel="stylesheet">

  <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
  <!-- Inclusion de l'API Google MAPS -->
  <script type="text/javascript" src="<?php echo site_url("assets/js/jquery.min.js") ?>"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFX2v5z34vYKl0We4nHV4KFV1j6uVsltg&callback=main&libraries=places"></script>

  </script>
  <script type="text/javascript">
    function initialize() {

      var currSvgMarker = {
        path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
        fillColor: "blue",
        fillOpacity: 0.6,
        strokeWeight: 0,
        rotation: 0,
        scale: 2,
        anchor: new google.maps.Point(15, 30),
      };
      var mapOptions = {
        center: new google.maps.LatLng(-18.986021, 47.532735), //se centrant sur ITU
        zoom: 19,
        mapTypeId: google.maps.MapTypeId.HYBRID
      };
      var carte = new google.maps.Map(document.getElementById("carteId"), mapOptions);
      var lat = null;
      var lng = null;
      google.maps.event.addListener(carte, 'click', function(event) {
        let lbl = {
          color: "white",
          text: event.latLng.toString(),
          fontWeight: "bold"
        }
        let marker = new google.maps.Marker({
          position: event.latLng,
          map: carte,
          draggable: true,
          label: lbl
        });
        google.maps.event.addListener(marker, 'drag', function(event) {
          label = {
            color: "white",
            text: event.latLng.toString(),
            fontWeight: "bold"
          }
          marker.setLabel(label);
        })
        lat = marker.getPosition().lat();
        lng = marker.getPosition().lng();

      });
      $('#EnvoiCoord').on('click', function() {

        $.ajax({
          url: '<?php echo base_url("ChauffeurController/envoiCoordonnees"); ?>',
          type: 'post',
          data: {
            latitude: lat,
            longitude: lng
          },
          dataType: 'json',
          success: function(response) {
            console.log(response);

            if (Array.isArray(response)) {
              for (let i = 0; i < response.length; i++) {
                let lbl = {
                  color: "blue",
                  text: response[i]['nom'],
                  fontWeight: "bold"
                }
                new google.maps.Marker({
                  position: new google.maps.LatLng(response[i]['latitude'], response[i]['longitude']),
                  map: carte,
                  label: lbl
                });
                new google.maps.Marker({
                  position: new google.maps.LatLng(response[i]['destLat'], response[i]['destLng']),
                  map: carte,
                  label: lbl
                });
                $('#listeClient').append(
                  "<form action='<?php echo base_url("ChauffeurController/envoiProposition"); ?>' method='post'>" +
                  "<div class='d-flex w-100 justify-content-between'>" +
                  "<h4 class='mb-1'>" + response[i]['nom'] + "</h4>" +
                  "</div>" +
                  "<p class='mb-1'><input type='number' class='form-control' aria-label='Prix à proposer' name='prix'></p>" +
                  "<input type='hidden' name='idPassager' value='" + response[i]['idPassager'] + "'>" +
                  "<p><button>Proposer</button></p></br>" +
                  "</form>"
                )
              }
            } else {
              $('#listeClient').append(
                "<div class='alert alert-danger' role='alert'>" +
                response +
                "</div>"
              )
            }

          }
        })

      })

      // Create the search box and link it to the UI element.
      const input = document.getElementById("pac-input");
      const searchBox = new google.maps.places.SearchBox(input);
      // Bias the SearchBox results towards current map's viewport.
      carte.addListener("bounds_changed", () => {
        searchBox.setBounds(carte.getBounds());
      });
      let markers = [];
      // Listen for the event fired when the user selects a prediction and retrieve
      // more details for that place.
      searchBox.addListener("places_changed", () => {
        const places = searchBox.getPlaces();

        if (places.length == 0) {
          return;
        }
        // Clear out the old markers.
        markers.forEach((marker) => {
          marker.setMap(null);
        });
        markers = [];
        // For each place, get the icon, name and location.
        const bounds = new google.maps.LatLngBounds();
        places.forEach((place) => {
          if (!place.geometry || !place.geometry.location) {
            console.log("Returned place contains no geometry");
            return;
          }
          const icon = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25),
          };
          // Create a marker for each place.
          markers.push(
            new google.maps.Marker({
              carte,
              icon,
              title: place.name,
              position: place.geometry.location,
            })
          );

          if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
          } else {
            bounds.extend(place.geometry.location);
          }
        });
        carte.fitBounds(bounds);
      });


    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.html">
          <img src="<?php echo site_url("assets/images/uberfinal-removebg-preview.png") ?>" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo site_url('ChauffeurController/index'); ?>">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('ChauffeurController/guide'); ?>">
                    Guide
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('ChauffeurController/achatCoin'); ?>">
                    Dépôt
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('ChauffeurController/deconnexion'); ?>">
                    Deconnexion
                  </a>
                </li>

              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
              <a href="#" style=" font-style: italic; color:black; font-weight:bold;">
                  Chauffeur <?php echo $chauffeur['nom']; ?>
              </a>
              <div style="color:orange;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                  <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                </svg>
                
                <?php echo $this->session->userdata('coin')["coin"]; ?>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>
  <!-- end hero area -->


  <?php if (isset($page)){ 
    include($page.".php");
  } else { ?>
    <section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container px-0">
      <div class="heading_container">
        <h2 class="">
        <span>Local</span>isation
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row " >
        <div class="col-lg-8 col-md-7 px-0" style="height:500px">
          <div id="carteId">LA CARTE</div>
        </div>
        <div class="col-md-5 col-lg-4 px-0">
          <div class="d-flex ">
            <button id="EnvoiCoord">
              Envoyer les coordonnées
            </button>
          </div>
          <p></p>
          <input id="pac-input" class="controls" type="text" placeholder="Search Box" />

          <div class='overflow-auto'>
            <h5>Les clients à proximité</h5>
            <div id="listeClient">

            </div>

          </div>

          <?php if (isset($response)) { ?>
            <div class='alert alert-success' role='alert'>
              <?php echo $response; ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  
  <?php } ?>
  
  

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
              Principes de Confidentialites
            </h6>
            <p>
              Nous créons des normes de confidentialité qui conviennent à tous. 
              C'est une responsabilité qui s'ajoute à la création de produits et de 
              services gratuits accessibles à tous. Nous nous basons sur ces principes 
              pour orienter nos produits, nos processus et nos employés afin de respecter la 
              confidentialité et la sécurité des données de nos utilisateurs.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
          <h6>
              S&eacute;curit&eacute;
            </h6>
            <p>
              Chaque fonctionnalite de securite et chaque clause de notre Charte de la communaute contribuent
              a creer un environnement sur pur nos utilisateurs.
           </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Condition d'utilisation
            </h6>
            <p>
            Le présent document décrit les règles que vous acceptez lorsque vous utilisez nos services.
            </p>
            <a href="#">Lisez nos conditions d'utilisation</a>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACTEZ-NOUS
            </h6>
            <div class="info_link-box">
              <a href="">
                <img src="<?php echo site_url("assets/images/location.png") ?>" alt="">
                <span> IT University </span>
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


  <script type="text/javascript" src="<?php echo site_url("assets/js/custom.js") ?>"></script>
  <!-- <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script> -->
  <!-- <script type="text/javascript" src="assets/js/bootstrap.js"></script> -->
  <!-- <script type="text/javascript" src="assets/js/custom.js"></script> -->



</body>

</html>