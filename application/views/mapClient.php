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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <script type="text/javascript">
        function initialize() {

            var mapOptions = {
                center: new google.maps.LatLng(-18.933333, 47.516667),
                zoom: 18,
                mapTypeId:google.maps.MapTypeId.SATELLITE 
            };
            var carte = new google.maps.Map(document.getElementById("carteId"), mapOptions);
            var lat=[];
            var lng=[];
            google.maps.event.addListener(carte, 'click', function(event) {
                if (lat.length<2){
                    new google.maps.Marker({
                        position: event.latLng,
                        map: carte, 
                        draggable : true
                    });
                    lat.push(event.latLng.lat());
                    lng.push(event.latLng.lng());
                }
            });
            $('#send').on('click',function(){
              
                console.log($('#idPassager').val());
            })
            
        }
        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>

<body >
  <input type="hidden" id="idPassager" value="<?php echo $idPassager['email']; ?>">
        <section class="contact_section layout_padding-bottom layout_padding2-top">
    <div class="container px-0">
      <div class="heading_container">
        <h2 class="">
          Ac<span>cu</span>eil
        </h2>
      </div>

    </div>
    <div class="container container-bg">
      <div class="row " style="height:700px;">
        <div class="col-lg-8 col-md-7 px-0">
          <div id="carteId">LA CARTE</div>
        </div>
        <div class="col-md-5 col-lg-4 px-0">
            <div class="d-flex ">
            <!-- <a href = <?php echo base_url("ClientController/envoiCoordonnees"); ?>>
                SEND POSITION
            </a> -->
              <button id="send">
                SEND POSITION
              </button>
            </div>
          <div id="verif"></div>
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