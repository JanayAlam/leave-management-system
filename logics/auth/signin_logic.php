<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE email = '$email' limit 1;";
    $user_data = get_data_by_query($con, $query);
    
    if (!$user_data) {
        echo 'Invalid credentials.';
    } else {
        if (password_verify($password, $user_data['password'])) {
            $user_id = $user_data['id'];
            $_SESSION['user_id'] = $user_id;
            $profile_query = "SELECT id FROM profiles WHERE user_id='$user_id' limit 1;";
            $profile_data = get_data_by_query($con, $profile_query);
            $_SESSION['profile_id'] = $profile_data['id'];
            header('Location: index.php');
        } else {
            echo 'Invalid credentials.';
        }
    }
}
