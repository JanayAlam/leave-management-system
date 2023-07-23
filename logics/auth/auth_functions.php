<?php
    function check_signed_in($con) {
        if (isset($_SESSION['userId'])) {
            return true;
        }
        return false;
    }

    function get_logged_user($con) {
        if (check_signed_in($con)) {
            $userId = $_SESSION['userId'];
            $query = "select * from users where userId = '$userId' limit 1;";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            } else {
                return null;
            }
        }
        // redirect to the signin page
        header('Location: signin.php');
        die;
    }
?>