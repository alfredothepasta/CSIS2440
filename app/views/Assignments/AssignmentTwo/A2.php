<?php
/****************************
 * Functions, variables, etc
 ****************************/

function isInvalid($err){
    if (!empty($err)) {
        echo "is-invalid";
    }
}
$currentPage = $data['page'];
$emailError = $data['email_err'];
$passwordError = $data['password_err'];

/***********************
 * The web page
 ***********************/


include APPROOT . '/app/views/includes/head.php';
include APPROOT . '/app/views/includes/navbar.php';



/******************************************************************
 * I liked the trick I pulled to make CE08 go through one page
 * so I'm gonna do it again here for funsies. I don't really think
 * it's the most efficient way of doing things since the page
 * gets a lot of variables it may never use, but...
 ******************************************************************/

if($currentPage != null){
    include APPROOT . "/app/views/Assignments/AssignmentTwo/$currentPage.php";
} else {
    include  APPROOT . "/app/views/Assignments/AssignmentTwo/A2CreateUser.php";
}

include APPROOT . '/app/views/includes/footer.php';