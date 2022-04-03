<?php
require_once APPROOT . '/app/views/Classexercises/CE08/DataBaseConnection.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php require_once APPROOT . '/app/views/includes/stylelinks.php'?>

    <script>
        function validLogin() {
            let error = false;
            let nameExpression = /^[a-zA-Z]+$/;
            let emailExpression =  /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            let passwordExpression = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
            console.log("Validating");
            console.log(document.getElementById("Email").value);

            // Validate captain name
            if(document.getElementById("CapName") == "" || !document.getElementById("CapName").value.match(nameExpression)){
                console.log("Name");
                document.getElementById("CapName").classList.add("is-invalid");
                error = true;
            }

            // Validate Email
            if(document.getElementById("Email").value == "" || !document.getElementById("Email").value.match(emailExpression)){
                console.log("Email");
                document.getElementById("Email").classList.add("is-invalid");
                error = true;
            }

            // Validate Password
            if(document.getElementById("Password").value == "" || document.getElementById("Password").value.match(passwordExpression)) {
                console.log("Password");
                document.getElementById("Password").classList.add("is-invalid");
                error = true;
            }

            // Check for errors at the end
            if (error == true) {
                return false;
            }

        }
    </script>
</head>
<body>
<?php require_once APPROOT . '/app/views/includes/navbar.php'; ?>

    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
<html>
<head>
    <meta charset="UTF-8">
    <title>New Captain Account</title>

<?php
print("<div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-sm-2\"></div>
                <div class=\"col-sm-8\">");
if (isset($_POST['Submit'])) {
    //make the new account and link to login
    $name = $_POST['CapName'];
    $email = $_POST['Email'];
    $thePass = hash("ripemd128", $_POST['Password']);
    $insert = "INSERT INTO `Captains` (`CaptainName`, `Email`, `Command`, `Combat`, `Commerce`, `Cunning`, `ThePass`) "
        . "VALUES ('$name', '$email','" . rand(25, 100) . "', '" . rand(25, 100) . "', '" . rand(25, 100) . "', '" . rand(25, 100) . "','$thePass')";
    //echo $insert;
    $success = $con->query($insert);

    if ($success == FALSE) {
        $failmess = "Whole query " . $insert . "<br>";
        echo $failmess;
        print('Invalid query: ' . mysqli_error($con) . "<br>");
    } else {
        echo $name . " was Created<br><a href=\"LoginPage\">Go back to login</a>";
    }
    print("</div>
                <div class=\"col-sm-2\"></div>
            </div>
            </div>");
} else {
    //show the form
    print <<<HTML
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
            <form class="form-horizontal" action="CE08/NewAccount" method="post">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="CapName">Captain Name</label>  
  <div class="col-md-4">
  <input id="CapName" name="CapName" type="text" placeholder="Harlock" class="form-control input-md" required="">
  <span class="help-block">This is the name of your Captain, all will see this</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Email">Email/Username</label>  
  <div class="col-md-4">
  <input id="Email" name="Email" type="text" placeholder="someone@home.org" class="form-control input-md" required="">
  <span class="help-block">This will be your contact email and username</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Password">Password</label>
  <div class="col-md-4">
    <input id="Password" name="Password" type="password" placeholder="******************" class="form-control input-md" required="">
    <span class="help-block">This is the password you will use to access the account</span>
  </div>
</div>

<!-- Submit button-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit">Create Me</label>  
  <div class="col-md-4">
  <input id="Submit" name="Submit" type="Submit" placeholder="" class="form-control input-md" onclick="return validLogin()">
    
  </div>
</div>

</fieldset>
</form></div>
                <div class="col-sm-2"></div>
            </div>
            </div>

HTML;
}
?>


<?php require_once APPROOT . '/app/views/Classexercises/CE08/Footer.php'; ?>