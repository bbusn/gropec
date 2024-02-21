<?php


/*____________ ADD CONTROLLER ____________*/
class AddController {
    // private $conn, $userModel;
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
        // $this->userModel = new UserModel($this->conn);
    }
    /*____________ USER VIEW ____________*/
    public function add_view() {
        require('resources/views/add/add.php');
    }
}