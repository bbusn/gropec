<?php


/*____________ ADD CONTROLLER ____________*/
class AddController {
    // private $conn, $userModel;
    private $conn;
    /*____________ CONSTRUCT ____________*/
    public function __construct($conn) {
        $this->conn = $conn;
        // $this->userModel = new UserModel($this->conn);
    }
    /*____________ ADD VIEW ____________*/
    public function add_view() {
        require('resources/views/add/add.php');
    }
    /*____________ ADD TRAINING VIEW ____________*/
    public function add_training_view() {
        require('resources/views/add/add_training.php');
    }
}