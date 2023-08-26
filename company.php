<?php
    session_start();

    include('./logics/conn.php');
    include('./logics/auth/auth_functions.php');

    if (!check_signed_in($con)) {
        header('Location: signin.php');
    }
    $page = 'company';

    require_once './logics/settings/profile_settings_functions.php';
    require_once './logics/add_user.php';

    $select_query = "SELECT u.email as email, u.role as role, p.first_name as first_name, p.last_name as last_name, p.dept as dept FROM users u, profiles p WHERE u.id = p.user_id;";

    $all_users_result = mysqli_query($con, $select_query);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $inviter_id = $_SESSION['user_id'];
        $email = $_POST['email'];
        $dept = $_POST['dept'];
        $result = add_user($con, '1234', $email, 'Employee', 'Account', $dept, 'employee', $inviter_id);
        if ($result) {
            header('Location: company.php');
        }
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
                    <button type="button" class="btn btn-primary px-4 btn-sm" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                        Invite People
                    </button>
                </div>
                <div class="mt-2">
                    <table class="table">
                        <thead>
                            <tr class="table-primary fw-bold">
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Department</th>
                                <th scope="col">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = mysqli_fetch_assoc($all_users_result)) {
                                    echo "<tr>";
                                    $first_name = $row["first_name"];
                                    $last_name = $row["last_name"];
                                    $email = $row["email"];
                                    $dept = get_dept($row["dept"]);
                                    $role = $row["role"];
                                    echo "<td>$first_name</td>";
                                    echo "<td>$last_name</td>";
                                    echo "<td>$email</td>";
                                    echo "<td>$dept</td>";
                                    echo "<td class='text-uppercase'>$role</td>";
                                    echo "<tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="addEmployeeModal">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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