<?php
require_once './logics/conn.php';
require_once './logics/utils.php';

$profile_id = $_SESSION['profile_id'];

$month_num = idate('m');

$query = "SELECT * FROM leaves WHERE leave_date>='2023-$month_num-01' AND leave_date<='2023-$month_num-31' AND approver_id IS NOT NULL AND applier_id=$profile_id;";
$result = mysqli_query($con, $query);

$arr = array();
for ($i=0; $i<=31; $i++) {
    array_push($arr, 0);
}

$vac_leave_count = 0;
$sick_leave_count = 0;
$unpaid_leave_count = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $s_date = explode("-", $row['leave_date'])[2];
    $duration = intval($row['duration']);
    
    if ($row['leave_type'] == 'vacation') {
        $vac_leave_count += $duration;
    } elseif ($row['leave_type'] == 'sick') {
        $sick_leave_count += $duration;
    } else {
        $unpaid_leave_count += $duration;
    }

    $count = 0;
    while ($count < $duration) {
        $arr[$s_date+$count] = $row['leave_type'];
        $count++;
    }
}
