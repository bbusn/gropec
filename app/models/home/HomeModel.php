<?php
 
/*____________ HOME MODEL ____________*/
class HomeModel {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    /*
        _______________________________________________________________
    
        HOME FUNCTIONS    
        
        _______________________________________________________________
    */
    /*____________ GET VERSION ____________*/
    public function get_version() {
        $stmt = $this->conn->prepare('SELECT number, description FROM gpc_version ORDER BY date DESC LIMIT 1');
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    /*____________ SESSION GET VERSION ____________*/
    public function session_get_version($data) {
        $_SESSION['version'] = $data;
    }
}