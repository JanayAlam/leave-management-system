<?php
    session_start();

    require_once './logics/conn.php';
    require_once './logics/auth/auth_functions.php';
    require_once './logics/utils.php';

    if (!check_signed_in($con)) {
        header('Location: signin.php');
    }

    $active = 'homepage';
    
    require_once './logics/current_profiles_status.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaveBoard - Homepage</title>
    <style>
        .form-floating {
            margin-bottom: 0.5rem !important;
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
                <?php $page='dashboard'; @include('./partials/sidebar.php'); ?>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div>
                    <h1 class="display-3">Welcome to Leave Board</h1>
                    <h6 class="text-muted">We have assembled some links to get you started.</h6>
                    <hr class="mt-0" />
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-12 mb-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 fw-bold">Book time off</div>
                                    <div><i class="fa-regular fa-clock"></i></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="./logics/book_leave.php">
                                    <div class="form-floating">
                                        <select class="form-select" id="leave-type" name="leave-type">
                                            <option selected disabled>Select leave type</option>
                                            <option value="vacation">Vacation Leave</option>
                                            <option value="sick">Sick Leave</option>
                                            <option value="unpaid">Unpaid Leave</option>
                                        </select>
                                        <label for="leave-type">Leave type</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="leave-duration" name="leave-duration" placeholder="i.e. 10" />
                                        <label for="leave-duration">Leave duration</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="leave-date" name="leave-date" placeholder="i.e. 10" />
                                        <label for="leave-date">Date</label>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" name="comments" id="comments" style="height: 100px"></textarea>
                                        <label for="comments">Comment...</label>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit">Book time off</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 mb-2">
                        <div class="fw-bold"><?php echo get_month_str($month_num) . ', ' . date('Y'); ?></div>
                        <table class="table">
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
                                    <td class="text-center"><?php echo $vac_leave_count; ?></td>
                                    <td class="text-center"><?php echo 10-$vac_leave_count; ?></td>
                                    <td class="text-center">10</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fw-bold">Sick</th>
                                    <td class="text-center"><?php echo $sick_leave_count; ?></td>
                                    <td class="text-center"><?php echo 60-$sick_leave_count; ?></td>
                                    <td class="text-center">60</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fw-bold">Unpaid</th>
                                    <td class="text-center"><?php echo $unpaid_leave_count; ?></td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">365</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <hr class="mt-0"/>
                    <h4 class="display-6 text-center">Leave Calendar</h4>
                    <div class="fw-bold text-center"><?php echo get_month_str($month_num) . ', ' . date('Y'); ?></div>
                    <table class="table">
                        <thead>
                            <?php
                                for ($i=1; $i<=31; $i++) {
                                    echo "<th class='fw-lighter'>" . $i . "</th>";
                                }
                            ?>
                        </thead>
                        <tbody>
                            <?php
                                for ($i=1; $i<=31; $i++) {
                                    if ($arr[$i] == 0) {
                                        echo "<td class='bg-light fw-lighter'></td>";
                                    } else {
                                        echo "<td class='bg-danger fw-lighter'></td>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
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