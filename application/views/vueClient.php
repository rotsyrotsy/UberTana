<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <p>Destination</p>
        
        <p>Latitude:<input type="text" id="lat"></p>
        <p>Longitude:<input type="text" id="long"></p>
        <p>destinationlat:<input type="text" id="destinationLat"></p>
        <p>destinationlong:<input type="text" id="destinationLong"></p>
        <p><input type="submit" id = "submitDestination"></p>
    <p id="verif"></p>
    <p><a href="<?php echo base_url("ClientController/choisirChauffeur"); ?>">Liste des propositions chauffeur</a></p>
    <?php if (isset($pasDeChauffeur)){
        echo $pasDeChauffeur; 
    } ?>
   
    <script src="<?php echo getJs("jquery.min.js") ?>"></script>
    <script src="<?php echo getJs("angular.min.js") ?>"></script>

     <script> //En AJAX jQuery
        $(document).ready(function(){
            $('#submitDestination').click(function(){
                let lat = $('#lat').val();
                let long = $('#long').val();
                let destLat = $('#destinationLat').val();
                let destLng = $('#destinationLong').val();
                // navigator.geolocation.getCurrentPosition(function(position) {
                    $.ajax({
                        url:'<?php echo base_url("ClientController/envoiCoordonnees"); ?>',
                        type:'post',
                        data:{latitude: lat, longitude: long, destLatitude: destLat, destLongitude: destLng},
                        dataType : 'json',
                        success:function(response){  
                            console.log(response);
                            $('#verif').append(response);
                        }
                    })
            })
           
        });
     </script>

</body>
</html>