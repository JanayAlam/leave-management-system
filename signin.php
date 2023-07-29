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
        <style>
            .form-label {
                margin-bottom: 0rem !important;
            }
            @media (max-width: 768px) {
                .side-img-display-hide {
                    display: none !important;
                }
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <?php
            @include('./partials/header.php');
        ?>

        <!-- Content -->
        <div class="container">
            <div class="card card-body mt-5">
                <div class="row">
                    <div class="col-md-6 col-sm-12 side-img-display-hide">
                        <div
                            class="d-flex justify-content-center align-items-center"
                        >
                            <img
                                src="./img/signin-side-img.jpg"
                                alt="Login page side photo"
                                class="w-100"
                            />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="d-flex flex-column">
                            <div class="align-items-center text-center">
                                <img
                                    src="./img/logo.png"
                                    alt="Logo"
                                    width="120px"
                                    class="mt-2 mb-5"
                                />
                            </div>
                            <div>
                                <h2
                                    class="fw-bold mb-0"
                                    style="font-size: 1.2rem"
                                >
                                    Online Leave Management System
                                </h2>
                                <p class="text-muted">Signin to your account</p>
                            </div>
                            <form method="POST">
                                <div class="mb-2">
                                    <label for="email" class="form-label"
                                        >Email address</label
                                    >
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        id="email"
                                        placeholder="i.e. example@domain.com"
                                    />
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label"
                                        >Password</label
                                    >
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        id="password"
                                        placeholder="Your secret password"
                                    />
                                </div>
                                <div class="form-check mb-2">
                                    <input
                                        class="form-check-input"
                                        value=""
                                        type="checkbox"
                                        id="remember-me"
                                        name="remember-me"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="remember-me"
                                    >
                                        Remember me
                                    </label>
                                </div>
                                <div class="mb-2">
                                    <p class="text-muted">
                                        Don't have any account?
                                        <a href="signup.php" class="text-dark"
                                            >Create a new one!</a
                                        >
                                    </p>
                                </div>
                                <button
                                    type="submit"
                                    class="form-control btn btn-dark text-uppercase"
                                >
                                    Sign in
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php
            @include('./partials/footer.php');
        ?>
    </body>
</html>
