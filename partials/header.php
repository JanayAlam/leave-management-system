<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- START: Reset Styles -->
        <link rel="stylesheet" href="./css/reset.css" />
        <!-- END: Reset Styles -->

        <!-- START: Libraries -->
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css" />
        <script
            src="https://kit.fontawesome.com/27c89bbf6c.js"
            crossorigin="anonymous"
        ></script>
        <!-- END: Libraries -->

        <!-- START: Global Styles -->
        <link rel="stylesheet" href="./css/style.css" />
        <!-- END: Global Styles -->

        <!-- START: Local Styles -->
        <link rel="stylesheet" href="./css/partials/header.css" />
        <!-- END: Local Styles -->
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">Leave Management</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <!-- <a class="nav-link" aria-current="page" href="index.php"
                            >Home</a
                        >
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Pricing</a> -->
                    </div>
                    <div class="d-flex auth-nav-links">
                        <?php  if (!check_signed_in($con)) { ?>
                            <a href="signin.php" class="btn btn-sm <?php if ($active && $active=='signin') { echo 'btn-dark'; } ?>">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    <span class="ms-2">Sign in</span>
                                </div>
                            </a>
                            <a href="signup.php" class="btn btn-sm <?php if ($active && $active=='signup') { echo 'btn-dark'; } ?>">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-user-plus"></i>
                                    <span class="ms-2">Create an account</span>
                                </div>
                            </a>
                        <?php } else { ?>
                            <a href="logout.php" class="btn btn-sm btn-outline-dark">
                                Logout
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </body>
</html>
