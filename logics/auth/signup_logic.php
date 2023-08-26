<?php

function is_valid($firstName, $lastName, $email, $password, $confirmPassword) {
    return true;
}

require_once './logics/add_user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // something was posted
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (is_valid($firstName, $lastName, $email, $password, $confirmPassword)) {
        $result = add_user($con, $password, $email, $firstName, $lastName, 'hr', 'hr', NULL);
        if ($result) {
            header("Location: signin.php");
            die();
        }
    } else {
        echo "Enter valid information";
    }
}
