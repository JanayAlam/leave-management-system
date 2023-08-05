<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "select * from users where email = '$email' limit 1;";
    $user_data = get_data_by_query($con, $query);
    
    if (!$user_data) {
        echo 'Invalid credentials.';
    } else {
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['user_id'] = $user_data['id'];
            header('Location: index.php');
        } else {
            echo 'Invalid credentials.';
        }
    }
}
