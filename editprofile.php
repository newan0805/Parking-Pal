<style>
    a {
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
    }

    a:hover {
    background-color: #ddd;
    color: black;
    }

    .next {
    background-color: #f1f1f1;
    color: black;
    }

    .previous {
    background-color: #47e8ed;
    color: white;
    }

    .round {
    border-radius: 50%;
    }
</style>

<?php
    include ("header.php");
    include ("DB/conn.php");

    $user_id = "";
    $username = "";
    $msg = "";
    $msgSuc = "";

    session_start();
    $user_id = $_SESSION['client_id'];
    $username = $_SESSION['client_first_name'];
    if(empty($_SESSION['client_id'])){
    header("location: login.php");
    exit;
}
    $user_id = $_SESSION['client_id'];
    $username = $_SESSION['client_first_name'];

    $sql = "SELECT * FROM `client_table` WHERE `client_id` = '".$user_id."' ";
    $result = mysqli_query($con, $sql);
    $cemail=""; $cpassword=""; $cfname=""; $clname=""; $dob=""; $gender=""; $contact=""; $mstatus=""; $caddress="";
    if(mysqli_num_rows($result)>0){
        while($row = $result->fetch_assoc()) {
        
            $email = $row['client_email_address'];
            $pass  = $row['client_password'];
            $fname = $row['client_first_name'];
            $lname = $row['client_last_name'];
            $dob = $row['client_date_of_birth'];
            $gender = $row['client_gender'];
            $mobile = $row['client_phone_no'];
            $mstatus = $row['client_maritial_status'];
            $address = $row['client_address'];            
        }
    }else{
        $msg = "No data founded !";
    }

    if(isset($_POST['client_update_button'])){
        $cemail = $_POST['client_email_address'];
        $cpassword = $_POST['client_password'];
        $cfname = $_POST['client_first_name'];
        $clname = $_POST['client_last_name'];
        $dob = $_POST['client_date_of_birth'];
        $gender = $_POST['client_gender'];
        $contact = $_POST['client_phone_no'];
        $mstatus = $_POST['client_maritial_status'];
        $caddress = $_POST['client_address'];

        $sqli="";
       $sqli = "UPDATE `client_table` 
                SET client_email_address = '".$cemail."',
                    client_password = '".$cpassword."',
                    client_first_name = '".$cfname."',
                    client_last_name = '".$clname."',
                    client_date_of_birth = '".$dob."',
                    client_gender = '".$gender."',
                    client_gender = '".$gender."',
                    client_phone_no = '".$contact."',
                    client_maritial_status = '".$mstatus."',
                    client_address = '".$caddress."'
                WHERE `client_id` = '".$user_id."' ";

        if (mysqli_query($con, $sqli)) {
            $msg = "Profile Successfully Updated !";
            header("Location: dashboard.php");
            die;
         }else {
             $msg="Error:" .mysqli_error($con);            
         }

    }
    
$body = '<div>
            <div class="container">
            <div class="row" id="isdv">
                <div id="ib9r" class="mx-auto">
                    <div class="card card-signin-simple flex-row my-5">
                        <div id="i6jo" class="card-img-left d-none d-md-flex">
                        </div>
                        <div class="card-body" id="irji">
                        <a href="dashboard.php" class="previous round"><span class="iconify" data-icon="typcn:arrow-back"></span></a>
                            <h5 class="card-title text-center">Edit Profile</h5>
                            
                                <form method="post">
                                    <div class="form-group">
                                        <label>Email Address<span class="text-danger">*</span></label>
                                        <input type="text" name="client_email_address" id="client_email_address" class="form-control" required autofocus data-parsley-type="email" 
                                        data-parsley-trigger="keyup" value="'.$email.'"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <input type="password" name="client_password" id="client_password" class="form-control" required  data-parsley-trigger="keyup" 
                                        value="'.$pass.'"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Re-Password<span class="text-danger">*</span></label>
                                        <input type="password" name="client_password" id="client_password" class="form-control" required  data-parsley-trigger="keyup" 
                                        value="'.$pass.'"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name<span class="text-danger">*</span></label>
                                                <input type="text" name="client_first_name" id="client_first_name" class="form-control" required  data-parsley-trigger="keyup" 
                                                value="'.$fname.'"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name<span class="text-danger">*</span></label>
                                                <input type="text" name="client_last_name" id="client_last_name" class="form-control" required  data-parsley-trigger="keyup" 
                                                value="'.$lname.'"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of Birth<span class="text-danger">*</span></label>
                                                <input type="text" name="client_date_of_birth" id="client_date_of_birth" class="form-control" required  data-parsley-trigger="keyup" readonly 
                                                value="'.$dob.'"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender<span class="text-danger">*</span></label>
                                                <select name="client_gender" id="client_gender" class="form-control">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact No.<span class="text-danger">*</span></label>
                                                <input type="text" name="client_phone_no" id="client_phone_no" class="form-control" required  data-parsley-trigger="keyup" 
                                                value="'.$mobile.'"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Maritial Status<span class="text-danger">*</span></label>
                                                <select name="client_maritial_status" id="client_maritial_status" class="form-control">
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Seperated">Seperated</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Complete Address<span class="text-danger">*</span></label>
                                        <textarea name="client_address" id="client_address" class="form-control text-left" required data-parsley-trigger="keyup"
                                        placeholder="'.$address.'">'.$address.'  
                                        </textarea>
                                    </div> <br>
                                    <div class="form-group text-center">
                                        <input type="hidden" name="action" value="client_register" />
                                        <input type="submit" name="client_update_button" id="client_update_button" class="btn btn-primary" value="Update" />
                                    </div>
                                </form>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>';
    echo $body;
?>

<? include ("footer.php"); ?>

<script>
$(document).ready(function(){
    $('#client_date_of_birth').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
});
</script>