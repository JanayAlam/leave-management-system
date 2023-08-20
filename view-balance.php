<?php
    session_start();

    include('./logics/conn.php');
    include('./logics/auth/auth_functions.php');

    if (!check_signed_in($con)) {
        header('Location: signin.php');
    }
    $page = 'account';
    $sub_page = 'balance';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaveBoard - Profile Balance</title>
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
                    <div class="card card-body">
                        <?php foreach (['july', 'auguest'] as $month) { ?>
                            <table class="table">
                                <h4 style="text-transform: uppercase;" class="mt-2"><?php echo $month; ?></h4>
                                <thead>
                                    <tr class="table-light fw-bold">
                                        <th scope="col">Balance</th>
                                        <th scope="col" class="text-center">Used</th>
                                        <th scope="col" class="text-center">Available</th>
                                        <th scope="col" class="text-center">Allowance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="fw-bold">Vacation</th>
                                        <td class="text-center">0</td>
                                        <td class="text-center">10</td>
                                        <td class="text-center">10</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="fw-bold">Sick</th>
                                        <td class="text-center">10</td>
                                        <td class="text-center">60</td>
                                        <td class="text-center">365</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="fw-bold">Unpaid</th>
                                        <td class="text-center">10</td>
                                        <td class="text-center">60</td>
                                        <td class="text-center">365</td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
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