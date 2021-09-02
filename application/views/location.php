<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <div ng-app="app" ng-controller="control">
        <form ng-submit="submitDestination()"> -->
            <p>Destination</p>
            <p>Latitude:<input type="text" id="destinationLat" ng-model="destinationLat"></p>
            <p>Longitude:<input type="text" id="destinationLong" ng-model="destinationLong"></p>
            <p><input type="submit" id = "submitDestination" value="valider"></p>
        <!-- </form>
    </div> -->
   
    <script src="<?php echo getJs("jquery.min.js") ?>"></script>
    <script src="<?php echo getJs("angular.min.js") ?>"></script>
    <!-- <script>
        var app=angular.module('app',[]);

        app.controller('control',function ($scope,$http) {
            navigator.geolocation.getCurrentPosition(function(position) {
                $scope.submitDestination = function () {
                    $http({
                        method:'POST',
                        url:'Accueil/envoiCoordonnees',
                        params:{"latitude": position.coords.latitude, "longitude": position.coords.longitude, "destLatitude":$scope.destinationLat , "destLongitude":$scope.destinationLong},
                        headers:{'Content-type':'application/json'}
                    }).success(function(data){
                        console.log(data.data)
                    })
                }
            })
        })
    </script> -->
     <script>
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
                        }
                    })
                })
            })
           
        });
     </script>

</body>
</html>