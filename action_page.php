
<?php
session_start();
include ('DB/conn.php');
$id = $_SESSION['client_id']; 
$merchant_id         = $_POST['merchant_id'];
$order_id             = $_GET['order_id'];
$ids = explode('|',$order_id);
$user_id = $ids[0];
$slot_id = $ids[1];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];
$time = date("Y-m-d h:i:sa");
$merchant_secret = '8hf6Eh9rKrB49aLC8mLOOn4KC4z8DXJnm8LUozRUKlHz';#edit this
$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

$booking_id = $user_id . $slot_id;
if (true){

    //echo $slot_id;
	$query = "UPDATE `locations` SET `available`='0' ,`slot_user` = {$user_id} WHERE `id` = '{$slot_id}'";
	$result = mysqli_query($con,$query);

	if ($result == 1){
		header('location:dashboard.php');
	}
	

}else {
	
    //echo '<script>alart(Paymant unsuccessful !)</script>';
    //header('location:index.html');
    
}

?>