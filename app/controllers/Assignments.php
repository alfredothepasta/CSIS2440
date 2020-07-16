<?php


class Assignments extends Controller
{
    /**
     * @var mixed
     */
    private $assignmentModel;

    public function __construct()
    {
        $this->assignmentModel = $this->model('Assignment');
    }

    public function A1(){
        $this->view('Assignments/AssignmentOne/A1Form');
    }

    public function A1Results(){
        // Get data from $_POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'HeroName' => $_POST['HeroName'],
                'Class' => $_POST['Class'],
                'Race' => $_POST['Race'],
                'Age' => $_POST['Age'],
                'Gender' => $_POST['Gender'],
                'KingdomName' => $_POST['KingdomName']
            ];
        } else {
            $data = [
                'HeroName' => '',
                'Class' => '',
                'Race' => '',
                'Age' => '',
                'Gender' => '',
                'KingdomName' => ''
            ];
        }

        $this->view('Assignments/AssignmentOne/A1Results', $data);

    }


    /**
     * Controller for the A2 page
     * @param string $page defaults to create user page if not given parameters
     */
    public function A2($page = 'A2CreateUser'){
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = null;

        // Do the thing for that page
        if($page == 'A2CreateUser'){
            // check for POST, create the data for the $data variable
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = $this->A2CreateData(false);
                // check that there are no errors
                if($this->checkErrors($data['first_name_err'], $data['last_name_err'], $data['birth_date_err'],
                    $data['email_err'], $data['password_err'], $data['confirm_password_err'])){
                    // hash the password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // push it to the db
                    $this->assignmentModel->register($data);
                }
                // if there are errors, they'll be passed into the page
            } else {
                $data = $this->A2CreateData();
                // pass in the empty array
            }

        } elseif ($page == 'Login'){
            // Process form data for the login page

        } elseif ($page == 'Posts'){
            // Process form data for the posts page
        }

        $this->view('Assignments/AssignmentTwo/A2', $data);
    }


    /****************************************************************
     * Creates the $data array for use with A2
     * @param bool $empty creates empty data array by default
     * @return array|string[]
     ****************************************************************/
    private function A2CreateData($empty = true){
        if($empty){
            $data = [
                'page' => 'A2CreateUser',
                'firstName' => '',
                'lastName' => '',
                'birthDate' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'birth_date_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
        } else {
            $data = [
                'page' => 'A2CreateUser',
                'firstName' => trim($_POST['firstName']),
                'lastName' => trim($_POST['lastName']),
                'birthDate' => trim($_POST['birthDate']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'first_name_err' => '',
                'last_name_err' => '',
                'birth_date_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Error checking
            $data['first_name_err'] = (empty($data['firstName']))? 'Please enter your first name': '';
            $data['last_name_err'] = (empty($data['lastName']))? 'Please enter your last name': '';
            $data['birth_date_err'] = (empty($data['birthDate']))? 'Please enter your birthday': '';

            // Email we need to check if it's both empty and not in use
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter your email';
            } elseif ($this->assignmentModel->findUserByEmail($data['email'])){
                $data['email_err'] = 'Email already in use';
            }

            // check password and password length
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter a password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters long';
            }

            // check that our confirm password has been filled out and matches
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm your password';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }
        }

        return $data;
    }


    /*****************************************************************************
     * Creates the data array for the Login page
     * @param bool $empty default is true, set to false if there is POST data
     * @return array|string[]
     *****************************************************************************/
    private function A2Login($empty = true){
        if($empty){
            $data = [
                'page' => 'Login',
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
                'invalid_creds_err' => ''
            ];
        } else {
            $data = [
                'page' => 'Login',
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
                'invalid_creds_err' => ''
            ];

            // Email we need to check if it's both empty and not in use
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter your email';
            } elseif (!$this->assignmentModel->findUserByEmail($data['email'])){
                $data['email_err'] = 'BAD';
            }

            // check password and password length
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter a password';
            } elseif (true) {
                // todo: check password against username
            }

            // check that our confirm password has been filled out and matches
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm your password';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }
        }

        return $data;
    }

    /*******************************************************************
     * @param string ...$errors takes in an amount of error strings.
     * returns true if all are empty, false if there are any errors.
     * @return bool
     *******************************************************************/
    private function checkErrors(...$errors){
        foreach ($errors as $error){
            if(!empty($error)){
                return false;
            }
        }
        return true;
    }

}