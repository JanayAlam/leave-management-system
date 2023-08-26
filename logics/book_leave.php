<?php
session_start();
require_once './conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $profile_id = $_SESSION['profile_id'];
    if (!$profile_id) {
        header('Location: ../index.php');
    } else {
        $leave_type = $_POST['leave-type'];
        $leave_date = $_POST['leave-date'];
        $leave_duration = $_POST['leave-duration'];
        $comments = $_POST['comments'];

        $query = "INSERT INTO leaves (leave_type, leave_date, duration, comments, applier_id) VALUES ('$leave_type', '$leave_date', '$leave_duration', '$comments', $profile_id);";
        $result = mysqli_query($con, $query);
        header('Location: ../index.php');
    }
}
