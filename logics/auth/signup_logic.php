<?php
    function is_valid($firstName, $lastName, $email, $password, $confirmPassword, $role) {
        return true;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // something was posted
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $role = $_POST['role'];

        if (is_valid($firstName, $lastName, $email, $password, $confirmPassword, $role)) {
            // get hash value of the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // save to database
            $query = "insert into users (firstName, lastName, email, password, role) values ('$firstName', '$lastName', '$email', '$hashed_password', '$role')";
            mysqli_query($con, $query);
            header("Location: signin.php");
            die();
        } else {
            echo "Enter valid information";
        }
    }
?>