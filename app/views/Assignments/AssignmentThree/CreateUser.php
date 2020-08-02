<?php
// all the variables are passed in from A3.
?>
<script>
    function validateCreate() {
        let error = false;
        let nameExpression = /^[a-zA-Z]+$/;
        let emailExpression =  /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        let passwordExpression = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        console.log("Validating");
        console.log(document.getElementById("Email").value);

        let firstName = document.getElementById('firstName');
        let lastName = document.getElementById('lastName');
        let birthDate = document.getElementById('birthDate');
        let email = document.getElementById('email');
        let password = document.getElementById('password');
        let confirmPassword = document.getElementById('confirm_password');

        // Validate first name
        if(firstName.value == "" || !firstName.value.match(nameExpression)){
            console.log("First Name");
            document.getElementById("CapName").classList.add("is-invalid");
            error = true;
        }

        // Validate last name
        if(lastName.value == "" || !lastName.value.match(nameExpression)){
            console.log("Last Name");
            document.getElementById("CapName").classList.add("is-invalid");
            error = true;
        }

        // Validate birth date
        if(birthDate.value == ""){
            console.log("Birth Date");
            document.getElementById("CapName").classList.add("is-invalid");
            error = true;
        }

        // Validate email
        if(email.value == "" || !email.value.match(emailExpression)){
            console.log("Name");
            document.getElementById("CapName").classList.add("is-invalid");
            error = true;
        }

        // Validate password
        if(password.value == "" || !password.value.match(passwordExpression)){
            console.log("Name");
            document.getElementById("CapName").classList.add("is-invalid");
            error = true;
        }

        // Validate confirm password
        if(confirmPassword.value == "" || confirmPassword.value != password.value)){
            console.log("Name");
            document.getElementById("CapName").classList.add("is-invalid");
            error = true;
        }

        // Check for errors at the end
        if (error) {
            return false;
        }

    }
</script>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create A Player</h2>
            <p>To register, please give me all of your sensitive data below:</p>
            <p>Also, don't put any real info in.</p>
            <form action="/Assignments/A3/A3CreateUser" method="post">
<!--               firstName -->
                <div class="form-group">
                    <label for="firstName">First Name: <sup>*</sup></label>
                    <input id="firstName" type="text" name="firstName" class="form-control form-control-lg
                    <?php isInvalid($data['first_name_err']);?>" value="<?php echo $data['firstName']?>">
                    <span class="invalid-feedback"><?php echo $data['first_name_err'] ?></span>
                </div>
<!--                lastName -->
                <div class="form-group">
                    <label for="lastName">Last Name: <sup>*</sup></label>
                    <input id="lastName" type="text" name="lastName" class="form-control form-control-lg
                    <?php isInvalid($data['last_name_err']);?>" value="<?php echo $data['lastName']?>">
                    <span class="invalid-feedback"><?php echo $data['last_name_err'] ?></span>
                </div>
<!--                birthDate -->
                <div class="form-group">
                    <label for="birthDate">Birth date: <sup>*</sup></label>
                    <input id="birthDate" type="date" name="birthDate" class="form-control form-control-lg
                    <?php isInvalid($data['birth_date_error']);?>" value="<?php echo $data['birthDate']?>">
                    <span class="invalid-feedback"><?php echo $data['birth_date_error'] ?></span>
                </div>
<!--                email -->
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input id="email" type="email" name="email" class="form-control form-control-lg
                    <?php isInvalid($data['email_err']);?>" value="<?php echo $data['email']?>">
                    <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                </div>
<!--                password -->
                <div class="form-group">
                    <label id="password" for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg
                    <?php isInvalid($data['password_err']);?>" value="<?php echo $data['password']?>">
                    <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                </div>
<!--                confirm_password -->
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input id="confirm_password" type="password" name="confirm_password" class="form-control form-control-lg
                    <?php isInvalid($data['confirm_password_err']);?>" value="<?php echo $data['confirm_password']?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="/Assignments/A3/Login" class="btn btn-light btn-block">
                            Have an account? Login
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

