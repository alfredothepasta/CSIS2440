<?php


class Planet
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPlanet($data){
        $this->db->query(
        "INSERT INTO CSIS2440.Planets (PlanetName, PosX, PosY, PosZ, Description)
                VALUE (:name, :x, :y, :z, :description);
        ");

        // Bind the paramaters
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':x', $data['x']);
        $this->db->bind(':y', $data['y']);
        $this->db->bind(':z', $data['z']);
        $this->db->bind(':description', $data['description']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }


    }
//array("name" => "Ares",
//"x" => 335,
//"y" => 345,
//"z" => 262,
//"description"=>"A moon of Boros, the third planet orbiting Georgia. It is named after the
}