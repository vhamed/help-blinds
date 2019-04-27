<!DOCTYPE html>
<html>
    <?php require_once 'includes/header.php'; ?>
    <link rel="stylesheet" href="css/style.css">
    <body>
        <?php 
            session_start();
            if( !isset( $_SESSION['type']) || $_SESSION['type'] != 'helper' ){
                header("Location: login.php");
            }
        ?>
        <style type="text/css" media="screen">
            /* The switch - the box around the slider */
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            /* Hide default HTML checkbox */
            .switch input {display:none;}

            /* The slider */
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            }

            input:checked + .slider {
            background-color: #2196F3;
            }

            input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
            border-radius: 34px;
            }

            .slider.round:before {
            border-radius: 50%;
            }
        </style>
        <script charset="utf-8">
            function myfunction(){
                // if(document.getElementById('mycheck').checked){
                //     document.getElementById('text').innerHTML = 'Hepler Available';
                // }else{
                //     document.getElementById('text').innerHTML = 'Helper Not Available';
                // }        
            }
        </script>
        <div class="container">
             <br></br>
             <div class="row">
                <div class="col-md-8">
                    <div id="map"></div>
                    <script>
                        var helperPoint = {lat: 35.529707, lng: 6.173940};
                        var blindPoint = {lat: 35.635861, lng: 6.272206};
                        function initMap() {
                            var directionsService = new google.maps.DirectionsService;
                            var directionsDisplay = new google.maps.DirectionsRenderer;
                            var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 10,
                            center: helperPoint
                            });
                            marker = new google.maps.Marker({
                                position: helperPoint,
                                map: map
                            });
                            directionsDisplay.setMap(map);

                            var onChangeHandler = function() {
                                calculateAndDisplayRoute(directionsService, directionsDisplay);
                            };
                            document.getElementById('mycheck').addEventListener('change', onChangeHandler);
                            // document.getElementById('map').addEventListener('click', onChangeHandler);
                            // document.getElementById('start').addEventListener('change', onChangeHandler);
                            // document.getElementById('end').addEventListener('change', onChangeHandler);
                        }

                        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                            if(document.getElementById('mycheck').checked){
                                directionsService.route({
                                    // origin: "Chicago, IL", // when we used place object instead of latlng object
                                    // destination: "Jopling, MO",
                                    origin: helperPoint,
                                    destination: blindPoint,
                                    travelMode: 'DRIVING'
                                    }, function(response, status) {
                                    if (status === 'OK') {
                                        directionsDisplay.setDirections(response);
                                    } else {
                                        window.alert('Directions request failed due to ' + status);
                                        console.log('Directions request failed due to ' + status);
                                    }
                                });
                                document.getElementById('text').innerHTML = 'Hepler Available';
                            }else{
                                document.getElementById('text').innerHTML = 'Helper Not Available';
                                directionsService.route({
                                    // origin: "Chicago, IL", // when we used place object instead of latlng object
                                    // destination: "Jopling, MO",
                                    origin: helperPoint,
                                    destination: helperPoint,
                                    travelMode: 'DRIVING'
                                    }, function(response, status) {
                                    if (status === 'OK') {
                                        directionsDisplay.setDirections(response);
                                    } else {
                                        window.alert('Directions request failed due to ' + status);
                                        console.log('Directions request failed due to ' + status);
                                    }
                                });
                            }        
                        }
                    </script>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdR10IxmJrEYtgjvhzFS23tZgrycdxaLM&callback=initMap">
                    </script>
                    <!-- <div id="map"></div> -->
                    <!-- <script> -->
                    <!-- // Note: This example requires that you consent to location sharing when -->
                    <!-- // prompted by your browser. If you see the error "The Geolocation service -->
                    <!-- // failed.", it means you probably did not give permission for the browser to -->
                    <!-- // locate you. -->
                    <!-- var map, infoWindow, marker; -->
                    <!-- function initMap() { -->
                    <!--     map = new google.maps.Map(document.getElementById('map'), { -->
                    <!--     center: {lat: &#45;34.397, lng: 150.644}, -->
                    <!--     zoom: 20, -->
                    <!--     mapTypeId: google.maps.MapTypeId.SATELLITE -->
                    <!--     }); -->
                    <!--     infoWindow = new google.maps.InfoWindow; -->
                    <!--  -->
                    <!--     // Try HTML5 geolocation. -->
                    <!--     if (navigator.geolocation) { -->
                    <!--         navigator.geolocation.getCurrentPosition(function(position) { -->
                    <!--             var pos = { -->
                    <!--                 lat: position.coords.latitude, -->
                    <!--                 lng: position.coords.longitude -->
                    <!--             }; -->
                    <!--  -->
                    <!--             infoWindow.setPosition(pos); -->
                    <!--             infoWindow.setContent('Location found.'); -->
                    <!--             infoWindow.open(map); -->
                    <!--             map.setCenter(pos); -->
                    <!--             marker = new google.maps.Marker({ -->
                    <!--                 position: pos, -->
                    <!--                 map: map -->
                    <!--             }); -->
                    <!--         }, function() { -->
                    <!--             handleLocationError(true, infoWindow, map.getCenter()); -->
                    <!--         }); -->
                    <!--     } else { -->
                    <!--         // Browser doesn't support Geolocation -->
                    <!--         handleLocationError(false, infoWindow, map.getCenter()); -->
                    <!--     } -->
                    <!-- } -->
                    <!--  -->
                    <!-- function handleLocationError(browserHasGeolocation, infoWindow, pos) { -->
                    <!--     infoWindow.setPosition(pos); -->
                    <!--     infoWindow.setContent(browserHasGeolocation ? -->
                    <!--                         'Error: The Geolocation service failed.' : -->
                    <!--                         'Error: Your browser doesn\'t support geolocation.'); -->
                    <!--     infoWindow.open(map); -->
                    <!-- } -->
                    <!-- </script> -->
                    <!-- <script async defer -->
                    <!-- src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdR10IxmJrEYtgjvhzFS23tZgrycdxaLM&#38;callback=initMap"> -->
                    <!-- </script> -->
                </div>
                <div class="col-md-4">
                    <br></br>
                    <label class="switch">
                        <input type="checkbox" id='mycheck' onclick="myfunction()">
                        <span class="slider round"></span>
                    </label>
                    <h3 id='text'>Helper Not Available</h3>
                </div>
             </div> 
        </div>
    </body>
    <?php require_once 'includes/footer.php'; ?>
</html>
