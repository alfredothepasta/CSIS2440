function validateCreate() {
    let error = false;
    let nameExpression = /^[a-zA-Z]+$/;
    let emailExpression =  /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    // 3 out of 4: Upper, Lower, Number, Special
    let passwordExpression = /^((?=.*?[A-Z])(?=.*?[a-z])(?=.*?\d)|(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[^a-zA-Z0-9])|(?=.*?[A-Z])(?=.*?\d)(?=.*?[^a-zA-Z0-9])|(?=.*?[a-z])(?=.*?\d)(?=.*?[^a-zA-Z0-9])).{8,}$/;
    console.log("Validating");

    // Get HTML elements
    let firstName = document.getElementById('firstName');
    let lastName = document.getElementById('lastName');
    let birthDate = document.getElementById('birthDate');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    let confirmPassword = document.getElementById('confirm_password');
    // Get HTML error elements
    let firstNameErr = document.getElementById('firstNameErr');
    let lastNameErr = document.getElementById('lastNameErr');
    let birthDateErr = document.getElementById('birthDateErr');
    let emailErr = document.getElementById('emailErr');
    let passwordErr = document.getElementById('passwordErr');
    let confirmPasswordErr = document.getElementById('confirm_passwordErr');

    // Validate first name
    if(firstName.value == "" || !firstName.value.match(nameExpression)){
        console.log("First Name");
        firstName.classList.add("is-invalid");
        firstNameErr.innerHTML = "Enter your first name, can only be letters.";
        error = true;
    }

    // Validate last name
    if(lastName.value == "" || !lastName.value.match(nameExpression)){
        console.log("Last Name");
        lastName.classList.add("is-invalid");
        lastNameErr.innerText = "Enter your last name, can only be letters";
        error = true;
    }

    // Validate birth date
    if(birthDate.value == ""){
        console.log("Birth Date");
        birthDate.classList.add("is-invalid");
        birthDateErr.innerText = "Please enter birthdate."
        error = true;
    }

    // Validate email
    if(email.value == "" || !email.value.match(emailExpression)){
        console.log("Name");
        email.classList.add("is-invalid");
        emailErr.innerText = "Enter valid email";
        error = true;
    }

    // Validate password
    if(password.value == "" || !password.value.match(passwordExpression)){
        console.log("Name");
        password.classList.add("is-invalid");
        passwordErr.innerText = "Password must be at least 8 characters long and contain 3 of the 4 following: Uppercase letter, lowercase letter, number, special character."
        error = true;
    }

    // Validate confirm password
    if(confirmPassword.value == "" || confirmPassword.value != password.value){
        console.log("Name");
        confirmPassword.classList.add("is-invalid");
        confirmPasswordErr.innerText = "Passwords must match."
        error = true;
    }

    // Check for errors at the end
    if (error) {
        return false;
    }

}

function validateLogin() {
    let error = false;

    let email = document.getElementById("email");
    let password = document.getElementById('password');

    let emailErr = document.getElementById('emailErr');
    let passwordErr = document.getElementById('passwordErr');


    console.log("Validating");

    // Validate captain name
    if(email.value == ""){
        console.log("eMail");
        email.classList.add("is-invalid");
        emailErr.innerText = "Enter Email";
        error = true;
    }

    // Validate Password
    if(password.value == "") {
        console.log("password");
        password.classList.add("is-invalid");
        passwordErr.innerText = "Please enter password";
        error = true;
    }

    // Check for errors at the end
    if (error == true) {
        return false;
    }
    let Name = "joe";
    let Q = 0;
    let A = Q;
    if(A NOT Q && Name === “Joe”){};

}