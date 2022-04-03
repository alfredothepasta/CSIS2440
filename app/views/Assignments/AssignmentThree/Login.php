<?php


?>
<script>
    function validLogin() {
        let error = false;
        let nameExpression = /^[a-zA-Z]+$/;
        let emailExpression =  /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        let passwordExpression = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        console.log("Validating");
        console.log(document.getElementById("Email").value);

        // Validate captain name
        if(document.getElementById("email") == "" || !document.getElementById("CapName").value.match(nameExpression)){
            console.log("Name");
            document.getElementById("email").classList.add("is-invalid");
            error = true;
        }

        // Validate Password
        if(document.getElementById("password").value == "" || document.getElementById("Password").value.match(passwordExpression)) {
            console.log("password");
            document.getElementById("password").classList.add("is-invalid");
            error = true;
        }

        // Check for errors at the end
        if (error == true) {
            return false;
        }

    }
</script>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Sign in</h2>
            <br>
            <form action="/Assignments/A3/Login" method="post">
                <!--                email -->
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input id="email" type="email" name="email" class="form-control form-control-lg
                                <?php isInvalid($data['email_err']);?>" value="<?php echo $data['email']?>">
                    <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                </div>
                <!--                password -->
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input id="password" type="password" name="password" class="form-control form-control-lg
                                <?php isInvalid($data['password_err']);?>" value="<?php echo $data['password']?>">
                    <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" onclick="return validLogin()" value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="/Assignments/A3/A3CreateUser" class="btn btn-light btn-block">
                            Create an account
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>