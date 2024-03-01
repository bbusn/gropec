<?php
   const PASSWORD_MIN_SIZE = 5;
   const PASSWORD_MAX_SIZE = 15;
   const USERNAME_MIN_SIZE = 3;
   const USERNAME_MAX_SIZE = 15;
   const GROUP_MIN_SIZE = 3;
   const GROUP_MAX_SIZE = 15;
   const GROUP_MAX_USERS = 9;
   const GROUP_MIN_USERS = 1;
/*____________ USER MODEL ____________*/
class UserModel {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    /*
        _______________________________________________________________
    
        USER FUNCTIONS    
        
        _______________________________________________________________
    */
    /*____________ SIGN UP ____________*/
    public function sign_up($username, $password, $passwordConfirm) {
        if (!$this->username_conform($username)) {
            return false;
        } else {
            if (!$this->password_conform($password, $passwordConfirm)) {
                return false;
            } else {
                //_______ SIGN UP _______//
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO gpc_user (username, password) VALUES (:username, :password)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $hashedPassword);
                $result = $stmt->execute();

                unset($_POST['username'], $_POST['password']);
                return $result;
            }
        }
    }
    /*____________ SIGN IN ____________*/
    public function sign_in($username, $password, $ip) {
        $data = $this->check_ban($ip);
        if ($data == '1') {
            new AlertModel('error', 'Trop de tentatives, veuillez contacter l\'administrateur.');
            unset($_POST['username'], $_POST['password']);            
            return false;
        } else {
            //_______ USERNAME EMPTY _______//
            if (empty($username)) {
                new AlertModel('error', 'Veuillez renseigner un nom d\'utilisateur pour vous connecter.');
                unset($_POST['username'], $_POST['password']);            
                return false;
            } else {
                //_______ PASSWORD EMPTY _______//
                if (empty($password)) {
                    new AlertModel('error', 'Veuillez renseigner un mot de passe pour vous connecter.');
                    unset($_POST['username'], $_POST['password']);          
                    return false;
                } else {
                    //_______ USERNAME EXISTS _______//
                    if (!$this->username_exists($username)) {
                        new AlertModel('error', 'Ce nom d\'utilisateur n\'existe pas.');
                        unset($_POST['username'], $_POST['password']);
                        return false;
                    } else {
                        //_______ PASSWORD VERIFY _______//
                        if ($this->password_verified($username, $password)) {
                            return true;
                        } else {
                            $data = $this->check_attempts($ip);
                            if ($data) {
                                if ($data == 5) {
                                    $this->ban($ip);
                                    new AlertModel('error', 'Trop de tentatives, veuillez contacter l\'administrateur.');
                                    return false;
                                } else {
                                    $this->add_attempt($ip);
                                }
                            } else {
                                $this->insert_attempt($ip);
                            }
                            $data = $this->check_attempts($ip);
                            $this->session_update_attempts($data);
                            
                            $attempts = 5 - intval($_SESSION['attempts']);
                            if ($attempts === 0) {
                                $this->ban($ip);
                                new AlertModel('error', 'Trop de tentatives, veuillez contacter l\'administrateur.');
                                return false;
                            } else {
                                new AlertModel('error', 'Le mot de passe est incorrect. ' . $attempts . ' tentative(s) restante(s).');
                                unset($_POST['username'], $_POST['password']);    
                                return false;
                            }
                        }
                    }
                }
            }
        }
    }
    /*____________ GET IP ____________*/
    public function get_ip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    /*____________ CHECK BAN ____________*/
    public function check_ban($ip) {
        $query = "SELECT banned FROM gpc_ban WHERE adress = :adress";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':adress', $ip);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($data['banned'])) {
            return $data['banned'];
        } else {
            return false;
        }
    }
    /*____________ CHECK ATTEMPTS ____________*/
    public function check_attempts($ip) {
        $query = "SELECT attempts FROM gpc_ban WHERE adress = :adress";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':adress', $ip);
        $stmt->execute();
        $data = $stmt->fetchColumn();
        return intval($data);
    }
    /*____________ REMOVE ATTEMPTS ____________*/
    public function remove_attempts($ip) {
        $query = "UPDATE gpc_ban SET attempts = 0 WHERE adress = :adress";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':adress', $ip);
        $stmt->execute();
    }

    /*____________ ADD ATTEMPT ____________*/
    public function add_attempt($ip) {
        $query = "UPDATE gpc_ban SET attempts = attempts + 1 WHERE adress = :adress";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':adress', $ip);
        $stmt->execute();
    }
    /*____________ INSERT ATTEMPT ____________*/
    public function insert_attempt($ip) {
        $query = "INSERT INTO gpc_ban (adress, attempts) VALUES (:adress, 1)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':adress', $ip);
        $stmt->execute();
    }
    /*____________ BAN ____________*/
    public function ban($ip) {
        $query = "UPDATE gpc_ban SET banned = '1' WHERE adress = :adress";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':adress', $ip);
        $stmt->execute();
    }
   
    /*____________ DELETE TRAINING ____________*/
    public function delete_training($id) {
        $user_id = $_SESSION['user']['id'];
        //_______ USER ID EMPTY _______//
        if (empty($user_id)) {
            new AlertModel('error', 'Impossible de supprimer l\'entrainement, vous n\'êtes pas connecté.');
            return false;
        } else {
            //_______ DELETE TRAINING _______//
            $query = "DELETE FROM gpc_training WHERE id = :id AND user_id = :user_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':user_id', $user_id);
            $result = $stmt->execute();
            return $result;
        }
    }
 
    /*____________ MODIFY PASSWORD ____________*/
    public function modify_password($oldPassword, $password, $passwordConfirm) {
        $username = $_SESSION['user']['username'];
        //_______ USERNAME EMPTY _______//
        if (empty($username)) {
            new AlertModel('error', 'Vous n\'êtes pas connecté. Connectez vous pour modifier votre compte.');
            unset($_POST['password']);
            return false;
        }
        //_______ OLD PASSWORD EMPTY _______//
        if (empty($oldPassword)) {
            new AlertModel('error', 'Veuillez rentrer votre mot de passe pour modifier votre compte.');
            unset($_POST['password']);
            return false;
        }
        //_______ PASSWORD, PASSWORD CONFIRM _______//
        if (empty($password) || empty($passwordConfirm)) {
            new AlertModel('error', 'Veuillez rentrer un nouveau mot de passe et le confirmer pour modifier votre compte.');
            unset($_POST['password']);
            return false;          
        }
        //_______ PASSWORD CONFORM _______//
        if (!$this->password_conform($password, $passwordConfirm)) {
            return false;
        } else {
            //_______ PASSWORD VERIFY _______//
            if (!$this->password_verified($username, $oldPassword)) {
                new AlertModel('error', 'Ancien mot de passe incorrect.');
                unset($_POST['password']);                     
                return false;
            } else {
                //_______ MODIFY ACCOUNT _______//
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $query = "UPDATE gpc_user SET username = :username, password = :password WHERE username = :username";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':username', $username);
                $result = $stmt->execute();

                return $result;
            }
        }
    }
    /*____________ DELETE ACCOUNT ____________*/
    public function delete_account() {
        $username = $_SESSION['user']['username'];
        $user_id = $_SESSION['user']['id'];
        //_______ USERNAME EMPTY _______//
        if (empty($username) || empty($user_id)) {
            new AlertModel('error', 'Vous n\'êtes pas connecté, connectez vous pour supprimer votre compte.');
            unset($_POST['username']);
            return false;
        } else {
            //_______ DELETE ACCOUNT _______//
            $query = "DELETE FROM gpc_user WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $result = $stmt->execute();

            $query = "DELETE FROM gpc_training WHERE user_id = :user_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':user_id', $user_id);
            $result = $stmt->execute();
            return true;
        }
    }
    /*____________ USERNAME EXISTS ____________*/
    public function username_exists($username) {
        $query = "SELECT COUNT(*) FROM gpc_user WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
    /*____________ USERNAME CORRECT ____________*/
    public function username_conform($username) {
        //_______ USERNAME EMPTY _______//
        if (empty($username)) {
            new AlertModel('error', 'Veuillez renseigner un nom d\'utilisateur pour vous inscrire.');
            unset($_POST['username'], $_POST['password']);
            return false;
        } else {
            //_______ USERNAME MIN SIZE _______//
            if (strlen($username) < USERNAME_MIN_SIZE) {
                new AlertModel('error', 'Votre nom d\'utilisateur doit contenir au moins ' . USERNAME_MIN_SIZE  . ' caractères.');
                unset($_POST['username'], $_POST['password']);            
                return false;
            } else {
                //_______ USERNAME MAX SIZE _______//
                if (strlen($username) > USERNAME_MAX_SIZE) {
                    new AlertModel('error', 'Votre nom d\'utilisateur ne doit pas dépasser ' . USERNAME_MAX_SIZE  . ' caractères.');
                    unset($_POST['username'], $_POST['password']);
                    return false;
                } else {
                    //_______ USERNAME CHARACTERS _______//
                    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
                        new AlertModel('error', 'Votre nom d\'utilisateur ne doit contenir que des lettres, des chiffres et des underscores.');
                        unset($_POST['username'], $_POST['password']);
                        return false;
                    } else {
                        if ($this->username_exists($username)) {
                            new AlertModel('error', 'Ce nom d\'utilisateur existe déjà. Veuillez en choisir un autre.');
                            unset($_POST['username'], $_POST['password']);
                            return false;
                        } else {
                            return true;
                        }
                    }
                }
            }
        }
    }
    /*____________ PASSWORD VERIFIED ____________*/
    public function password_verified($username, $password) {
        //_______ PASSWORD VERIFY _______//
        $query = "SELECT password FROM gpc_user WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $hashedPassword = $stmt->fetchColumn();
        if (password_verify($password, $hashedPassword)) {
            return true;
        } else {
            return false;
        }
    }
    /*____________ PASSWORD CONFORM ____________*/
    public function password_conform($password, $passwordConfirm) {
        //_______ PASSWORD EMPTY _______//
        if (empty($password)) {
            new AlertModel('error', 'Veuillez renseigner un mot de passe pour vous inscrire.');
            unset($_POST['password']);
            return false;
        } else {
            //_______ PASSWORD MIN SIZE _______//
            if (strlen($password) < PASSWORD_MIN_SIZE) {
                new AlertModel('error', 'Votre mot de passe doit contenir au moins ' . PASSWORD_MIN_SIZE  . ' caractères.');
                unset($_POST['password']);
                return false;
            } else {
                //_______ PASSWORD MAX SIZE _______//
                if (strlen($password) > PASSWORD_MAX_SIZE) {
                    new AlertModel('error', 'Votre mot de passe ne doit pas dépasser ' . PASSWORD_MAX_SIZE  . ' caractères.');
                    unset($_POST['password']);
                    return false;
                } else {
                    //_______ PASSWORD CHARACTERS _______//
                    if (!preg_match('/^[a-zA-Z0-9_]+$/', $password)) {
                        new AlertModel('error', 'Votre mot de passe ne doit contenir que des lettres, des chiffres et des underscores.');
                        unset($_POST['password']);
                        return false;
                    } else {
                        //_______ PASSWORD CONFIRM EMPTY _______//
                        if (empty($passwordConfirm)) {
                            new AlertModel('error', 'Veuillez confirmer votre mot de passe.');
                            unset($_POST['password']);
                            return false;
                        } else {
                            //_______ PASSWORD CONFIRM DIFFERENT _______//
                            if ($password !== $passwordConfirm) {
                                new AlertModel('error', 'Les mots de passe ne correspondent pas.');
                                unset($_POST['password']);
                                return false;
                            } else {
                                return true;
                            }
                        }
                    }
                }
            }
        }
    }
    /*
        _______________________________________________________________
    
        GROUP FUNCTIONS    
        
        _______________________________________________________________
    */
    /*____________ JOIN GROUP ____________*/
    public function join_group($code) {
        //_______ CODE EMPTY _______//
        if (empty($code)) {
            new AlertModel('error', 'Veuillez renseigner un code pour rejoindre un groupe.');
            unset($_POST['code']);            
            return false;
        } else {
            if (!$this->group_exists($code)) {
                new AlertModel('error', 'Ce groupe n\'existe pas.');
                unset($_POST['code']);      
                return false;
            } else {
                //_______ GROUP FULL _______//
                $query = "SELECT COUNT(*) FROM gpc_user WHERE group_id = (SELECT id FROM gpc_group WHERE code = :code)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':code', $code);
                $stmt->execute();
                $count = $stmt->fetchColumn();
                
                if ($count === GROUP_MAX_USERS ) {
                    new AlertModel('error', 'Ce groupe est complet.');
                    unset($_POST['code']);      
                    return false;
                } else {
                    //_______ GROUP CONTAIN USER _______//
                    if ($this->group_contain_user($_SESSION['user']['username'], $code)) {
                        new AlertModel('error', 'Vous êtes déjà dans ce groupe.');
                        unset($_POST['code']);      
                        return false;
                    } else {
                        //_______ GROUP JOIN _______//
                        $query = "UPDATE gpc_user SET group_id = (SELECT id FROM gpc_group WHERE code = :code) WHERE username = :username";
                        $stmt = $this->conn->prepare($query);
                        $stmt->bindParam(':code', $code);
                        $stmt->bindParam(':username', $_SESSION['user']['username']);
                        $result = $stmt->execute();
                        unset($_POST['code']);
                        return $result;
                    }
                }
            }
        }
    }
    /*____________ LEAVE GROUP ____________*/
    public function leave_group() {
        //_______ GROUP CODE _______//
        $code = $_SESSION['user']['group']['code'];
        //_______ CODE EMPTY _______//
        if (empty($code)) {
            new AlertModel('error', 'Vous n\'êtes pas dans un groupe.');
            unset($_POST['code']);            
            return false;
        } else {
            if (!$this->group_exists($code)) {
                new AlertModel('error', 'Ce groupe n\'existe pas.');
                unset($_POST['code']);      
                return false;
            } else {
                //_______ GROUP CONTAIN USER _______//
                if (!$this->group_contain_user($_SESSION['user']['username'], $code)) {
                    new AlertModel('error', 'Vous n\'êtes pas dans ce groupe.');
                    unset($_POST['code']);      
                    return false;
                } else {
                    //_______ GROUP LEAVE _______//
                    $query = "UPDATE gpc_user SET group_id = NULL WHERE username = :username";
                    $stmt = $this->conn->prepare($query);
                    $stmt->bindParam(':username', $_SESSION['user']['username']);
                    $result = $stmt->execute();

                    //_______ GROUP DELETE IF NO MORE USERS _______//
                    $query = "SELECT COUNT(*) FROM gpc_user WHERE group_id = (SELECT id FROM gpc_group WHERE code = :code)";
                    $stmt = $this->conn->prepare($query);
                    $stmt->bindParam(':code', $code);
                    $stmt->execute();
                    $count = $stmt->fetchColumn();
                
                    if ($count < GROUP_MIN_USERS ) {
                        $query = "DELETE FROM gpc_group WHERE code = :code";
                        $stmt = $this->conn->prepare($query);
                        $stmt->bindParam(':code', $code);
                        $stmt->execute();
                    }
                    return $result;
                }
            }
        }
    }
    /*____________ CREATE GROUP ____________*/
    public function create_group($code, $name) {
        //_______ CODE EMPTY _______//
        if (empty($code)) {
            new AlertModel('error', 'Aucun code de groupe généré, veuillez recommencer la création.');
            return false;
        } else {
            //_______ GROUP NAME EMPTY _______//
            if (empty($name)) {
                new AlertModel('error', 'Veuillez renseigner un nom pour votre groupe.');
                return false;
            } else {
                //_______ GROUP MIN SIZE _______//
                if (strlen($name) < GROUP_MIN_SIZE) {
                    new AlertModel('error', 'Votre nom de groupe doit contenir au moins ' . GROUP_MIN_SIZE  . ' caractères.');
                    return false;
                } else {
                    //_______ GROUP MAX SIZE _______//
                    if (strlen($name) > GROUP_MAX_SIZE) {
                        new AlertModel('error', 'Votre nom de groupe ne doit pas dépasser ' . GROUP_MAX_SIZE  . ' caractères.');
                        return false;
                    } else {
                        //_______ CODE ALREADY USED _______//
                        $query = "SELECT COUNT(*) FROM gpc_group WHERE code = :code";
                        $stmt = $this->conn->prepare($query);
                        $stmt->bindParam(':code', $code);
                        $stmt->execute();
                        $count = $stmt->fetchColumn();
                        
                        if ($count > 0) {
                            new AlertModel('error', 'Ce code est déjà utilisé, veuillez recommencer la création.');
                            return false;
                        } else {
                            //_______ GROUP CREATE _______//
                            $query = "INSERT INTO gpc_group (code, name) VALUES (:code, :name)";
                            $stmt = $this->conn->prepare($query);
                            $stmt->bindParam(':code', $code);
                            $stmt->bindParam(':name', $name);
                            $result = $stmt->execute();

                            unset($_POST['code']);                            
                            return $result;
                        }
                    }
                }
            }
        }
    }
    /*____________ GROUP EXISTS ____________*/
    public function group_exists($code) {
        $query = "SELECT COUNT(*) FROM gpc_group WHERE code = :code";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
    /*____________ GROUP CONTAIN USER ____________*/
    public function group_contain_user($username, $code) {
        $query = "SELECT COUNT(*) FROM gpc_user WHERE username = :username AND group_id = (SELECT id FROM gpc_group WHERE code = :code)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*____________ GET GROUP ____________*/
    public function get_group() {
        //_______ USERNAME _______//
        $username = $_SESSION['user']['username'];
        if ($username) {
            $query = "SELECT * FROM gpc_group WHERE id = (SELECT group_id FROM gpc_user WHERE username = :username)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } else {
            //_______ USERNAME NOT SET _______//
            new AlertModel('error', 'Impossible de récupérer les données du groupe, vous n\'êtes pas connecté.');
            return false;
        }
    }
    /*____________ GET GROUP USERS ____________*/
    public function get_group_users() {
        //_______ GROUP _______//
        $group = $_SESSION['user']['group']['id'];
        if ($group) {
            $query = "SELECT username FROM gpc_user WHERE group_id = :group";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':group', $group);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            //_______ GROUP NOT SET _______//
            new AlertModel('error', 'Impossible de récupérer les données du groupe, vous n\'êtes pas dans un groupe.');
            return false;
        }
    }
    /*____________ GET USER ____________*/
    public function get_user($username) {
        //_______ CONNECTED _______//
        if (!empty($_SESSION['user']['username'])) {
            //_______ USER WATCHING ANOTHER USER _______//
            if ($username != $_SESSION['user']['username']) {
                //_______ USER NOT IN A GROUP _______//
                if (empty($_SESSION['user']['group']['id'])) {
                    new AlertModel('error', 'Impossible de voir le profil de ' . $username . ', vous n\'êtes dans aucun groupe.');
                    return false;
                }
                //_______ USER NOT IN A GROUP _______//
                if (empty($_SESSION['user']['group']['code'])) {
                    new AlertModel('error', 'Impossible de voir le profil de ' . $username . ', vous n\'êtes dans aucun groupe.');
                    return false;
                }
                //_______ USER IN SAME GROUP _______//
                if (!$this->group_contain_user($username, $_SESSION['user']['group']['code'])) {
                    new AlertModel('error', 'Impossible de voir le profil de ' . $username . ', vous n\'êtes pas dans le même groupe.');
                    return false;
                }
            }
            //_______ USERNAME EMPTY _______//
            if (empty($username)) {
                new AlertModel('error', 'Aucun nom d\'utilisateur renseigné.');
                unset($_POST['username']);            
                return false;
            }
            //_______ USERNAME EXIST _______//
            if (!$this->username_exists($username)) {
                new AlertModel('error', 'Ce nom d\'utilisateur n\'existe pas.');
                unset($_POST['username']);            
                return false;
            }

            $query = "SELECT username, group_id, created, id FROM gpc_user WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } else {
            //_______ NOT CONNECTED _______//
            new AlertModel('error', 'Impossible de récupérer les données de l\'utilisateur, vous n\'êtes pas connecté.');
            return false;
        }
    }
    /*____________ GET HISTORY ____________*/
    public function get_history() {
        //_______ USER ID _______//
        $user_id = $_SESSION['user']['id'];
        unset($_SESSION['user']['history']);
        if (!empty($user_id)) {
            $stmt = $this->conn->prepare('SELECT * FROM gpc_training WHERE user_id = :user_id ORDER BY date DESC');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            //_______ NO USER ID _______//
            new AlertModel('error', 'Impossible d\'afficher l\'historique des entrainements, vous n\'êtes pas connecté.');
            return false;
        }
    }
    /*____________ GENERATE STATISTICS ____________*/
    public function generate_statistics($history) {
        $statistics = array();
        $statistics['trainings']['time'] = 0;
        $statistics['trainings']['count'] = 0;
        $statistics['trainings']['sport']['cycling'] = 0;
        $statistics['trainings']['sport']['running'] = 0;
        $statistics['trainings']['sport']['boxing'] = 0;
        $statistics['trainings']['sport']['calisthenics'] = 0;
        $statistics['trainings']['sport']['musculation'] = 0;
        $statistics['trainings']['sport']['prefered']['name'] = 0;
        $statistics['trainings']['sport']['prefered']['count'] = 0;
        $statistics['trainings']['max']['time'] = 0;
        $statistics['trainings']['average']['time'] = 0;
        $statistics['trainings']['average']['day']['count'] = 0;
        $statistics['trainings']['average']['day']['time'] = 0;
        $statistics['trainings']['average']['week']['count'] = 0;
        $statistics['trainings']['average']['week']['time'] = 0;

        foreach ($history as $training) {
            $statistics['trainings']['time'] += $training['time'];
            $statistics['trainings']['count']++;
            if ($training['time'] > $statistics['trainings']['max']['time']) {
                $statistics['trainings']['max']['time'] = $training['time'];
            }
            $statistics['trainings']['sport'][$training['sport']]++;
            if ($statistics['trainings']['sport'][$training['sport']] > $statistics['trainings']['sport']['prefered']['count']) {
                $statistics['trainings']['sport']['prefered']['count'] = $statistics['trainings']['sport'][$training['sport']];
                $statistics['trainings']['sport']['prefered']['name'] = $training['sport'];
            }
        }
        // Average
        if ($statistics['trainings']['count'] > 0) {
            $statistics['trainings']['average']['time'] = floor($statistics['trainings']['time'] / $statistics['trainings']['count']);
        }
        return $statistics;
    }
    /*____________ GET USER HISTORY ____________*/
    public function get_user_history($username) {
        //_______ USERNAME _______//
        if (!empty($username)) {
            $stmt = $this->conn->prepare('SELECT * FROM gpc_training WHERE user_id = (SELECT id FROM gpc_user WHERE username = :username) ORDER BY date DESC');
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            //_______ NO USERNAME _______//
            new AlertModel('error', 'Impossible d\'afficher l\'historique, aucun nom d\'utilisateur renseigné.');
            return false;
        }
    }
    /*____________ GENERATE GROUP CODE____________*/
    public function generate_group_code() {
        do {
            $code = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8));
            $query = "SELECT COUNT(*) FROM gpc_group WHERE code = :code";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':code', $code);
            $stmt->execute();
            $count = $stmt->fetchColumn();
        } while ($count > 0);
        return $code;
    }
    /*____________ UNSET INSTALL POSTS ____________*/
    public function unset_install_posts() {
        unset($_POST['installed']);
        unset($_POST['refused']);
        unset($_POST['web']);
    }
    
    /*
        _______________________________________________________________
    
        SESSIONS FUNCTIONS    
        
        _______________________________________________________________
    */
    /*____________ SESSION SIGN IN ____________*/
    public function session_sign_in($username) {
        $_SESSION['user']['username'] = $username;
        new AlertModel('success', 'Connexion avec succès, bienvenue ' . $_SESSION['user']['username'] . '.');
    }
    /*____________ SESSION SIGN UP ____________*/
    public function session_sign_up($username) {
        $_SESSION['user']['username'] = $username;
        new AlertModel('success', 'Inscription avec succès, bienvenue ' . $_SESSION['user']['username'] . '.');
    }
    /*____________ SESSION UPDATE USER ____________*/
    public function session_update_user($data) {
        $_SESSION['user']['created'] = $data['created'];
        $_SESSION['user']['id'] = $data['id'];
        $_SESSION['user']['group_id'] = $data['group_id'];
    }
    /*____________ SESSION ADD HISTORY ____________*/
    public function session_add_history($data) {
        $_SESSION['user']['history'] = $data;
    }
    /*____________ SESSION ADD GROUP USER HISTORY ____________*/
    public function session_add_group_user_history($data) {
        $_SESSION['user']['group']['user']['history'] = $data;
    }
    /*____________ SESSION SIGN OUT ____________*/
    public function session_sign_out() {
        unset($_SESSION['user']);
        unset($_POST['sign-out']);
        new AlertModel('success', 'Déconnexion réussie. Merci de votre visite !');
    }
    /*____________ SESSION DELETE ACCOUNT ____________*/
     public function session_delete_account() {
        $this->unset_install_posts();
        unset($_SESSION['user']);
        unset($_POST['sign-out']);
        new AlertModel('success', 'Votre compte a été supprimé avec succès. À bientôt !');
    }
    /*____________ SESSION UPDATE ATTEMPTS ____________*/
    public function session_update_attempts($data) {
        $_SESSION['attempts'] = $data;
    }
    /*____________ SESSION ADD STATISTICS ____________*/
    public function session_add_statistics($data) {
        $_SESSION['user']['statistics'] = $data;
    }
    /*____________ SESSION ADD GROUP USER STATISTICS ____________*/
    public function session_add_group_user_statistics($data) {
        $_SESSION['user']['group']['user']['statistics'] = $data;
    }
   

    /*____________ SESSION JOIN GROUP ____________*/
    public function session_join_group($data) {
        $_SESSION['user']['group']['name'] = $data['name'];
        $_SESSION['user']['group']['id'] = $data['id'];
        $_SESSION['user']['group']['code'] = $data['code'];
    }
    /*____________ SESSION ADD GROUP USERS ____________*/
    public function session_add_group_users($data) {
        $_SESSION['user']['group']['users'] = $data;
    }
    /*____________ SESSION ADD GROUP USER ____________*/
    public function session_add_group_user($data) {
        $_SESSION['user']['group']['user'] = $data;
    }
    /*____________ SESSION LEAVE GROUP ____________*/
    public function session_leave_group() {
        new AlertModel('success', 'Vous avez quitté le groupe ' . $_SESSION['user']['group']['name'] . '.');
        unset($_SESSION['user']['group']);
    }
    /*____________ SESSION WEB ____________*/
    public function session_web() {
        $_SESSION['web'] = true;
    }
    /*____________ SESSION APP ____________*/
    public function session_app() {
        $_SESSION['app'] = true;
    }
}