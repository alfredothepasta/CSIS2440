<?php


class Classexercises extends Controller
{
    /**
     * @var mixed
     */
    public $dbModel;

    public function __construct()
    {
    }

    public function CE01(){
        $this->view('Classexercises/CE01');
    }

    public function CE02(){
        $this->view('Classexercises/CE02');
    }

    public function CE03(){
        $this->view('Classexercises/CE03/FormPage');
    }

    public function CE03Result(){
        // Get data from $_POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ship' => $_POST['ship'],
                'departure' => $_POST['departure'],
                'arrival' => $_POST['arrival']
            ];
        } else {
            $data = [
                'Ship' => '',
                'Departure' => '',
                'Arrival' => ''
            ];
        }
        $this->view('Classexercises/CE03/ResultPage', $data);
    }

    public function CE04() {
        $this->view('Classexercises/CE04/CE04');
    }

    public function CE04Result(){
        // Get data from $_POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'CapName' => $_POST['CapName'],
                'CapAge' => $_POST['CapAge'],
                'ShipName' => $_POST['ShipName']
            ];
        } else {
            $data = [
                'CapName' => '',
                'CapAge' => '',
                'ShipName' => ''
            ];
        }
        $this->view('Classexercises/CE04/CE04Result', $data);
    }

    public function CE06(){
        $this->view('Classexercises/CE06/CE06');
    }

    public function DataBaseConnection(){
        $this->view('Classexercises/CE06/DataBaseConnection');
    }

    public function CE07(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'sneaky' => $_POST['sneaky'],
                'name' => $_POST['PlanetName'],
                'posx' => $_POST['PosX'],
                'posy' => $_POST['PosY'],
                'posz' => $_POST['PosZ'],
                'desc' => $_POST['Desc'],
                'faction' => $_POST['Alignment'],
                'action' => $_POST['Action'],
            ];
        } else {
            $data = [
                'sneaky' => '',
                'name' => '',
                'posx' => '',
                'posy' => '',
                'posz' => '',
                'desc' => '',
                'faction' => '',
                'action' => '',
            ];
        }
        $this->view('Classexercises/CE07/CE07', $data);

    }

    public function CE08($page = null){
        $this->view('Classexercises/CE08/CE08', $page);
    }



}