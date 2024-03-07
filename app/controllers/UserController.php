<?php

require_once('app/models/user/UserModel.php');

/*____________ USER CONTROLLER ____________*/
class UserController {
    private $conn, $userModel;
    public function __construct($conn) {
        $this->conn = $conn;
        $this->userModel = new UserModel($this->conn);
    }
    /*____________ USER VIEW ____________*/
    public function user_view() {
        require('app/utilities/SanitizeData.php');
        $username = sanitize_form_data($_SESSION['user']['username']);

        $data = $this->userModel->get_user($username);
        if ($data) {
            $this->userModel->session_update_user($data);
            require('resources/views/user/user.php');
        } else {
            echo 'Error';
        }
    }
    /*____________ GROUP USER VIEW ____________*/
    public function group_user_view($username) {
        $data = $this->userModel->get_user($username);
        if ($data) {
            $this->userModel->session_add_group_user($data);
            require('resources/views/group/group_user.php');
        } else {
            header('Location: ' . ROOT . 'group');
            exit();
        }
    }
    /*____________ GROUP USERS VIEW ____________*/
    public function group_users_view() {
        $data = $this->userModel->get_group_users();
        if ($data) {
            $this->userModel->session_add_group_users($data);
            require('resources/views/group/group_users.php');
        } else {
            header('Location: ' . ROOT . 'group');
            exit();
        }
    }
    /*____________ GROUP SETTINGS VIEW ____________*/
    public function group_settings_view() {
        require('resources/views/group/group_settings.php');
    }
    /*____________ GROUP USER HISTORY VIEW ____________*/
    public function group_user_history_view($username) {
        $data = $this->userModel->get_user_history($username);
        if ($data) {
            $this->userModel->session_add_group_user_history($data);
        } 
        require('resources/views/group/group_user_history.php');
    }
    /*____________ GROUP USER STATISTICS VIEW ____________*/
    public function group_user_statistics_view($username) {
        $data = $this->userModel->get_user_history($username);
        if ($data) {
            $this->userModel->session_add_group_user_history($data);
            $data = $this->userModel->generate_statistics($_SESSION['user']['group']['user']['history']);
            $this->userModel->session_add_group_user_statistics($data);
        }
        require('resources/views/group/group_user_statistics.php');
    }

    /*____________ HISTORY VIEW ____________*/
    public function history_view() {
        $data = $this->userModel->get_history();
        if ($data) {
            $this->userModel->session_add_history($data);
        }
        require('resources/views/user/history.php');
    }
    /*____________ STATISTICS VIEW ____________*/
    public function statistics_view() {
        $data = $this->userModel->get_history();
        if ($data) {
            $this->userModel->session_add_history($data);
            $data = $this->userModel->generate_statistics($_SESSION['user']['history']);
            $this->userModel->session_add_statistics($data);
        }
        require('resources/views/user/statistics.php');
    }

    /*____________ SIGN IN VIEW ____________*/
    public function sign_in_view() {
        require('resources/views/user/sign_in.php');
    }
    /*____________ SIGN IN ____________*/
    public function sign_in($username, $password) {
        $ip = $this->userModel->get_ip();
        $ban = $this->userModel->check_ban($ip);
        if ($ban == '1') {
            new AlertModel('error', 'Trop de tentatives, veuillez contacter l\'administrateur.');
            $this->sign_in_view();
        } else {
            $result = $this->userModel->sign_in($username, $password, $ip);
            if ($result) {
                $results = $this->userModel->has_auth($auth);
                if (!$results) {
                    $auth = $this->userModel->generate_auth();
                    $this->userModel->set_auth($auth, $ip, $username);
                    $this->userModel->session_set_auth($auth);
                } else {
                    $data = $this->userModel->update_auth($auth);
                    $this->userModel->delete_useless_auths($auth);
                    if ($data) {
                        $this->userModel->session_update_auth($data);
                    }
                }
                $this->userModel->remove_attempts($ip);
                $this->userModel->session_sign_in($username);
                $data = $this->userModel->get_group();
                if ($data) {
                    $this->userModel->session_join_group($data);
                } 
                header('Location: ' . ROOT . 'user');
                exit();
            } else {
                $this->sign_in_view();
            }
        }
    }
    /*____________ SIGN IN AUTH ____________*/
    public function sign_in_auth() {
        $this->userModel->started();
        $auth = $_COOKIE['gpc_auth'];
        if (empty($auth)) {
            $this->userModel->delete_auths($auth);
            new AlertModel('error', 'Votre session a expiré, veuillez vous reconnecter.');
            $this->sign_in_view();
        } else {
            $ip = $this->userModel->get_ip();
            $ban = $this->userModel->check_ban($ip);
            if ($ban == '1') {
                new AlertModel('error', 'Trop de tentatives, veuillez contacter l\'administrateur.');
                $this->sign_in_view();
            } else {
                $results = $this->userModel->has_auth($auth);
                if ($results) {
                    $username = $this->userModel->sign_in_auth($auth, $ip);
                    $data = $this->userModel->update_auth($auth);
                    if ($data) {
                        $this->userModel->session_update_auth($data);
                    }
                    if ($username) {
                        $this->userModel->remove_attempts($ip);
                        $this->userModel->session_sign_in($username);
                        $data = $this->userModel->get_group();
                        if ($data) {
                            $this->userModel->session_join_group($data);
                        } 
                        header('Location: ' . ROOT . 'user');
                        exit();
                    } else {
                        $this->userModel->delete_auths($auth);
                        new AlertModel('error', 'Votre session a expiré, veuillez vous reconnecter.');
                        $this->sign_in_view();
                    }
                } else {
                    $this->userModel->delete_auths($auth);
                    new AlertModel('error', 'Votre session a expiré, veuillez vous reconnecter.');
                    $this->sign_in_view();
                }
            }
        }
        
    }

