<?php

/*____________ CONSTS ____________*/
define('ROOT', '/gropec/');
// define('ROOT', '/');
define('ROOT_SEGMENTS', '4');
// define('ROOT_SEGMENTS', '3');
define('VERSION', '0.6');
define('AUTHOR_URL', 'https://benoitbusnardo.fr');
define('V_QUERY', '?v='.VERSION);
/*____________ SESSION ____________*/
ini_set('session.cookie_lifetime', 365 * 24 * 60 * 60);
if (!isset($_SESSION)) {
    session_start();
}

/*____________ MODELS ____________*/
require('app/models/AlertModel.php');
require('app/models/Database.php');

/*____________ CONTROLLERS ____________*/
require('app/controllers/HomeController.php');
require('app/controllers/UserController.php');
require('app/controllers/ErrorController.php');

$homeController = new HomeController();
$userController = new UserController($conn);
$errorController = new ErrorController();


/*________________________________________*/
/*           ROUTES                       */
/*________________________________________*/
try {
    /*________________________________________*/
    /*                 SIGN OUT               */
    /*________________________________________*/
    if (isset($_SESSION['user'])) {
        if (isset($_POST['sign-out'])) {
            $userController->sign_out();
        }
    }
    /*________________________________________*/
    /*                 URLS SPECIFICS         */
    /*________________________________________*/
    if (isset($_GET['url'])) {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $urlSegments = explode('/', $url);
    
        $subname = isset($urlSegments[0]) ? $urlSegments[0] : '';        
        $route = implode('/', array_slice($urlSegments, 1));
        /*________________________________________*/
        /*  USER LAUNCHED APP OR WEB */
        /*________________________________________*/
        if (isset($_SESSION['app']) || isset($_SESSION['web'])) {
            /*________________________________________*/
            /*                 USER                   */
            /*________________________________________*/
            if ($subname == 'user') {
                /*________________ SIGN UP ________________*/
                if ($route == 'sign-up') {
                    if (!isset($_SESSION['user'])) {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            require('app/utilities/SanitizeData.php');
        
                            $username = sanitize_form_data($_POST['username']);
                            $password = sanitize_form_data($_POST['password']);
                            $passwordConfirm = sanitize_form_data($_POST['password-confirm']);
        
                            $userController->sign_up($username, $password, $passwordConfirm);  
                        } else {
                            $userController->sign_up_view();
                        }
                    } else {
                        new AlertModel('error', 'Impossible de s\'inscrire car vous êtes déjà connecté, ' . $_SESSION['user']['username'] . '.');
                        header('Location: ' . ROOT . 'user');
                        exit();
                    } 
                /*________________ SIGN IN ________________*/
                } elseif ($route == 'sign-in') {
                    if (!isset($_SESSION['user'])) {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (isset($_POST['back-install'])) {
                                if (!isset($_SESSION['app'])) {
                                    unset($_SESSION['web']);
                                    unset($_SESSION['user']);
                                    header('Location: ' . ROOT);
                                    exit();
                                }
                            } else {
                                require('app/utilities/SanitizeData.php');
        
                                $username = sanitize_form_data($_POST['username']);
                                $password = sanitize_form_data($_POST['password']);
            
                                $userController->sign_in($username, $password);    
                            }
                        } else {
                            $userController->sign_in_view();
                        }
                    } else {
                        new AlertModel('error', 'Vous êtes déjà connecté, ' . $_SESSION['user']['username'] . '.');
                        header('Location: ' . ROOT . 'user');
                        exit();
                    }
                /*________________ SIGN OUT ________________*/
                } elseif ($route == 'sign-out') {
                    if (isset($_SESSION['user'])) {
                        $userController->sign_out();
                    } else {
                        new AlertModel('error', 'Vous n\'êtes pas connecté.');
                        header('Location: ' . ROOT . 'user');
                        exit();
                    }
                /*________________ USER PAGE ________________*/
                } elseif ($route == '') {
                    if (isset($_SESSION['user'])) {
                        $userController->user_view();
                    } else {
                        if (!isset($_SESSION['app']) && !isset($_SESSION['web'])) {
                            new AlertModel('error', 'Vous n\'êtes pas connecté, connectez vous pour utiliser l\'application.');
                        }
                        header('Location: ' . ROOT . 'user/sign-in');
                        exit();
                    }
                /*________________ USER ERROR 404 ________________*/
                } else {
                    new AlertModel('error', 'La page demandée n\'existe pas.');
                    $errorController->error_404();
                }

            /*________________________________________*/
            /*                 HOME                   */
            /*________________________________________*/
            } elseif ($subname == 'home') {
                /*________________ HOME PAGE ________________*/
                if ($route == '') {
                    if (isset($_SESSION['user'])) {
                        new AlertModel('error', 'La page demandée n\'est pas encore disponible.');
                        $errorController->error_503();
                    } else {
                        new AlertModel('error', 'Vous n\'êtes pas connecté, connectez vous pour utiliser l\'application.');
                        header('Location: ' . ROOT . 'user/sign-in');
                        exit();
                    }
                /*________________ HOME ERROR 404 ________________*/
                } else {
                    new AlertModel('error', 'La page demandée n\'existe pas.');
                    $errorController->error_404();
                }
            /*________________________________________*/
            /*                 GROUP                  */
            /*________________________________________*/
            } elseif ($subname == 'group') {
                /*________________ GROUP PAGE ________________*/
                if ($route == '') {
                    echo '<script>console.log("group")</script>';
                    /*________________ IF POST ________________*/
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        /*________________ IF POST JOIN GROUP ________________*/
                        if (isset($_POST['join-group'])) {
                            /*________________ IF HAS GROUP ________________*/
                            if (isset($_SESSION['user']['group']) && !empty($_SESSION['user']['group'])) {
                                new AlertModel('error', 'Vous êtes déjà dans un groupe, quittez le pour en rejoindre un autre.');
                                header('Location: ' . ROOT . 'group');
                                exit();
                            /*________________ NO GROUP ________________*/
                            } else {
                                require('app/utilities/SanitizeData.php');
                                $code = sanitize_form_data($_POST['code']);
                                $userController->join_group($code);
                            }
                        /*________________ IF POST LEAVE GROUP ________________*/
                        } else if (isset($_POST['leave-group'])) {
                            if (isset($_SESSION['user']['group']) && !empty($_SESSION['user']['group'])) {
                                $userController->leave_group();
                            /*________________ NO GROUP ________________*/
                            } else {
                                new AlertModel('error', 'Vous n\'êtes pas dans un groupe.');
                                header('Location: ' . ROOT . 'group');
                                exit();
                            }
                        }
                    /*________________ NO POST ________________*/
                    } else {
                        /*________________ IF CONNECTED ________________*/
                        if (isset($_SESSION['user'])) {
                            $userController->group_view();
                        /*________________ NOT CONNECTED ________________*/
                        } else {
                            new AlertModel('error', 'Vous n\'êtes pas connecté, connectez vous pour utiliser l\'application.');
                            header('Location: ' . ROOT . 'user/sign-in');
                            exit();
                        }
                    }
                /*________________ CREATE GROUP ________________*/
                } else if ($route == 'create') {
                    /*________________ IF CONNECTED ________________*/
                    if (isset($_SESSION['user'])) {
                        /*________________ IF POST ________________*/
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            /*________________ IF NO GROUP ________________*/
                            if (!isset($_SESSION['user']['group'])) {
                                /*________________ IF CREATE GROUP ________________*/
                                if (isset($_POST['create-group'])) {
                                    require('app/utilities/SanitizeData.php');
                                    $name = sanitize_form_data($_POST['name']);
                                    $userController->create_group($name);
                                /*________________ NO CREATE GROUP ________________*/
                                } else {
                                    /*________________ GET VIEW ________________*/
                                    $userController->create_group_view();
                                }
                            /*________________ HAS GROUP ________________*/
                            } else {
                                new AlertModel('error', 'Impossible de créer un groupe tant que vous ne quittez pas le vôtre, ' . $_SESSION['user']['group']['name'] . '.');
                                header('Location: ' . ROOT);
                                exit();
                            }
                        /*________________ NO POST ________________*/
                        } else {
                            /*________________ GET VIEW ________________*/
                            $userController->create_group_view();
                        }
                    } else {
                        new AlertModel('error', 'Vous n\'êtes pas connecté, connectez vous pour créer un groupe.');
                        header('Location: ' . ROOT . 'sign-in');
                        exit();
                    }
                    
                /*________________ GROUP USERS AND ERROR 404 ________________*/
                } else {
                    $usernamePattern = '/^user\/(?<username>[a-zA-Z0-9_]+)$/';
                    if (preg_match($usernamePattern, $route, $matches)) {
                        $username = $matches['username'];
                        $userController->group_user_view($username);
                    } else {
                        new AlertModel('error', 'La page demandée n\'existe pas.');
                        $errorController->error_404();
                    }
                }
            /*________________________________________*/
            /*                 ADD                    */
            /*________________________________________*/
            } elseif ($subname == 'add') {
                /*________________ ADD PAGE ________________*/
                if ($route == '') {
                if (isset($_SESSION['user'])) {
                    new AlertModel('error', 'La page demandée n\'est pas encore disponible.');
                    $errorController->error_503();
                } else {
                    new AlertModel('error', 'Vous n\'êtes pas connecté, connectez vous pour utiliser l\'application.');
                    header('Location: ' . ROOT . 'user/sign-in');
                    exit();
                }
                /*________________ ADD ERROR 404 ________________*/
                } else {
                    new AlertModel('error', 'La page demandée n\'existe pas.');
                    $errorController->error_404();
                }
            /*________________________________________*/
            /*                 ERROR 404              */
            /*________________________________________*/
            } else {
                new AlertModel('error', 'La page demandée n\'existe pas.');
                $errorController->error_404();
            }
        /*________________________________________*/
        /*  USER DID NOT LAUNCHED   */
        /*________________________________________*/
        } else {
            if ($subname == 'terms') {
                if ($route == '') {
                    $userController->terms_view();
                } else {
                    header('Location: ' . ROOT);
                    exit();
                }
            } elseif ($subname == 'privacy') {
                if ($route == '') {
                    $userController->privacy_view();
                } else {
                    header('Location: ' . ROOT);
                    exit();
                }
            } else {
                header('Location: ' . ROOT);
                exit();
            }
        }
    } else {
        /*________________________________________*/
        /*  NO URL SET  */
        /*________________________________________*/
        if (!isset($_SESSION['app']) && !isset($_SESSION['web'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                new AlertModel('success', 'Bienvenue sur Gropec, commencez par installer l\'application !');
                $userController->install_view();
            /*________________ POST ________________*/
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                /*________________ INSTALLED ________________*/
                if (isset($_POST['installed'])) {
                    $userController->installed();
                /*________________ REFUSED ________________*/
                } elseif (isset($_POST['refused'])) {
                    $userController->refused();      
                /*________________ WEB ________________*/
                } elseif (isset($_POST['web'])) {
                    $userController->web();
                }
            }
        } else {
            new AlertModel('error', 'Vous êtes déjà sur l\'application.');
            header('Location: ' . ROOT . 'user');
            exit();
        }
    }
/*________________________________________*/
/*                 ERRORS            */
/*________________________________________*/
} catch (Exception $e) {
    new AlertModel('error', $e->getMessage());
    $errorController->error();
}