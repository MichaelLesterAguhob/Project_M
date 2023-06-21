<?php 
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "sari_sari_store_pos";

    $con = mysqli_connect($serverName, $userName, $password, $dbName);

    if($con->connect_error)
    {
        echo ('PLease check your connection'); 
        die();
    }

    session_start();
?>