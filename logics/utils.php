<?php

function get_user($con) {
    if ($_SESSION['user_id']) {
        $user_id = $_SESSION['user_id'];
        $result = mysqli_query($con, "SELECT * FROM users WHERE id=$user_id limit 1;");
        return mysqli_fetch_assoc($result);
    }
    
    return null;
}

function get_profile($con) {
    if ($_SESSION['profile_id']) {
        $profile_id = $_SESSION['profile_id'];
        $result = mysqli_query($con, "SELECT * FROM profiles WHERE id=$profile_id limit 1;");
        return mysqli_fetch_assoc($result);
    }
    
    return null;
}

function get_month_str($month) {
    switch ($month) {
        case 1:
            return 'January';
        case 2:
            return 'February';
        case 3:
            return 'March';
        case 4:
            return 'April';
        case 5:
            return 'May';
        case 6:
            return 'June';
        case 7:
            return 'July';
        case 8:
            return 'August';
        case 9:
            return 'September';
        case 10:
            return 'October';
        case 11:
            return 'November';
        case 12:
            return 'December';
        default:
            return '';
    }
}
