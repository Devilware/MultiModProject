<?php

    $dbServername = "localhost";
    $dbUsername = "SuperUser";
    $dbPassword = "StillWater2010@";
    $dbName = "Sentinel";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    // Check the link to the database
	if (!$conn) 
    {
        die("Connection to Database error: " . mysqli_connect_error());
    }
?>