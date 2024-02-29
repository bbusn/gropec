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
    /*____________ GET LAST TRAINING ____________*/
    public function get_last_training() {
        //_______ USER ID _______//
        $user_id = $_SESSION['user']['id'];
        if (!empty($user_id)) {
            $stmt = $this->conn->prepare('SELECT * FROM gpc_training WHERE user_id = :user_id ORDER BY date DESC');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } else {
            //_______ NO USER ID _______//
            new AlertModel('error', 'Impossible d\'afficher l\'historique des entrainements, vous n\'êtes pas connecté.');
            return false;
        }
    }
    /*____________ SESSION GET VERSION ____________*/
    public function session_get_version($data) {
        $_SESSION['version'] = $data;
    }
    /*____________ SESSION GET LAST TRAINING ____________*/
    public function session_get_last_training($data) {
        $_SESSION['user']['history']['last'] = $data;
    }
    
}