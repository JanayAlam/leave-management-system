<?php
    function check_signed_in($con) {
        if (isset($_SESSION['userId'])) {
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
            $userId = $_SESSION['userId'];
            $query = "select * from users where userId = '$userId' limit 1;";
            return get_data_by_query($con, $query);
        }
        // redirect to the signin page
        header('Location: signin.php');
        die;
    }
?>