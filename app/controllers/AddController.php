<?php

require_once('app/models/add/AddModel.php');

/*____________ ADD CONTROLLER ____________*/
class AddController {
    private $conn, $addModel;
    /*____________ CONSTRUCT ____________*/
    public function __construct($conn) {
        $this->conn = $conn;
        $this->addModel = new AddModel($this->conn);
    }
    /*____________ ADD VIEW ____________*/
    public function add_view() {
        require('resources/views/add/add.php');
    }
    /*____________ ADD TRAINING VIEW ____________*/
    public function add_training_view() {
        require('resources/views/add/add_training.php');
    }
    /*____________ ADD TRAINING ____________*/
    public function add_training($sport, $time, $user_id) {
        $data = $this->addModel->add_training($sport, $time, $user_id);
        if ($data) {
            new AlertModel('success', 'Entraînement ajouté avec succès');
            header('Location: ' . ROOT . 'add');
            exit();
        } else {
            header('Location: ' . ROOT . 'add/training');
            exit();
        }
    }
}