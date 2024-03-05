<?php

require_once('app/models/home/HomeModel.php');

/*____________ HOME CONTROLLER ____________*/
class HomeController {
    private $conn, $homeModel;
    public function __construct($conn) {
        $this->conn = $conn;
        $this->homeModel = new HomeModel($this->conn);
    }
    /*____________ HOME VIEW ____________*/
    public function home_view() {
        require('resources/views/home/home.php');
    }
}