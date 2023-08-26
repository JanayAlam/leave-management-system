<?php
session_start();
require_once "../conn.php";

$leaves_id = $_GET['lid'];
$applier_id = $_GET['pid'];
$profile_id = $_SESSION['profile_id'];

if ($leaves_id && $applier_id) {
    $query = "UPDATE leaves SET approver_id=$profile_id WHERE id=$leaves_id;";
    
    if (mysqli_query($con, $query)) {
        $notification_query = "INSERT INTO notifications (text, profile_id) VALUES ('Your leave application has been accepted', $applier_id)";
        mysqli_query($con, $notification_query);
    }
}

header("Location: ../../leaves_to_approve.php");
