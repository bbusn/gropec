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
        $data = $this->homeModel->get_version();
        if ($data) {
            $this->homeModel->session_get_version($data);
            $data = $this->homeModel->get_last_training();
            if ($data) {
                $this->homeModel->session_get_last_training($data);
                require('resources/views/home/home.php');
            }
        } else {
            header('Location: ' . ROOT . 'user');
            exit();
        }
    }
}