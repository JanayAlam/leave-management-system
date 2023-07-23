<?php
    session_start();

    include('./logics/conn.php');
    include('./logics/auth/auth_functions.php');

    if (check_signed_in($con)) {
        header('Location: index.php');
    }
    include('./logics/auth/signin_logic.php');
    $active = 'signin';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>LeaveBoard - Sign in</title>
        <link rel="stylesheet" href="./css/auth/signin.css" />
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
                        <label for="email" class="form-label"
                            >Email address</label
                        >
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            id="email"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"
                            >Password</label
                        >
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            id="password"
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <?php
            @include('./partials/footer.php');
        ?>
    </body>
</html>
