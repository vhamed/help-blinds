<?php 
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "final-prj");


    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if(mysqli_connect_errno()){
        die("DB connection failed" . mysqli_connect_errno() . " ( " . mysqli_connect_errno() . ")" );
    }
?>
