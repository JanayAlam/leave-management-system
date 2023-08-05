<?php
function check_signed_in($con) {
    if (isset($_SESSION['user_id'])) {
        return true;
    }
    return false;
}

function get_data_by_query($con, $query) {
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function get_logged_user($con) {
    if (check_signed_in($con)) {
        $user_id = $_SESSION['user_id'];
        $query = "select * from users where id = '$user_id' limit 1;";
        return get_data_by_query($con, $query);
    }
    // redirect to the signin page
    header('Location: signin.php');
    die;
}
