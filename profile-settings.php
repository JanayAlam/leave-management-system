<?php
    session_start();

    include('./logics/conn.php');
    include('./logics/auth/auth_functions.php');

    if (!check_signed_in($con)) {
        header('Location: signin.php');
    }
    $page = 'account';
    $sub_page = 'profile';

    require_once './logics/settings/profile_settings_functions.php';

    $user_data = get_user($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaveBoard - Profile</title>
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
                    <h4 class="display-6"><?php echo "<span class='fw-bold'>" . $user_data['last_name'] . "</span>, " . $user_data['first_name']; ?></h4>
                    <hr class="mt-0" />
                    <div class="mt-1">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-2">Email</div>
                                <div class="col-10"><?php echo $user_data['email']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-2">Role</div>
                                <div class="col-10"><?php echo get_role($user_data['role']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-2">Approver</div>
                                <div class="col-10"><?php echo get_inviter($user_data['inviter_id'], $con); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-2">Department</div>
                                <div class="col-10"><?php echo get_dept($user_data['dept']); ?></div>
                            </div>
                            <div class="mt-2">
                                <a href="settings.php" class="btn btn-sm btn-dark px-4">Edit Information</a>
                            </div>
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