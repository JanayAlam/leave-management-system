<?php

function add_user($con, $password, $email, $first_name, $last_name, $dept, $role, $inviter_id) {
    // get hash value of the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // save to database
    $create_user_query = "insert into users (email, password, role) values ('$email', '$hashed_password', '$role')";
    mysqli_query($con, $create_user_query);
    $result = mysqli_query($con, "SELECT id FROM users WHERE email='$email'");
    $user_id = mysqli_fetch_assoc($result)['id'];
    $inviter_id = !$inviter_id ? 'NULL' : $inviter_id;
    $create_profile_query = "INSERT INTO profiles (first_name, last_name, dept, user_id, inviter_id) VALUES ('$first_name', '$last_name', '$dept', $user_id, $inviter_id);";
    mysqli_query($con, $create_profile_query);
    return true;
}
