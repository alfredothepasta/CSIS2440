<?php
/**************************************
 * Master Controller Class
 * Loads models and views
 *************************************/
class Controller{
    // Load the model
    public function model($model){
        // Require model files
        require_once '../app/models/' .$model. '.php';

        // Instantiate the model which is what we'll use to connect to the database
        return new $model();
    }

    // Load view
    public function view($view, $data = []){
        // Check for the view file
        if(file_exists('../app/views/'.$view.'.php')){
            require_once '../app/views/'.$view.'.php';
        } else {
            die("IT'S NOT REAL");
        }
    }
}