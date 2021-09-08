<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <p><input type="submit" id = "EnvoiCoord" value="Envoyer les coordonnées"></p>
        <ul id="listeClient"></ul>
        <?php if (isset($response)){ ?>
            <p ><?php echo $response; ?></p>
        <?php } ?>
        
   
    <script src="<?php echo getJs("jquery.min.js") ?>"></script>
    <script src="<?php echo getJs("angular.min.js") ?>"></script>

     <script> //En AJAX jQuery
        $(document).ready(function(){
            $('#envoiProp').click(function(){
                let idPassager = $('#idPassager').val();
                console.log(idPassager);
            });

            $('#EnvoiCoord').click(function(){
                navigator.geolocation.getCurrentPosition(function(position) {
                    let lat =  position.coords.latitude;
                    let long =position.coords.longitude;
                    $.ajax({
                        url:'<?php echo base_url("ChauffeurController/envoiCoordonnees"); ?>',
                        type:'post',
                        data:{latitude: lat, longitude: long},
                        dataType : 'json',
                        success:function(response){  
                            console.log(response);
                            for (let i=0; i<response.length; i++){

                                $('#listeClient').append(
                                    "<form action='<?php echo base_url("ChauffeurController/envoiProposition"); ?>' method='get'>"+
                                    "<li>"+response[i]['nom']+"</li>"+
                                    "<li>"+response[i]['latitude']+"</li>"+
                                    "<li>"+response[i]['longitude']+"</li>"+
                                    "<li>"+response[i]['destLat']+"</li>"+
                                    "<li>"+response[i]['destLng']+"</li>"+
                                    "<input type='hidden' name='idPassager' value='"+response[i]['idPassager']+"'>"+
                                    "<p>Prix: <input type='text' name='prix'></p>"+
                                    "<p><input type='submit' value='Proposer'></p>"+
                                    "</form>"+
                                    "</br>"
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