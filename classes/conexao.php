<?php
    $bdServer = 'localhost';
    $bdUser = 'root';
    $bdPassword = '';
    $bdDatabase = 'mercado';

    $mysqli = new mysqli($bdServer, $bdUser, $bdPassword, $bdDatabase);

    if($mysqli->connect_errno){

        echo "Errno: " . $mysqli->connect_errno . "<br>";
        echo "Error: " . $mysqli->connect_error . "<br>";

    exit();
    }
?>