<?php


class Assignments extends Controller
{
    public function __construct()
    {
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

}