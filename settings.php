<?php
    session_start();

    include('./logics/conn.php');
    include('./logics/auth/auth_functions.php');

    if (!check_signed_in($con)) {
        header('Location: signin.php');
    }
    $page = 'account';
    $sub_page = 'settings';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaveBoard - Profile Settings</title>
    <style>
        .form-floating {
            margin-bottom: 0.5rem !important;
        }
        .btn-group > .btn {
            border-radius: 0 !important;
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
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <?php @include('./partials/sidebar.php'); ?>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="btn-group mt-2" role="group">
                    <a type="button" href="profile-settings.php" class="btn btn-<?php if ($sub_page=='profile') { echo 'primary'; } else { echo 'light'; } ?>">Profile</a>
                    <a type="button" href="view-balance.php" class="btn btn-<?php if ($sub_page=='balance') { echo 'primary'; } else { echo 'light'; } ?>">Balance</a>
                    <a type="button" href="settings.php" class="btn btn-<?php if ($sub_page=='settings') { echo 'primary'; } else { echo 'light'; } ?>">Settings</a>
                </div>
                <div class="mt-2">
                    <div class="card">
                        <div class="card-header">
                            Change Password
                        </div>
                        <div class="card-body">
                            <form action="./logics/settings/change_password.php" method="POST">
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" id="curr-password" name="curr-password" placeholder="Your current password">
                                    <label for="curr-password">Current password</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" id="new-password" name="new-password" placeholder="Type new password">
                                    <label for="new-password">New password</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Repeat your new password">
                                    <label for="confirm-password">Confirm password</label>
                                </div>
                                <div class="mb-2">
                                    <button class="btn btn-sm btn-dark px-3" type="submit">Change Password</button>
                                </div>
                            </form>
                        </div>
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