<?php 
include ('header.php');
include ('DB/conn.php');

    if(isset($_POST['client_register_button'])){
        //$cemail="" , $cpassword="" , $cfname="" , $clname="" , $dob="" , $gender="" , $contact="" , $mstatus="" , $caddress="";
        if($cemail="" || $cpassword="" || $cfname="" || $clname="" || $dob="" || $gender="" || $contact="" || $mstatus="" || $caddress=""){
            $msg = "Fill all the feilds !";
        } else {

                $cemail = $_POST['client_email_address'];
                $cpassword = $_POST['client_password'];
                $cfname = $_POST['client_first_name'];
                $clname = $_POST['client_last_name'];
                $dob = $_POST['client_date_of_birth'];
                $gender = $_POST['client_gender'];
                $contact = $_POST['client_phone_no'];
                $mstatus = $_POST['client_maritial_status'];
                $caddress = $_POST['client_address'];
                $addedon = date("Y-m-d h:i:s");
                $enemail = md5($cemail);
                $query="";
                $query = "INSERT INTO `client_table`(`client_email_address`, `client_password`, `client_first_name`, `client_last_name`, `client_date_of_birth`, `client_gender`, `client_address`, `client_phone_no`, `client_maritial_status`, `client_added_on`, `client_verification_code`, `email_verify`) 
                VALUES ('{$cemail}','{$cpassword}','{$cfname}','{$clname}','{$dob}','{$gender}','{$caddress}','{$contact}','{$mstatus}','{$addedon}','{$enemail}','Yes')";
                $result = mysqli_query($con, $query);
                
                if (($result)>0) {
                    echo "Registration Successful!";
                    header("Location:login.php");
                    die;
                }else {
                    echo "Error: ".mysqli_error($con);         
                }
        }
    }
?>

    <div class="container">
        <div class="row" id="isdv">
            <div id="ib9r" class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin-simple flex-row my-5">
                    <div id="i6jo" class="card-img-left d-none d-md-flex">
                    </div>
                    <div class="card-body" id="irji">
                        <h5 class="card-title text-center">Register</h5>
                            <form method="post" id="client_register_form">
                                
                                <div class="form-group">
                                    <label>Email Address<span class="text-danger">*</span></label>
                                    <input type="text" name="client_email_address"  id="client_email_address" class="form-control" 
                                    required autofocus data-parsley-type="email" data-parsley-trigger="keyup" />
                                </div>
                                <div class="form-group">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" name="client_password"  id="client_password" class="form-control" 
                                    required  data-parsley-trigger="keyup" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name<span class="text-danger">*</span></label>
                                            <input type="text" name="client_first_name"  id="client_first_name" class="form-control" 
                                            required  data-parsley-trigger="keyup" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name<span class="text-danger">*</span></label>
                                            <input type="text" name="client_last_name"  id="client_last_name" class="form-control" 
                                            required  data-parsley-trigger="keyup" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth<span class="text-danger">*</span></label>
                                            <input type="text" name="client_date_of_birth"  id="client_date_of_birth" class="form-control" 
                                            required  data-parsley-trigger="keyup" readonly />
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
                                            <input type="text" name="client_phone_no"  id="client_phone_no" class="form-control" 
                                            required  data-parsley-trigger="keyup" />
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
                                    <textarea name="client_address"  id="client_address" class="form-control" 
                                    required data-parsley-trigger="keyup"></textarea>
                                </div> <br>
                                <div class="form-group text-center">
                                    <input type="hidden" name="action"  />
                                    <input type="submit" name="client_register_button" id="client_register_button" class="btn btn-primary" value="Register" />
                                </div>
                                <div class="form-group text-center">
                                    <p><a href="login.php">Login</a></p>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include ('footer.php') ?>

<script>
    $(document).ready(function(){

    $('#client_date_of_birth').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
});
</script>