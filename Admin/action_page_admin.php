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
$slot_id = $_GET['id'];
$booked = $_GET['booked'];

if ($booked) {
	$query = "UPDATE `locations` SET `available`='1' WHERE `id` = '{$slot_id}'";
	$result = mysqli_query($con,$query);

	if ($result == 1){
		header('location:dashboard.php');
	}
} else {
	header('location:dashboard.php');
}

?>