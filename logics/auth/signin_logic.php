<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "select * from users where email = '$email' limit 1;";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            $_SESSION['userId'] = $user_data['userId'];
            // header('Location: index.php');
        } else {
            return null;
        }
    }
?>