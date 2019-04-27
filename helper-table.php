<?php 
    require_once 'includes/functions.php';
    require_once 'includes/db_connection.php';
?>
    <table class="table">
        <tr>
            <th>Helper Id</th> 
            <th>Name</th> 
            <th>Type</th> 
            <th>Distance From <?php echo $_POST['name']; ?></th> 
            <th></th> 
        </tr>
<?php 
    global $connection;
    $query = "select id, name, latitude, longitude, type from locations where type='cousin' or type='agent'";
    $table = mysqli_query($connection, $query);
    // we need to check the distance between the blind and each helper
    // after that sort helpers list will be shown
    if(mysqli_num_rows($table) > 0){
        while($r = mysqli_fetch_assoc($table)){
            echo "<tr>";
            echo "<td>" . strtoupper($r['id']) . "</td>";
            echo "<td>" . strtoupper($r['name']) . "</td>";
            echo "<td>" . strtoupper($r['type']) . "</td>";
            echo "<td onmouseover='show(this," . $_POST['lat'] . ", " . $_POST['lng'] . ", " . $r['latitude'] . ", " . $r['longitude'] . ")'></td>";
            echo "<td><a class='btn btn-info' href='helper.php?idHelper=" . $r['id'] . "&latBlind=" . $_POST['lat'] . "&lngBlind=" . $_POST['lng'] . "'>Choose</a></td>";
            echo "</tr>";
        }
    }
?>
    </table> 
