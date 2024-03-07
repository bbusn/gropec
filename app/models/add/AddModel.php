<?php
    const SPORTS = ['running', 'musculation', 'cycling', 'calisthenics', 'boxing', 'swimming', 'climbing', 'rowing', 'downhill-ski', 'stretchings'];
 
/*____________ ADD MODEL ____________*/
class AddModel {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    /*
        _______________________________________________________________
    
        ADD FUNCTIONS    
        
        _______________________________________________________________
    */
    /*____________ ADD TRAINING ____________*/
    public function add_training($sport, $time, $user_id) {
        $day = date('l');
        //_______ SPORT EMPTY _______//
        if (empty($sport)) {
            new AlertModel('error', 'Veuillez renseigner un sport');
            unset($_POST['sport']);
            return false;
        } else {
            //_______ TIME NOT IN RANGE _______//
            if ($time < 1 || $time > 180) {
                new AlertModel('error', 'La durée doit être comprise entre 1 et 180 minutes');
                unset($_POST['sport']);
                return false;
            } else {
               //_______ USER_ID EMPTY _______//
                if (empty($user_id)) {
                    new AlertModel('error', 'Vous devez être connecté pour ajouter un entraînement');
                    unset($_POST['sport']);
                    return false;
                } else {
                    //_______ SPORT UNKNOWN _______//
                    if (!in_array($sport, SPORTS)) {
                        new AlertModel('error', 'Le sport choisi n\'est pas reconnu');
                        unset($_POST['sport']);
                        return false;
                    } else {
                        $stmt = $this->conn->prepare('INSERT INTO `gpc_training` (`id`, `user_id`, `date`, `day`, `time`, `sport`) VALUES (NULL, :user_id, CURRENT_TIMESTAMP, :day, :time, :sport)');
                        $stmt->bindParam(':user_id', $user_id);
                        $stmt->bindParam(':day', $day);
                        $stmt->bindParam(':time', $time);
                        $stmt->bindParam(':sport', $sport);
                        $stmt->execute();
                        unset($_POST['sport']);
                        return true;
                    }
                } 
            }
        }
    }
}