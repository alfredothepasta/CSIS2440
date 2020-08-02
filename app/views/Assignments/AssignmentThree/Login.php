<?php


?>
<script src="/public/js/validLogin.js"></script>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Sign in</h2>
            <br>
            <form action="/Assignments/A2/Login" method="post">
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

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="/Assignments/A2/A2CreateUser" class="btn btn-light btn-block">
                            Create an account
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>