<?php
// all the variables are passed in from A2.
?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create An Account</h2>
            <p>To register, fill out the following form:</p>
            <form action="/Assignments/A2/A2CreateUser" method="post">
<!--               firstName -->
                <div class="form-group">
                    <label for="firstName">First Name: <sup>*</sup></label>
                    <input type="text" name="firstName" class="form-control form-control-lg
                    <?php isInvalid($data['first_name_err']);?>" value="<?php echo $data['firstName']?>">
                    <span class="invalid-feedback"><?php echo $data['first_name_err'] ?></span>
                </div>
<!--                lastName -->
                <div class="form-group">
                    <label for="lastName">Last Name: <sup>*</sup></label>
                    <input type="text" name="lastName" class="form-control form-control-lg
                    <?php isInvalid($data['last_name_err']);?>" value="<?php echo $data['lastName']?>">
                    <span class="invalid-feedback"><?php echo $data['last_name_err'] ?></span>
                </div>
<!--                birthDate -->
                <div class="form-group">
                    <label for="birthDate">Birth date: <sup>*</sup></label>
                    <input type="date" name="birthDate" class="form-control form-control-lg
                    <?php isInvalid($data['birth_date_error']);?>" value="<?php echo $data['birthDate']?>">
                    <span class="invalid-feedback"><?php echo $data['birth_date_error'] ?></span>
                </div>
<!--                email -->
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg
                    <?php isInvalid($data['email_err']);?>" value="<?php echo $data['email']?>">
                    <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                </div>
<!--                password -->
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg
                    <?php isInvalid($data['password_err']);?>" value="<?php echo $data['password']?>">
                    <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                </div>
<!--                confirm_password -->
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg
                    <?php isInvalid($data['confirm_password_err']);?>" value="<?php echo $data['confirm_password']?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="/Assignments/A2/Login" class="btn btn-light btn-block">
                            Have an account? Login
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

