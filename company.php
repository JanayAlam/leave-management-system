<?php
    session_start();

    include('./logics/conn.php');
    include('./logics/auth/auth_functions.php');

    if (!check_signed_in($con)) {
        header('Location: signin.php');
    }
    $page = 'company';

    require_once './logics/settings/profile_settings_functions.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $inviter_id = $_SESSION['user_id'];
        $email = $_POST['email'];
        $dept = $_POST['dept'];
        
        $query = "INSERT INTO users"; // TODO
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>LeaveBoard - Company</title>
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
                    <div class="mt-2">
                        <h3 class="display-6">Add new employee</h3>
                        <button
                            type="button"
                            class="btn btn-primary px-4 btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#addEmployeeModal"
                        >
                            Invite People
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" id="addEmployeeModal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <form action="company.php" method="POST">
                        <div class="modal-body">
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="email" name="email" placeholder="i.e. henrycavill@domain.com">
                                <label for="email">Email Address</label>
                            </div>
                            <div class="form-floating mb-2">
                                <select class="form-select" id="dept" name="dept" aria-label="Department selection">
                                    <option disabled value="">Open this select menu</option>
                                    <?php
                                        $options = array(
                                            'hr', 'business','sales_and_marketing','development','test','customer_support'
                                        );
                                        foreach ($options as $option) {
                                            echo "<option value='$option'>" . get_dept($option) . "</option>";
                                        }
                                    ?>
                                </select>
                                <label for="dept">Department</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Close
                            </button>
                            <button class="btn btn-primary" type="submit">
                                Create Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php
        @include('./partials/footer.php');
    ?>
    </body>
</html>
