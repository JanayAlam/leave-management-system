<?php
    session_start();

    require_once './logics/conn.php';
    require_once './logics/auth/auth_functions.php';

    if (!check_signed_in($con)) {
        header('Location: signin.php');
    }
    $page = 'leaves-to-approve';

    $query = "SELECT l.id AS id, first_name, last_name, email, leave_type, leave_date, duration, comments, applier_id
            FROM leaves l, profiles p, users u
            WHERE approver_id IS NULL AND applier_id=p.id AND p.user_id=u.id;";
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaveBoard - Leaves</title>
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
        require_once './partials/header.php';
    ?>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <?php require_once './partials/sidebar.php'; ?>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <p></p>
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Leave Type</th>
                                <th scope="col">Leave Date</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Comment</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $row['email']; ?></th>
                                    <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                    <td class="text-capitalize"><?php echo $row['leave_type'] . ' Leave'; ?></td>
                                    <td><?php echo $row['leave_date']; ?></td>
                                    <td><?php echo $row['duration'] . ' days'; ?></td>
                                    <td><?php echo $row['comments']; ?></td>
                                    <td>
                                        <a href="./logics/leaves/approve.php?lid=<?php echo $row['id']; ?>&pid=<?php echo $row['applier_id']; ?>" class="btn btn-sm btn-success">Approve</a>
                                        <a href="./logics/leaves/reject.php?lid=<?php echo $row['id']; ?>&pid=<?php echo $row['applier_id']; ?>" class="btn btn-sm btn-danger">Reject</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        require_once './partials/footer.php';
    ?>
</body>
</html>