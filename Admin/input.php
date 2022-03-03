<?php 
include ('includes/dbconn.php');
$name = $_POST['name'];
$url = $_POST['url'];
 
//echo $name. $url;
if (!empty($name)&&!empty($url)) {
	$query = "INSERT INTO `locations`(`name`, `url`, `available`, `slot_user`) VALUES ('{$name}','{$url}','1','0')";
	$result = mysqli_query($con,$query);

	if ($result == 1){
		header('location:dashboard.php');
	}
} else {
	header('location:add_locations.php');
}
?>