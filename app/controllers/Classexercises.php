<?php


class Classexercises extends Controller
{
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
}