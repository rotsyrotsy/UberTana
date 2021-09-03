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
        <p>Latitude:<input type="text" id="destinationLat"></p>
        <p>Longitude:<input type="text" id="destinationLong"></p>
        <p><input type="submit" id = "submitDestination"></p>
    <ul id="listChauffeurs"></ul>
   
    <script src="<?php echo getJs("jquery.min.js") ?>"></script>
    <script src="<?php echo getJs("angular.min.js") ?>"></script>

     <script> //En AJAX jQuery
        $(document).ready(function(){
            $('#submitDestination').click(function(){
                let destLat = $('#destinationLat').val();
                let destLng = $('#destinationLong').val();
                navigator.geolocation.getCurrentPosition(function(position) {
                    $.ajax({
                        url:'Accueil/envoiCoordonnees',
                        type:'post',
                        data:{latitude: position.coords.latitude, longitude: position.coords.longitude, destLatitude: destLat, destLongitude: destLng},
                        dataType : 'json',
                        success:function(response){  
                            console.log(response);
                            for (let i=0; i<response.length; i++){
                                $('#listChauffeurs').append(
                                    "<a href='Accueil/choisirChauffeur/"+response[i].id+"'><li>"+response[i].id+"</li></a>"
                                )
                            }
                            
                        }
                    })
                })
            })
           
        });
     </script>

</body>
</html>