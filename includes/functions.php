<?php 
function blinds(){
    global $connection;
    $query = "select id, name, latitude, longitude, status ";
    $query .= "from locations ";
    $query .= "where type=\"blind\"";
    $query .= "limit 25";
    $blinds =  mysqli_query($connection, $query);
    $output = "\n";
    if(mysqli_num_rows($blinds) > 0){
        while($row = mysqli_fetch_assoc($blinds)){
            $output .= "<li class='list-group-item list-group-item-primary list-group-item-action d-flex justify-content-between align-items-center'>";
            $output .= strtoupper($row["name"]);
            $output .= "<button data-latitude='". $row['latitude'] ."' data-longitude='". $row['longitude'] ."' onclick='showInMap(this)'><span class='fa fa-map-marker'></span></button>";
            $output .= "<button onclick='loadHelpers(this)' data-blind-name='" . $row['name'] . "' data-blind-id='" . $row['id'] . "' data-latitude='". $row['latitude'] ."' data-longitude='". $row['longitude'] ."' data-toggle='modal' data-target='#myModal'><span class='fa fa-search'></span></button>";
            $output .= "<button><span class='fa fa-phone'></span></button>";
            $output .= "</li>";
        }
    }
    return $output;
}
?>
