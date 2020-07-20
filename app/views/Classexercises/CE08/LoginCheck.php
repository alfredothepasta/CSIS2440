<?php

unset($_SESSION['badPass']);
// username and password sent from form
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];
// Connect to server and select database.
// To protect MYSQL injection
$myusername = mysql_fix_string($con, $myusername);
$mypassword = mysql_fix_string($con, $mypassword);
// Hash the password
$hashedPW = hash("ripemd128", $mypassword);

$sql = "SELECT * FROM Captains WHERE Email = '$myusername' AND ThePass = '$hashedPW'";
$result = $con->query($sql);

if(!$result) {
    $message = "Whole query" . $sql;
    echo $message;
    die('Invalid query: ' . mysqli_error());
}

// Mysql_num_row is counting table row
$count = $result->num_rows;

/* If the username and password both matched a result, we will return exactly
 * one row and no more. */
if($count == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['CE08user'] = $myusername;
    $_SESSION['Captain'] = $row['CaptainName'];
    $_SESSION['Command'] = $row['Command'];
    $_SESSION['Commerce'] = $row['Commerce'];
    $_SESSION['Combat'] = $row['Combat'];
    $_SESSION['Cunning'] = $row['Cunning'];
    $_SESSION['loginSet'] = true;
    // register user and pass, redirect to successful login
    header("Location:/Classexercises/CE08/Dashboard");
    // echo
} else {
    header("Location:/Classexercises/CE08");
    $_SESSION['badPass']++;
}
