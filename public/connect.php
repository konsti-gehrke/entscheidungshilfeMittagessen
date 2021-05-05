<?php

function connect_db()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "essensziele";

    if (!$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
        exit("Connecting to database not possible!");
    }
    return $connection;
}