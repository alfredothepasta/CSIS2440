<?php


class Assignment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /******************************************************************
     * Takes in an array of user data which it then shoves
     * into the database to register a user.
     * @param $data array
     * @return bool
     ******************************************************************/
    public function register($data){
        $this->db->query("INSERT INTO `CSIS2440`.`A2Users` (`FirstName`, `LastName`, `eMail`, `Birthdate`, `Password`) "
        . "VALUES (:firstName, :lastName, :email, :birthDate, :password)");
        // Bind the stuff (also performs sanitization, preventing SQL injection and the like.)
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':birthDate', $data['birthDate']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    /******************************************************************
     * Checks the email against the password in the db and either
     * returns the result or false
     * @param string $email
     * @param string $password
     * @return bool
     ******************************************************************/
    public function login($email, $password){
        $this->db->query('SELECT * FROM A2Users WHERE `eMail` = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->Password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }


    /******************************************************************
     * Returns true if an account with the given email is found
     * otherwise returns false.
     * @param $email string the email to be searched for
     * @return bool
     ******************************************************************/
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM `A2Users` WHERE `eMail` = :email');

        $this->db->bind(':email', $email);

        if(count($this->db->resultsSet()) > 0){
            return true;
        }

        return false;

    }

    /******************************************************************
     * @param string $searchString the query to be searched for
     * @param string $table the table to be searched, pulled from
     * $_POST
     * @return array Results of the query.
     ****************************************************************
     */
    public function searchUsers($searchString, $table){

        switch ($table){
            case 'FirstName':
                $searchTable = 'FirstName';
                break;
            case 'LastName':
                $searchTable = 'LastName';
                break;
            case 'eMail':
                $searchTable = 'eMail';
                break;
            default:
                die('Did you just try to muck with my HTML?');
        }


        $this->db->query("SELECT `FirstName`, `LastName`, `eMail`, `Birthdate` FROM `A2Users` WHERE `$searchTable` like :query");

        // bind
        $this->db->bind(':query', $searchString . '%');

        return $this->db->resultsSet();
    }

    public function currentUser($searchString){


        $this->db->query("SELECT `FirstName`, `LastName`, `eMail`, `Birthdate` FROM `A2Users` WHERE `eMail` = :query");

        // bind
        $this->db->bind(':query', $searchString);

        return $this->db->single();
    }


    /******************************************************************
     * @return Array all results from the
     ******************************************************************/
    public function getUsers(){
        $this->db->query('SELECT `FirstName`, `LastName`, `eMail`, `Birthdate` FROM `A2Users`');
        return $this->db->resultsSet();
    }

    /******************************************************************
     * updates the user info in the DB
     * @param $data
     ******************************************************************/
    public function updateUser($data){
        $this->db->query('UPDATE `A2Users` SET `FirstName` = :firstName, `LastName` = :lastName, `Birthdate` = :birthDate, `eMail` = :eMail WHERE `idUser` = :id');

        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':birthDate', $data['birthDate']);
        $this->db->bind(':eMail', $data['email']);
        $this->db->bind(':id', $data['idUser']);


        $this->db->execute();

    }

    /******************************************************************
     * @param $id
     * @return object the requested user
     ******************************************************************/
    public function getUserByID($id){
        $this->db->query('SELECT * FROM `A2Users` WHERE `idUser` = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

}