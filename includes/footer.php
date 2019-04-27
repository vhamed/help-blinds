<script src="js/script.js" charset="utf-8"></script>

<!-- jquerpy CDN(Content Delivery Network) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="vendor/js/jquery-3.3.1.min.js"></script>

<!-- js bootstrap cdn -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="vendor/js/bootstrap.min.js"></script>


<?php 
    if(isset($connection)){
        mysqli_close($connection);
    } 
?>
