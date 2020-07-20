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
     * Controller for the A2 page, running everything through A2 was a bad idea
     * @param string $page defaults to create user page if not given parameters
     */
    public function A2($page = 'A2CreateUser'){
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = null;



        // Do the thing for that page
        if($page == 'A2CreateUser'){
            // if there's an active session redirect to the result page
            $this->activeSession($page);
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
                    header("Location:/Assignments/A2/Login");
                }
                // if there are errors, they'll be passed into the page
            } else {
                $data = $this->A2CreateData();
                // pass in the empty array
            }

        } elseif ($page == 'Result'){
            if (!isset($_SESSION['idUser'])) header('Location:/Assignments/A2/Login');
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                // search for the query string
                $data = [
                    'page' => 'Result',
                    'resultSet' => $this->assignmentModel->searchUsers($_POST['search'], $_POST['searchBy'])
                ];
            } else {
                // show all the poor shmuks who FELL FOR IT.
                $data = [
                    'page' => 'Result',
                    'resultSet' => $this->assignmentModel->getUsers()
                ];
            }
        } elseif ($page == 'Login') {
            // if there's an active session redirect to the result page
            $this->activeSession($page);
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = $this->A2LoginData(false);

                if ($this->checkErrors($data['email_err'], $data['password_err'])){
                    // Will either have the user data or false
                    $loggedInUser = $this->assignmentModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        $data['currentUser'] = $this->assignmentModel->currentUser($loggedInUser->eMail);
                        // Create session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Invalid username or password';
                    }
                }

            } else {
                $data = $this->A2LoginData();
            }
        } elseif ($page == 'Logout'){
            $data = ['page' => 'Logout'];
        } elseif($page == 'UpdateInfo') {

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // create data array
                $data = $this->A2UpdateData();
                // pass data array into thing
                $this->assignmentModel->updateUser($data);
                $user = $this->assignmentModel->getUserByID($_SESSION['idUser']);
                // update session vars
                $this->createUserSession($user);
                header('Location:/Assignments/A2');

            } else {
                $data = ['page' => 'UpdateInfo'];
            }
        }

        $this->view('Assignments/AssignmentTwo/A2', $data);
    }


    /****************************************************************
     * Creates the $data array for use with the A2 registration page
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

    /****************************************************************
     * Creates the $data array for use with the A2 update page
     * @return array|string[]
     ****************************************************************/
    private function A2UpdateData(){
        $data = [
                'page' => 'A2UpdateData',
                'idUser' => $_SESSION['idUser'],
                'firstName' => trim($_POST['firstName']),
                'lastName' => trim($_POST['lastName']),
                'birthDate' => trim($_POST['birthDate']),
                'email' => trim($_POST['email']),
                'first_name_err' => '',
                'last_name_err' => '',
                'birth_date_err' => '',
                'email_err' => ''
            ];

        // Error checking
        $data['first_name_err'] = (empty($data['firstName']))? 'First Name cannot be blank': '';
        $data['last_name_err'] = (empty($data['lastName']))? 'Last Name cannot be blank': '';
        $data['birth_date_err'] = (empty($data['birthDate']))? 'You had to be born sometime': '';

        // Email we need to check if it's both empty and not in use
        if(empty($data['email'])){
            $data['email_err'] = 'Please enter your email';
        } elseif ($this->assignmentModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email already in use';
        }

        return $data;
    }


    /****************************************************************
     * Creates the $data array for use with the A2 Login page
     * @param bool $empty creates empty data array by default
     * @return array|string[]
     ****************************************************************/
    private function A2LoginData($empty = true){
        if($empty){
            $data = [
                'page' => 'Login',
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
                'currentUser' => ''
            ];
        } else {
            $data = [
                'page' => 'Login',
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
                'currentUser' => ''
            ];

            // make sure an email/password is at least entered
            empty($data['email']) ? $data['email_err'] = 'Please enter your email' : '';
            empty($data['password']) ? $data['password_err'] = 'Please enter your password' : '';

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

    /*******************************************************************
     * Sets the session variables and redirects to the result page
     * @param object $user the user's info from the db
     *******************************************************************/
    private function createUserSession($user){
        $_SESSION['idUser'] = $user->idUser;
        $_SESSION['FirstName'] = $user->FirstName;
        $_SESSION['LastName'] = $user->LastName;
        $_SESSION['eMail'] = $user->eMail;
        $_SESSION['Birthdate'] = $user->Birthdate;
//        print_r($_SESSION);

        header("Location:/Assignments/A2/Result");
    }

    private function activeSession($page){
        if(isset($_SESSION['idUser']) && $page != 'Result'){
            header('Location:/Assignments/A2/Result');
        }
    }

}