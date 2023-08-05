<?php
session_start();

include('../conn.php');
include('../auth/auth_functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cur_pass = $_POST['curr-password'];
    $new_pass = $_POST['new-password'];
    $confirm_pass = $_POST['confirm-password'];
    $user_id = $_SESSION['user_id'];

    $select_query = "SELECT * FROM users WHERE id=$user_id limit 1";
    $result = mysqli_query($con, $select_query);
    $user_data = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (password_verify($cur_pass, $user_data['password'])) {
        if ($new_pass && $new_pass == $confirm_pass) {
            $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET password='$hashed_password' WHERE id=$user_id;";
            $result = mysqli_query($con, $update_query);
            header('Location: ../../settings.php');
            die();
        }
        $msg = 'New password and confirm password did not matched.';
        header('Location: ../../settings.php');
        die();
    } else {
        $msg = 'Current password did not matched.';
        header('Location: ../../settings.php');
        die();
    }
}
