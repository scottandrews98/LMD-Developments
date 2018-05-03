<?php
    //$servername = "localhost";
    //$username = "root";
    //$password = "root";
    //$dbName = "LMDDevelopments";
    

    $servername = "localhost";
    $username = "tqpxgciz_admin";
    $password = "FourGuys";
    $dbName = "tqpxgciz_LMDDevelopments";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbName);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } 
?>