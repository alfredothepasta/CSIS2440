<?php
// all the variables are passed in from A2.
?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Edit your info</h2>
            <p>Regretting giving me all your info? Change it below:</p>
            <p>Same deal as before, don't put real info in.</p>
            <form action="/Assignments/A2/UpdateInfo" method="post">
                <!--               firstName -->
                <div class="form-group">
                    <label for="firstName">First Name: <sup>*</sup></label>
                    <input type="text" name="firstName" class="form-control form-control-lg
                    <?php isInvalid($data['first_name_err']);?>" value="<?php echo $_SESSION['FirstName']?>">
                    <span class="invalid-feedback"><?php echo $data['first_name_err'] ?></span>
                </div>
                <!--                lastName -->
                <div class="form-group">
                    <label for="lastName">Last Name: <sup>*</sup></label>
                    <input type="text" name="lastName" class="form-control form-control-lg
                    <?php isInvalid($data['last_name_err']);?>" value="<?php echo $_SESSION['LastName']?>">
                    <span class="invalid-feedback"><?php echo $data['last_name_err'] ?></span>
                </div>
                <!--                birthDate -->
                <div class="form-group">
                    <label for="birthDate">Birth date: <sup>*</sup></label>
                    <input type="date" name="birthDate" class="form-control form-control-lg
                    <?php isInvalid($data['birth_date_error']);?>" value="<?php echo $_SESSION['Birthdate']?>">
                    <span class="invalid-feedback"><?php echo $data['birth_date_error'] ?></span>
                </div>
                <!--                email -->
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg
                    <?php isInvalid($data['email_err']);?>" value="<?php echo $_SESSION['eMail']?>">
                    <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Update" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="/Assignments/A2/Result" class="btn btn-light btn-block">
                            Return
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

