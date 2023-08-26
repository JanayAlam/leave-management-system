<?php
    session_start();

    require_once './logics/conn.php';
    require_once './logics/auth/auth_functions.php';
    require_once './logics/utils.php';

    if (!check_signed_in($con)) {
        header('Location: signin.php');
    }
    
    require_once './logics/current_profiles_status.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>LeaveBoard - Calender</title>
        <style>
            .form-floating {
                margin-bottom: 0.5rem !important;
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <?php
        require_once './partials/header.php';
    ?>

        <!-- Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <?php $page='calender'; require_once './partials/sidebar.php'; ?>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="fw-bold display-6 mt-2"><?php echo get_month_str($month_num) . ', ' . date('Y'); ?></div>
                    <div class="d-flex flex-wrap mt-2">
                        <?php for ($i=1; $i<=31; $i++) { ?>
                            <div
                                style="min-width: 130px; min-height: 130px; background: <?php 
                                    if ($arr[$i] != 0) {
                                        echo 'crimson';
                                    }
                                    elseif ($i%2==0) {
                                        echo '#F8F8F8';
                                    } else {
                                        echo '#FFF';
                                    }
                                ?>"
                                class="d-flex align-items-center justify-content-center"
                            >
                                <div class="text-center">
                                    <div class="display-6 <?php if ($arr[$i] != 0) { echo 'text-light'; } ?>"><?php echo $i; ?></div>
                                    <?php if ($arr[$i] != 0) { ?>
                                        <p class="text-capitalize text-light"><?php echo $arr[$i] . ' Leave'; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php
        require_once './partials/footer.php';
    ?>
    </body>
</html>
