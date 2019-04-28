<?php

include('database_connection.php');

$column = array('month', 'date', 'employee_id', 'con', 'time_in', 'time_out');

$query = "
SELECT `attendance`.`date`,`attendance`.`employee_id`, CONCAT(`firstname`, ' ', `lastname`) AS con, `time_in`,`time_out`,`month`  FROM `attendance` INNER JOIN `employees`ON `attendance`.`employee_id`= `employees`.`id`
";

if(isset($_POST['filter_mes'], $_POST['filter_employee']) && $_POST['filter_mes'] != '' && $_POST['filter_employee'] != '')
{
 $query .= '
 WHERE month = "'.$_POST['filter_mes'].'" AND attendance.employee_id = "'.$_POST['filter_employee'].'"
 ';
}


$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['month'];
 $sub_array[] = $row['date'];
 $sub_array[] = $row['employee_id'];
 $sub_array[] = $row['con'];
 $sub_array[] = $row['time_in'];
 $sub_array[] = $row['time_out'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT `attendance`.`date`,`attendance`.`employee_id`, CONCAT(`firstname`, ' ', `lastname`) AS con, `time_in`,`time_out`,`month`  FROM `attendance` INNER JOIN `employees`ON `attendance`.`employee_id`= `employees`.`id`";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($connect),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>
