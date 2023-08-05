<?php
function get_user($con) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT email, role, first_name, last_name, dept, user_id, inviter_id FROM users, (SELECT * from profiles where user_id='$user_id' limit 1) P WHERE users.id=P.user_id;";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}

function get_role($str) {
    if ($str == 'hr') {
        return 'Admin';
    }
    return 'Employee';
}

function get_dept($str) {
    switch ($str) {
        case 'hr':
            return 'Human Resources';
        case 'business':
            return 'Business Development';
        case 'sales_and_marketing':
            return 'Sales & Marketing';
        case 'sales_and_marketing':
            return 'Sales & Marketing';
        case 'development':
            return 'Development Department';
        case 'test':
            return 'Software Testing Department';
        case 'customer_support':
            return 'Customer Support Department';
        default:
            return 'N/B';
    }
}

function get_inviter($inviter_id, $con) {
    if (!$inviter_id) {
        return 'Self';
    }
    
    $query = "SELECT first_name, last_name FROM users WHERE id=$inviter_id;";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $inviter = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $inviter['first_name'] . ' ' . $inviter['last_name'];
    }
    return 'Self';
}
