<?php


class ECommerce extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('E_Commerce');
    }

    public function index(){
        header('Location:/ECommerce/Login');
    }

    /*******************************************************************
     * Login Page
     *******************************************************************/
    public function Login(){
        $this->activeSession();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
                'currentUser' => ''
            ];

            // Validate info then
            if ($this->checkErrors($data['email_err'], $data['password_err'])) {
                // Will either have the user data or false
                $loggedInUser = $this->model->login($data['email'], $data['password']);

                if ($loggedInUser != false) {
                    $data['currentUser'] = $this->model->currentUser($loggedInUser->eMail);
                    // Create session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Invalid username or password';
                }
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
                'currentUser' => ''
            ];
        }
        $this->view('E_Commerce/Login', $data);

    }

    /*******************************************************************
     * Logs the user out and redirects to Login
     *******************************************************************/
    public function Logout(){
        session_destroy();
        header("Location:/index");
    }

    /*******************************************************************
     * The new user page
     *******************************************************************/
    public function NewUser(){
        $this->activeSession();
        // If the form has been submitted, process, else don't
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'page' => 'CreateUser',
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
            } elseif ($this->model->findUserByEmail($data['email'])){
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

            // If we have no errors, create a user.
            if($this->checkErrors($data['first_name_err'], $data['last_name_err'], $data['birth_date_err'],
                $data['email_err'], $data['password_err'], $data['confirm_password_err'])){
                // hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // push it to the db
                $this->model->register($data);
                header("Location:/ECommerce/Login");
            }

        } else {

            $data = [
                'page' => 'CreateUser',
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
        }


        $this->view('E_Commerce/NewUser', $data);
    }

    /*******************************************************************
     * Catalogue Controller
     ******************************************************************/
    public function Catalogue(){

        $data = [
            'Products' => (array) $this->model->getProducts()
        ];
        $this->view('E_Commerce/Catalogue', $data);
    }

    /*******************************************************************
     * Product Info for AJAX
     *******************************************************************/
    public function ProductInfo(){
        $productInfo = $this->model->getProductByID($_GET['ID']);
        if($productInfo != false ){
            echo "<table class='table'>";
            echo "<tr><th>Name</th><th>Price</th><th colspan='2'>Desc</th></tr>";
            echo "<tr>";
            echo "<td align='left' width='150px'>$productInfo->Name</td>";
            echo "<td align='left' width='125px'>" . money_format('%(8n', $productInfo->Price) ."</td>";
            echo "<td align='center'>$productInfo->Description</td>";
            echo "<td align='left'><img src='/img/ECommerce/$productInfo->img' height='160' width='160'></td>";
            echo "</tr>";

            echo "</table><hr>";
        }
    }

    /*******************************************************************
     * Gets the cart
     ******************************************************************/
    public function GetCart(){

        if(isset($_SESSION['idUser'])){
            $action = $_GET['Action'];
            $productId = $_GET['ID'];

            if($productId == '--' && $action != 'Empty') $action = 'Stahp';

            switch ($action) {
                case "Add":
                    $_SESSION['cart'][$productId]++; // Adds one of the selected items to the cart
                    break;
                case "Remove":
                    $_SESSION['cart'][$productId]--; // Removes one of the selected items from the cart
                    if ($_SESSION['cart'][$productId] <= 0) unset($_SESSION['cart'][$productId]);
                    break;
                case "Empty":
                    unset($_SESSION['cart']);
                    break;
            }
            $total = 0;


            if (!empty($_SESSION['cart'])) {
                echo "<h3>Cart:</h3>";
                echo "<table class='table table-bordered'><tr><th>Name</th><th>Quantity</th><th>Price</th>"
                    . "<th>Line Cost</th></tr>";

                foreach ($_SESSION['cart'] as $productId => $quantity) {
                    // var_dump($productId);
//                $sql = "SELECT ResName, ResPPU FROM CSIS2440.Resources WHERE idResources = " . $productId;
//                $result = $con->query($sql);
                    $product = $this->model->getProductByID($productId);

                    if ($product != false) {
                        $name = $product->Name;
                        $price = $product->Price;

                        $lineCost = $price * $quantity; // line cost
                        $total += $lineCost; //add to the total cost
                        echo "<tr>";
                        //show this info in the table cells
                        echo "<td align='Left' width='80%'>$name</td>";
                        echo "<td align='center'>$quantity</td>";

                        echo "<td align='center' width='75px'>" . money_format('%(#8n', $price) . "</td>";

                        echo "<td align='center'>" . money_format('%(#8n', $lineCost) . "</td>";

                        echo "</tr>";
                    }
                }

                echo "<tr>";
                echo "<td colspan='3' align='right'>Total:</td>";
                echo "<td align='right'>" . money_format('%(#8n', $total) . "</td>";
                echo "</tr>";
                echo "</table>";
            } else {
                echo "";
            }
        } else {
            echo "<p><a href='/ECommerce/Login'>Login</a> to create a cart</p>";
        }
    }

    /*******************************************************************
     * Sets the session variables and redirects to the result page
     * @param object $user the user's info from the db
     *******************************************************************/
    private function createUserSession($user){

        $user = (array) $user;
        foreach($user as $index => $value){
            $_SESSION[$index] = $value;
        }

        header("Location:/ECommerce/Catalogue");
    }

    private function activeSession(){
        if(isset($_SESSION['idUser'])) {
            header("Location:/ECommerce/Catalogue");
        }
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