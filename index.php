<?php
    session_start();

    include('./logics/conn.php');
    include('./logics/auth/auth_functions.php');

    if (!check_signed_in($con)) {
        header('Location: signin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaveBoard - Homepage</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <!-- Header -->
    <?php
        @include('./partials/header.php');
    ?>

    <!-- Content -->
    <div class="container">
        Homepage
    </div>

    <!-- Footer -->
    <?php
        @include('./partials/footer.php');
    ?>
</body>
</html>