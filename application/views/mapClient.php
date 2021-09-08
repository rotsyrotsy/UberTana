<?php
    $passager =  $this->session->userdata('passager');
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

    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" >
    <!-- Inclusion de l'API Google MAPS -->
    <script type="text/javascript" src="<?php echo site_url("assets/js/jquery.min.js") ?>"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFX2v5z34vYKl0We4nHV4KFV1j6uVsltg&callback=main"></script>

    </script>
    <script type="text/javascript">
        function initialize() {

            var mapOptions = {
                center: new google.maps.LatLng(-18.986021, 47.532735), //se centrant sur ITU
                zoom: 19,
                mapTypeId:google.maps.MapTypeId.SATELLITE 
            };
            var carte = new google.maps.Map(document.getElementById("carteId"), mapOptions);
            var lat=[];
            var lng=[];
            google.maps.event.addListener(carte, 'click', function(event) {
                if (lat.length<2){
                    let lbl={
                       color:"white",
                       text:event.latLng.toString(),
                       fontWeight:"bold"
                    }
                    let marker = new google.maps.Marker({
                        position: event.latLng,
                        map: carte, 
                        draggable : true,
                        label: lbl
                    });
                    google.maps.event.addListener(marker, 'drag', function(event) {
                        label={
                            color:"white",
                            text:event.latLng.toString(),
                            fontWeight:"bold"
                        }
                        marker.setLabel(label);
                    })
                    lat.push(marker.getPosition().lat());
                    lng.push(marker.getPosition().lng());
                }
            });
            $('#send').on('click',function(){
              $.ajax({
                url: '<?php echo base_url('ClientController/envoiCoordonnees'); ?>',
                method: 'post',
                data:{latitude:lat[0],longitude:lng[0],destLatitude:lat[1],destLongitude:lng[1]},
                dataType: 'json',
                success: function(response) {
                  $('#verif').append(
                    "<div class='alert alert-success' role='alert'>"+
                      response+
                    "</div>"
                  );
                }
              });
            })
            
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
            <img  src="<?php echo site_url("assets/images/logo.png") ?>" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    Guide
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('ClientController/deconnexion'); ?>">
                    Deconnexion
                  </a>
                </li>
              
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
              <a class="nav-link" href="#">Client <?php echo $passager['nom']; ?></a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>
  <!-- end hero area -->


        <section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container px-0">
      <div class="heading_container">
        <h2 class="">
          Ac<span>cu</span>eil
        </h2>
      </div>

    </div>
    <div class="container container-bg">
      <div class="row " style="height:500px;">
        <div class="col-lg-8 col-md-7 px-0">
          <div id="carteId">LA CARTE</div>
        </div>
        <div class="col-md-5 col-lg-4 px-0">
            <div class="d-flex ">
              <button id="send">
                Envoyer les coordonnées
              </button>
            </div>
          <span id="verif"></span></br>
          <div>
            
            <div class="alert alert-info" role="alert">
            <a href="<?php echo base_url("ClientController/choisirChauffeur"); ?>">Liste des propositions de chauffeur</a>
            </div>
            <?php if (isset($pasDeChauffeur)){ ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $pasDeChauffeur; ?>
              </div>
            <?php } ?>
            <?php if (isset($matchReussi)){ ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $matchReussi; ?>
                </div>
            <?php } else{ 
              if (isset($propositions)){  ?>

              <div class="list-group">
                <h5>Les propositions de course</h5>
                  <?php for ($i=0; $i<count($propositions); $i++){  ?>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-light">
                      <form action="<?php echo base_url("ClientController/matchClientChauffeur"); ?>" method="post" >
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1"><?php echo $propositions[$i]['nom']; ?></h5>
                          <small class="text-muted"><?php echo $propositions[$i]['dateproposition']; ?></small>
                        </div>
                        <p class="mb-1">Email: <?php echo $propositions[$i]['iddriver']; ?></br>
                        Prix: <?php echo $propositions[$i]['proposition']; ?> coin
                        </p>
                        <input type="hidden" name="idChauffeur" value="<?php echo $propositions[$i]['iddriver']; ?>">
                        <input type="hidden" name="iddrivprop" value="<?php echo $propositions[$i]['iddrivprop']; ?>">
                        <p><button>Accepter</button></p>
                      </form>
                    </a>
                  <?php } ?>
              </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          What <span>says</span> our clients
        </h2>
      </div>
      <div class="box">
        <div class="client_id">
          <div class="name">
            <h4>
              Sandy <br>
              Nor
            </h4>
          </div>
          <div class="img-box">
            <img src="<?php echo site_url("assets/images/client.jpg") ?>" alt="">
          </div>
        </div>
        <div class="detail-box">
          <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
          </p>
          <img src="<?php echo site_url("assets/images/quote.png") ?>" alt="">
        </div>
      </div>
    </div>
  </section>
  
  <script type="text/javascript" src="<?php echo site_url("assets/js/owl.carousel.min.js") ?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script type="text/javascript" src="<?php echo site_url("assets/js/custom.js") ?>"></script>
</body>

</html>