    /*____________ SIGN UP VIEW ____________*/
    public function sign_up_view() {
        new AlertModel('success', 'Inscription temporairement désactivée.');
        require('resources/views/user/sign_up_temp.php');
    }
    /*____________ SIGN UP ____________*/
    public function sign_up($username, $password, $passwordConfirm) {
        $result = $this->userModel->sign_up($username, $password, $passwordConfirm);
        if ($result) {
            $this->userModel->session_sign_up($username);
            header('Location: ' . ROOT . 'user');
            exit();
        } else {
            $this->sign_up_view();
        }
    }
    /*____________ SIGN OUT ____________*/
    public function sign_out() {
        $user_id = $_SESSION['user']['user_id'];
        if ($user_id) {
            $this->userModel->delete_auths($user_id);
        } else {
            $user_id = $this->userModel->get_user_id($_SESSION['user']['username']);
            $this->userModel->delete_auths($user_id);
        }
        $this->userModel->session_sign_out();
        if (isset($_SESSION['app']) || isset($_SESSION['web'])) {
            header('Location: ' . ROOT . 'user/sign-in');
            exit();
        } else {
            header('Location: ' . ROOT);
            exit();
        }
    }
    /*____________ MODIFY ACCOUNT VIEW ____________*/
     public function modify_password_view() {
        require('resources/views/user/password.php');
    }
    /*____________ MODIFY PASSWORD ____________*/
    public function modify_password($oldPassword, $password, $passwordConfirm) {
        $result = $this->userModel->modify_password($oldPassword, $password, $passwordConfirm);
        if ($result) {
            new AlertModel('success', 'Votre mot de passe a été modifié avec succès.');
            header('Location: ' . ROOT . 'user/settings');
            exit();
        } else {
            header('Location: ' . ROOT . 'user/settings/password');
            exit();
        }
    }
    /*____________ DELETE ACCOUNT ____________*/
    public function delete_account() {
        $data = $this->userModel->delete_account();
        if ($data) {
            $this->userModel->session_delete_account();
            header('Location: ' . ROOT . 'user/sign-in');
            exit();
        } else {
            header('Location: ' . ROOT . 'user/settings');
            exit();
        }
    }
    /*____________ DELETE TRAINING ____________*/
    public function delete_training($id) {
        $result = $this->userModel->delete_training($id);
        if ($result) {
            new AlertModel('success', 'Entraînement supprimé avec succès.');
            header('Location: ' . ROOT . 'user');
            exit();
        } else {
            header('Location: ' . ROOT . 'user');
            exit();
        }
    }

    /*____________ GROUP VIEW ____________*/
    public function group_view() {
        if (isset($_SESSION['user']['group'])) {
            $data = $this->userModel->get_group_users();
            if ($data) {
                $this->userModel->session_add_group_users($data);
            }
            $results = $this->userModel->get_group_today_trainings();
            $this->userModel->session_add_group_today_trainings($results);
        }
        require('resources/views/group/group.php');
    }
    /*____________ JOIN GROUP ____________*/
    public function join_group($code) {
        $result = $this->userModel->join_group($code);
        if ($result) {
            $data = $this->userModel->get_group();
            if ($data) {
                $this->userModel->session_join_group($data);
                new AlertModel('success', 'Vous avez rejoint le groupe ' . $_SESSION['user']['group']['name'] . '.');
                unset($_POST['join-group']);
                header('Location: ' . ROOT . 'group');
                exit();
            } else {
                new AlertModel('error', 'Impossible de rejoindre le groupe, veuillez réessayer.');
                unset($_POST['join-group']);
                header('Location: ' . ROOT . 'group');
                exit();
            }
        } else {
            unset($_POST['join-group']);
            header('Location: ' . ROOT . 'group');
            exit();
        }
    }
    /*____________ SETTINGS VIEW ____________*/
    public function settings_view() {
        require('resources/views/user/settings.php');
    }
    /*____________ CREATE GROUP VIEW ____________*/
    public function create_group_view() {
        require('resources/views/group/create_group.php');
    }
     /*____________ CREATE GROUP ____________*/
     public function create_group($name) {
        $code = $this->userModel->generate_group_code();
        if ($code) {
            $result = $this->userModel->create_group($code, $name);
            if ($result) {
                $this->join_group($code);
            } else {
                header('Location: ' . ROOT . 'group/create');
                exit();
            }
        } else {
            header('Location: ' . ROOT . 'group/create');
            exit();
        }
    }
    /*____________ LEAVE GROUP ____________*/
    public function leave_group() {
        $result = $this->userModel->leave_group();
        if ($result) {
            $this->userModel->session_leave_group();
            header('Location: ' . ROOT . 'group');
            exit();
        } else {
            header('Location: ' . ROOT . 'group');
            exit();
        }
    }
    /*____________ START VIEW ____________*/
    public function start_view() {
        require('resources/views/user/start.php');
    }
    /*____________ STARTED ____________*/
    public function started() {
        $this->userModel->started();
        header('Location: ' . ROOT . 'user/sign-in');
        exit();
    }
    /*____________ PRIVACY ____________*/
    public function privacy_view() {
        require('resources/views/user/privacy.php');
    }
    /*____________ TERMS ____________*/
    public function terms_view() {
        require('resources/views/user/terms.php');
    }
}