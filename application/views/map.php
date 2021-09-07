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
    <!-- Inclusion de l'API Google MAPS -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <script type="text/javascript">
        function initialize() {

            var mapOptions = {
                center: new google.maps.LatLng(-18.918336417241246, 47.81443597439232), //se centrant sur ITU
                zoom: 18,
                mapTypeId:google.maps.MapTypeId.SATELLITE 
            };
            var carte = new google.maps.Map(document.getElementById("carteId"), mapOptions);
            google.maps.event.addListener(carte, 'click', function(event) {
                    new google.maps.Marker({
                        position: event.latLng,//coordonnée de la position du clic sur la carte
                        map: carte, //la carte sur laquelle le marqueur doit être affiché
                        draggable : true
                    });
                    alert(event.latLng)
                });
        }
        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>

<body>
    <div id="carteId"></div>
</body>

</html>