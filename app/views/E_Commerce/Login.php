<?php
include_once APPROOT . "/app/views/includes/head.php";
include_once APPROOT . "/app/views/includes/navbar.php";
?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Sign in</h2>
            <br>
            <form action="/ECommerce/Login" method="post">
                <!--                email -->
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input id="email" type="email" name="email" class="form-control form-control-lg
                                <?php isInvalid($data['email_err']);?>" value="<?php echo $data['email']?>">
                    <span id="emailErr" class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                </div>
                <!--                password -->
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input id="password" type="password" name="password" class="form-control form-control-lg
                                <?php isInvalid($data['password_err']);?>" value="<?php echo $data['password']?>">
                    <span id="passwordErr" class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" onclick="return validateLogin()" value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="/ECommerce/NewUser" class="btn btn-light btn-block">
                            Create an account
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once APPROOT . "/app/views/includes/footer.php";
