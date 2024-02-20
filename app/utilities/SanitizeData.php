<?php 

//____________ SANITIZE FORM DATA ____________
function sanitize_form_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}