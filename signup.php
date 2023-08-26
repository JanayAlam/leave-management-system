<?php
    session_start();

    include('./logics/conn.php');
    include('./logics/auth/auth_functions.php');

    $result = mysqli_query($con, "SELECT COUNT(*) as user_count FROM users;");
    $user_count = mysqli_fetch_assoc($result)['user_count'];

    if (check_signed_in($con) || $user_count > 0) {
        header('Location: index.php');
    }
    
    include('./logics/auth/signup_logic.php');
    $active = 'signup';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>LeaveBoard - Sign up</title>
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
                                src="./img/signup-side-img.jpg"
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
                                <p class="text-muted">Create a new account</p>
                            </div>
                            <form method="POST">
                                <div class="mb-2">
                                    <label for="firstName" class="form-label"
                                        >First Name</label
                                    >
                                    <input
                                        type="text"
                                        name="firstName"
                                        class="form-control"
                                        id="firstName"
                                        placeholder="i.e. Henry"
                                    />
                                </div>
                                <div class="mb-2">
                                    <label for="lastName" class="form-label"
                                        >Last Name</label
                                    >
                                    <input
                                        type="text"
                                        name="lastName"
                                        class="form-control"
                                        id="lastName"
                                        placeholder="i.e. Cavill"
                                    />
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label"
                                        >Email address</label
                                    >
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        id="email"
                                        placeholder="i.e. henrycavill@domain.com"
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
                                        placeholder="A strong password"
                                    />
                                </div>
                                <div class="mb-2">
                                    <label
                                        for="confirmPassword"
                                        class="form-label"
                                        >Confirm Password</label
                                    >
                                    <input
                                        type="password"
                                        name="confirmPassword"
                                        class="form-control"
                                        id="confirmPassword"
                                        placeholder="Reenter the password"
                                    />
                                </div>
                                <!-- <div class="mb-2">
                                    <label for="role" class="form-label"
                                        >Role</label
                                    >
                                    <select
                                        class="form-select"
                                        name="role"
                                        aria-label="role"
                                    >
                                        <option value="" disabled selected>
                                            -Select Role-
                                        </option>
                                        <option value="hr">HR</option>
                                        <option value="employee">
                                            Employee
                                        </option>
                                    </select>
                                </div> -->
                                <div class="form-check mb-2">
                                    <input
                                        class="form-check-input"
                                        value=""
                                        type="checkbox"
                                        id="agreement"
                                        name="agreement"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="agreement"
                                    >
                                        Accept terms and conditions
                                    </label>
                                </div>
                                <div class="mb-2">
                                    <p class="text-muted">
                                        Already have an account?
                                        <a href="signin.php" class="text-dark"
                                            >Signin to your existing account!</a
                                        >
                                    </p>
                                </div>
                                <button
                                    type="submit"
                                    class="form-control btn btn-dark text-uppercase"
                                >
                                    Sign up
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
