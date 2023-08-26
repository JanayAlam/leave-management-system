<?php
require_once "../conn.php";

$leaves_id = $_GET['lid'];
$applier_id = $_GET['pid'];

if ($leaves_id && $applier_id) {
    $query = "DELETE FROM leaves WHERE id=$leaves_id;";
    
    if (mysqli_query($con, $query)) {
        $notification_query = "INSERT INTO notifications (text, profile_id) VALUES ('Your leave application has been rejected', $applier_id)";
        mysqli_query($con, $notification_query);
    }
}

header("Location: ../../leaves_to_approve.php");
