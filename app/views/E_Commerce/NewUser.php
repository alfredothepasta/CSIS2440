<?php
include_once APPROOT . "/app/views/includes/head.php";
include_once APPROOT . "/app/views/includes/navbar.php"; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create An Account</h2>
            <form action="/ECommerce/NewUser" method="post">
<!--               firstName -->
                <div class="form-group">
                    <label for="firstName">First Name: <sup>*</sup></label>
                    <input id="firstName" type="text" name="firstName" class="form-control form-control-lg
                    <?php isInvalid($data['first_name_err']);?>" value="<?php echo $data['firstName']?>">
                    <span id="firstNameErr" class="invalid-feedback"><?php echo $data['first_name_err'] ?></span>
                </div>
<!--                lastName -->
                <div class="form-group">
                    <label for="lastName">Last Name: <sup>*</sup></label>
                    <input id="lastName" type="text" name="lastName" class="form-control form-control-lg
                    <?php isInvalid($data['last_name_err']);?>" value="<?php echo $data['lastName']?>">
                    <span id="lastNameErr" class="invalid-feedback"><?php echo $data['last_name_err'] ?></span>
                </div>
<!--                birthDate -->
                <div class="form-group">
                    <label for="birthDate">Birth date: <sup>*</sup></label>
                    <input id="birthDate" type="date" name="birthDate" class="form-control form-control-lg
                    <?php isInvalid($data['birth_date_error']);?>" value="<?php echo $data['birthDate']?>">
                    <span id="birthDateErr" class="invalid-feedback"><?php echo $data['birth_date_error'] ?></span>
                </div>
<!--                email -->
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input id="email" type="email" name="email" class="form-control form-control-lg
                    <?php isInvalid($data['email_err']);?>" value="<?php echo $data['email']?>">
                    <span id="emailErr" class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                </div>
<!--                password -->
                <div class="form-group">
                    <label  for="password">Password: <sup>*</sup></label>
                    <input id="password" type="password" name="password" class="form-control form-control-lg
                    <?php isInvalid($data['password_err']);?>" value="<?php echo $data['password']?>">
                    <span id="passwordErr" class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                </div>
<!--                confirm_password -->
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input id="confirm_password" type="password" name="confirm_password" class="form-control form-control-lg
                    <?php isInvalid($data['confirm_password_err']);?>" value="<?php echo $data['confirm_password']?>">
                    <span id="confirm_passwordErr" class="invalid-feedback"><?php echo $data['confirm_password_err'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block" onclick="return validateCreate()">
                    </div>
                    <div class="col">
                        <a href="/ECommerce/Login" class="btn btn-light btn-block">
                            Have an account? Login
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once APPROOT . "/app/views/includes/footer.php"; ?>

