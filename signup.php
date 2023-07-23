<?php
    session_start();

    include('./logics/conn.php');
    include('./logics/auth/auth_functions.php');

    if (check_signed_in($con)) {
        header('Location: index.php');
    }
    include('./logics/auth/signup_logic.php');
    $active = 'signup';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaveBoard - Sign up</title>
    <link rel="stylesheet" href="./css/auth/signup.css">
</head>
<body>
    <!-- Header -->
    <?php
        @include('./partials/header.php');
    ?>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <form method="POST">
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input
                        type="text"
                        name="firstName"
                        class="form-control"
                        id="firstName"
                    />
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input
                        type="text"
                        name="lastName"
                        class="form-control"
                        id="lastName"
                    />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        id="email"
                    />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="password"
                    />
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input
                        type="password"
                        name="confirmPassword"
                        class="form-control"
                        id="confirmPassword"
                    />
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="role" aria-label="role">
                        <option value="" disabled selected>-Select Role-</option>
                        <option value="hr">HR</option>
                        <option value="employee">Employee</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php
        @include('./partials/footer.php');
    ?>
</body>
</html>