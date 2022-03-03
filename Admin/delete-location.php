<?php 
include ('includes/dbconn.php');
$name = $_POST['name'];
$url = $_POST['url'];
$id = $_POST['id'];
 
echo $id. $url;
if (!empty($name)&&!empty($url)) {
	$query = "DELETE FROM `locations` WHERE id = '{$id}'";
	//UPDATE `locations` SET `id`=[value-1],`name`=[value-2],`url`=[value-3],`available`=[value-4] WHERE 1
	$result = mysqli_query($con,$query);

	if ($result == 1){
		header('location:locations.php');
	}
} else {
	header('location:locations.php');
}
?>