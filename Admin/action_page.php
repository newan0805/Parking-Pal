<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
    if (strlen($_SESSION['vpmsaid']==0)) {
        header('location:logout.php');
        } else {
		}
?>
<?php 
include ('DB/conn.php');
$user_id = $_GET['uid'];
$username = $_GET['uname'];
$slot_id = $_GET['id'];
$time = date("Y-m-d h:i:sa");
$booked = $_GET['booked'];

if ($booked) {
	$query = "INSERT INTO `bookings`(`userid`, `slot_id`, `time`) VALUES ('{$user_id}', '{$slot_id}', '{$time}')";
$result = mysqli_query($con,$query);

if ($result == 1) {
	$query = "UPDATE `locations` SET `available`='0' WHERE `id` = '{$slot_id}'";
	$result = mysqli_query($con,$query);

	if ($result == 1){
		header('location:dashboard.php');
	}
	
} else {
	header('location:index.php');
}

} else {
	header('location:index.php');
}



?>