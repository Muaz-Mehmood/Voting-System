<?php
    $connect = mysqli_connect("localhost","root","","voting");
    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
    }
?>