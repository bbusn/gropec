<?php
//____________ ALERT MODEL ____________
class AlertModel {
    private $message;
    private $type;
    public function __construct($type, $message) {
        $_SESSION['alert']['status'] = true;
        $_SESSION['alert']['type'] = $type;
        $_SESSION['alert']['message'] = $message;
    }
}