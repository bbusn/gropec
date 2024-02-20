<?php
/*____________ ERROR CONTROLLER ____________*/
class ErrorController {
    /*____________ ERROR ____________*/
    public function error() {
        require('resources/views/errors/error.php');
    }
    /*____________ ERROR 404 ____________*/
    public function error_404() {
        require('resources/views/errors/404.php');
    }
    /*____________ ERROR 503 ____________*/
    public function error_503() {
        require('resources/views/errors/503.php');
    }
}