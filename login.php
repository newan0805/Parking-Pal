<?php 
  include ('header.php'); 
  include ('DB/conn.php');
  
    if(isset($_SESSION['client_id']))
    {
	    header('location:dashboard.php');
    }
?>

<?php 
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

$email = "";  $password = ""; $msg = ""; $sql = ""; $result = ""; $username = ""; 

if(isset($_POST['login'])){
    $email =$_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM client_table WHERE client_email_address='".$email."' AND client_password='".$password."' ";

    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  

    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter username.";
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } 

    if ($count>0) {

      $_SESSION["loggedin"] = true;
      $query1 = "SELECT client_id, client_first_name FROM client_table WHERE client_email_address = '".$email."' ";
      
    if($result = mysqli_query($con, $query1)){  
      if (mysqli_num_rows($result)>0) {

        while($row = $result->fetch_assoc()) {
      
            $id = $row['client_id'];
            $fname = $row['client_first_name'];
            $email = $row['client_email_address'];

            $_SESSION['client_id'] = $id; 
            $_SESSION['client_first_name'] = $fname; 
            $_SESSION['client_email_address'] = $email; 
            
            header("location:dashboard.php");
        
        }
      }
    }
  }else{
    $username_err = $password_err = "Invalid Cridentials !";
  }
}
?>

<div class="bg">
    <div class="container">
        <div class="row" id="isdv">
            <div id="ib9r" class=" mx-auto">
                <div class="card card-signin-simple flex-row my-5 align-middle">
                  <div class="card-img-left d-none d-md-flex">
                  </div>
                  <div class="card-body" id="ivnxp">
                  <?php
                  if(isset($_SESSION["success_message"]))
                  {
                    echo $_SESSION["success_message"];
                    unset($_SESSION["success_message"]);
                  }
                  ?>
                  <span id="message"></span>
                    <h5 class="card-title text-center">Sign in</h5>
                    
                    <form method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" type="text" name="email" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" >
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                        <div class="form-signin-simple">
                        <p class="text-center">
                          <button type="submit" id="client_login_button" name="login" class="btn btn-primary btn-block text-uppercase mt-2">Sign in</button>
                        </p>
                        <a href="register.php" id="i6b4p" class="d-block text-center mt-2 small">Register</a>
                        <p> <?php echo $msg; ?> </p>
                        <div id="output"></div>
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('footer.php') ?>