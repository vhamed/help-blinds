<?php
    session_start();
    if( !isset( $_SESSION['type']) || $_SESSION['type'] != "admin"){
        header("Location: login.php");
    }
    require_once 'includes/db_connection.php';
    require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <?php require_once 'includes/header.php'; ?>
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <br></br>
                <!-- <ul class="nav nav&#45;pills md&#45;3 nav&#45;fill" id="pills&#45;tab" role="tablist"> -->
                <!--     <li class="nav&#45;item"> -->
                <!--         <a class="nav&#45;link active" id="pills&#45;home&#45;tab" data&#45;toggle="pill" href="#pills&#45;home" role="tab" aria&#45;controls="pills&#45;home" aria&#45;selected="true">Dashboard</a> -->
                <!--     </li> -->
                <!--     <!&#45;&#45; <li class="nav&#38;#45;item"> &#45;&#45;> -->
                <!--     <!&#45;&#45;     <a class="nav&#38;#45;link" id="pills&#38;#45;profile&#38;#45;tab" data&#38;#45;toggle="pill" href="#pills&#38;#45;profile" role="tab" aria&#38;#45;controls="pills&#38;#45;profile" aria&#38;#45;selected="false">Members</a> &#45;&#45;> -->
                <!--     <!&#45;&#45; </li> &#45;&#45;> -->
                <!--     <!&#45;&#45; <li class="nav&#38;#45;item"> &#45;&#45;> -->
                <!--     <!&#45;&#45;     <a class="nav&#38;#45;link" id="pills&#38;#45;contact&#38;#45;tab" data&#38;#45;toggle="pill" href="#pills&#38;#45;contact" role="tab" aria&#38;#45;controls="pills&#38;#45;contact" aria&#38;#45;selected="false">Settings</a> &#45;&#45;> -->
                <!--     <!&#45;&#45; </li> &#45;&#45;> -->
                <!--     <!&#45;&#45; <li class="nav&#38;#45;item"> &#45;&#45;> -->
                <!--     <!&#45;&#45;     <a href="logout.php">Logout</a>  &#45;&#45;> -->
                <!--     <!&#45;&#45; </li> &#45;&#45;> -->
                <!-- </ul> -->
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <br></br>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Show the map here  -->
                        <div id="map"></div>
                        <script>
                        var map;
                        var marker;
                        function initMap() {
                            var point = {lat: 35.5299, lng: 6.1728};
                            var mapDiv = document.getElementById('map');
                            map = new google.maps.Map(mapDiv, {
                                center: point,
                                zoom: 20,
                                mapTypeId: google.maps.MapTypeId.SATELLITE
                            });
                            marker = new google.maps.Marker({
                                position: point,
                                map: map
                            });
                        }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdR10IxmJrEYtgjvhzFS23tZgrycdxaLM&callback=initMap" async defer></script>
                    </div>
                    <div class="col-md-6">
                        <h3 style="font-color=red">List of Blinds</h3>
                        <ul class="list-group">
                            <?php echo blinds(); ?>
                        </ul>
                        <div id='myModal' class='modal fade'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h4 id='header-title'>Choose Helper From This List</h4>
                                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                    </div>
                                    <div id='content' class='modal-body'>
                                        <!-- content here -->
                                    </div> 
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button> 
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><br></br>Our Members and Helpers are listed Here</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><br></br>Settings that you may need to change them</div>
        </div>
    </div>
    <?php require_once 'includes/footer.php'; ?>
</html>
