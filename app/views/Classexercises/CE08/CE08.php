<?php
require_once APPROOT . '/app/views/Classexercises/CE08/Header.php';
require_once APPROOT . '/app/views/includes/navbar.php';

require_once APPROOT . '/app/views/Classexercises/CE08/DataBaseConnection.php';

// Routing everything through this CE08 file.
// in this case $data contains whatever in the URL comes after Classexercisese/CE08/
// We use that to decide what this page displays. Getting the code for this exercise to work in my framework was disgusting.
if($data != null){
    $currentPage = $data;
    include APPROOT . "/app/views/Classexercises/CE08/$currentPage.php";
} else if(isset($_SESSION['user'])) {
    header("Location:/Classexercises/CE08/Dashboard");
} else {
    include APPROOT . "/app/views/Classexercises/CE08/LoginPage.php";
}

require_once APPROOT . '/app/views/Classexercises/CE08/Footer.php';
