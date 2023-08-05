<?php

function is_valid($firstName, $lastName, $email, $password, $confirmPassword) {
    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // something was posted
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (is_valid($firstName, $lastName, $email, $password, $confirmPassword)) {
        // get hash value of the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // save to database
        $create_user_query = "insert into users (email, password, role) values ('$email', '$hashed_password', 'hr')";
        mysqli_query($con, $create_user_query);
        $result = mysqli_query($con, "SELECT id FROM users WHERE email='$email'");
        $user_id = mysqli_fetch_assoc($result)['id'];
        $create_profile_query = "insert into profiles (first_name, last_name, dept, user_id, inviter_id) values ('$firstName', '$lastName', 'hr', '$user_id', null)";
        mysqli_query($con, $create_profile_query);
        header("Location: signin.php");
        die();
    } else {
        echo "Enter valid information";
    }
}
