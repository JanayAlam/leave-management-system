<?php
session_start();

include('../conn.php');
include('../auth/auth_functions.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $user_id = $_SESSION['user_id'];

    $update_query = "UPDATE users SET email='$email' WHERE id=$user_id;";
    $result = mysqli_query($con, $update_query);
    header('Location: ../../settings.php');
    die();
}
