<?Php

    // Database Connection for the entire app
    // $connect = mysqli_connect("localhost", "root", "", "awacrypto");

    $mycon = new mysqli("localhost", "root", "", "HayokDB");

    if ($mycon -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mycon -> connect_error;
        exit();
    }

?> 
