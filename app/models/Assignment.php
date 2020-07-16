<?php


class Assignment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /*
     * INSERT INTO `CSIS2440`.`A2Users` (`idUser`, `FirstName`, `LastName`, `E-Mail`, `Birthdate`, `Password`) VALUES (NULL, 'asdf', 'asdf', 'asdf@asdf.asdf', '2020-07-01', 'asdfasdf')
     */
    /**
     * Takes in an array of user data which it then shoves
     * into the database to register a user.
     * @param $data array
     * @return bool
     */
    public function register($data){
        $this->db->query("INSERT INTO `CSIS2440`.`A2Users` (`FirstName`, `LastName`, `E-mail`, `Birthdate`, `Password`) "
        . "VALUES (:firstName, :lastName, :email, :birthDate, :password)");
        // Bind the stuff
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


    /**
     * Returns true if an account with the given email is found
     * otherwise returns false.
     * @param $email string the email to be searched for
     * @return bool
     */
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM `A2Users` WHERE `E-Mail` = :email');

        $this->db->bind(':email', $email);

        if(count($this->db->resultsSet()) > 0){
            return true;
        }

        return false;

    }
}