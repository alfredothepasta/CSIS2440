<?php
// all the variables are passed in from A3.
?>
<script>
    function validateUpdate() {
        let error = false;
        let nameExpression = /^[a-zA-Z]+$/;
        let emailExpression = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        console.log("Validating");

        // Get HTML elements
        let firstName = document.getElementById('firstName');
        let lastName = document.getElementById('lastName');
        let birthDate = document.getElementById('birthDate');
        let email = document.getElementById('email');
        // Get HTML error elements
        let firstNameErr = document.getElementById('firstNameErr');
        let lastNameErr = document.getElementById('lastNameErr');
        let birthDateErr = document.getElementById('birthDateErr');
        let emailErr = document.getElementById('emailErr');

        // Validate first name
        if (firstName.value == "" || !firstName.value.match(nameExpression)) {
            console.log("First Name");
            firstName.classList.add("is-invalid");
            firstNameErr.innerHTML = "Enter your first name, can only be letters.";
            error = true;
        }

        // Validate last name
        if (lastName.value == "" || !lastName.value.match(nameExpression)) {
            console.log("Last Name");
            lastName.classList.add("is-invalid");
            lastNameErr.innerText = "Enter your last name, can only be letters";
            error = true;
        }

        // Validate birth date
        if (birthDate.value == "") {
            console.log("Birth Date");
            birthDate.classList.add("is-invalid");
            birthDateErr.innerText = "Please enter birthdate."
            error = true;
        }

        // Validate email
        if (email.value == "" || !email.value.match(emailExpression)) {
            console.log("Name");
            email.classList.add("is-invalid");
            emailErr.innerText = "Enter valid email";
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
            <h2>Edit your info</h2>
            <p>Regretting giving me all your info? Change it below:</p>
            <p>Same deal as before, don't put real info in.</p>
            <form action="/Assignments/A3/UpdateInfo" method="post">
                <!--               firstName -->
                <div class="form-group">
                    <label for="firstName">First Name: <sup>*</sup></label>
                    <input id="firstName" type="text" name="firstName" class="form-control form-control-lg
                    <?php isInvalid($data['first_name_err']);?>" value="<?php echo $_SESSION['FirstName']?>">
                    <span id="firstNameErr" class="invalid-feedback"><?php echo $data['first_name_err'] ?></span>
                </div>
                <!--                lastName -->
                <div class="form-group">
                    <label for="lastName">Last Name: <sup>*</sup></label>
                    <input id="lastName" type="text" name="lastName" class="form-control form-control-lg
                    <?php isInvalid($data['last_name_err']);?>" value="<?php echo $_SESSION['LastName']?>">
                    <span id="lastNameErr" class="invalid-feedback"><?php echo $data['last_name_err'] ?></span>
                </div>
                <!--                birthDate -->
                <div class="form-group">
                    <label for="birthDate">Birth date: <sup>*</sup></label>
                    <input id="birthDate" type="date" name="birthDate" class="form-control form-control-lg
                    <?php isInvalid($data['birth_date_error']);?>" value="<?php echo $_SESSION['Birthdate']?>">
                    <span id="birthDateErr" class="invalid-feedback"><?php echo $data['birth_date_error'] ?></span>
                </div>
                <!--                email -->
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input id="email" type="email" name="email" class="form-control form-control-lg
                    <?php isInvalid($data['email_err']);?>" value="<?php echo $_SESSION['eMail']?>">
                    <span id="emailErr" class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Update" class="btn btn-success btn-block" onclick="return validateUpdate()">
                    </div>
                    <div class="col">
                        <a href="/Assignments/A3/Result" class="btn btn-light btn-block">
                            Return
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

