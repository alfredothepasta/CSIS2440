<?php

$host = DB_HOST;
$user = DB_USER;
$password = DB_PASS;
$dbname = DB_NAME;
$con = new mysqli($host, $user, $password, $dbname)
or die('Could not connect to the database server.' . mysqli_connect_error($con));

if($con->connect_error == FALSE) {
//    echo "<h2>We Connected</h2>";
}else {
    echo $con->connect_error;
}
//print_r($con);