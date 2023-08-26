<?php
session_start();

include('../conn.php');
include('../auth/auth_functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $dept = $_POST['dept'];
    $profile_id = $_SESSION['profile_id'];

    $update_query = "UPDATE profiles SET first_name='$f_name', last_name='$l_name', dept='$dept' WHERE id=$profile_id;";
    $result = mysqli_query($con, $update_query);
    header('Location: ../../settings.php');
    die();
}
