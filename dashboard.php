<?php
include ('header.php');
include ('DB/conn.php');

session_start();
$user_id = $_SESSION['client_id'];
$username = $_SESSION['client_first_name'];
if(empty($_SESSION['client_id'])){
  header("location: login.php");
  exit;
}

$query = "SELECT * FROM `client_table` WHERE client_id = {$user_id} ";
      $result = mysqli_query($con,$query);

      if (mysqli_num_rows($result)>0) {

        while($row = $result->fetch_assoc()) {
          $lname = $row['client_last_name'];
          $address = $row['client_address'];
          $email = $row['client_email_address'];
          $tel = $row['client_phone_no'];

            global $lname;
            global $address;
            global $email;
            global $tel;
        }
      }

global $username;
global $user_id;
?>

<body style="margin-top:0 !important">

<div class="d-flex">

<div class="d-flex flex-column ee text-white bg-dark" style="height:100vh">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      
      <span class="fs-4 center-text">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="orders.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          My Bookings
        </a>
      </li>

    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://img.icons8.com/bubbles/100/000000/user.png" alt="userimage" width="32" height="32" class="rounded-circle me-2">
        <strong><?php $username = $_SESSION['client_first_name']; echo($username); ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="editprofile.php">Profile</a></li>
        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
      </ul>
    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm">

  <h2>Table Filter</h2>

  <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter">

  <div class="table-responsive">

  <table class="order-table table">
    <thead>
      <tr>
        <th>Location Name</th>
        <th>URL</th>
        <th>Available</th>
        <th>Book</th>
      </tr>
    </thead>
    <tbody>

<?php 

$query = "SELECT * FROM `locations` WHERE `available` = 1";
$result = mysqli_query($con,$query);

if (mysqli_num_rows($result)>0) {

  while($row = $result->fetch_assoc()) {

      $name = $row['name'];
      $id = $row['id'];
      $url = $row['url'];
      $available_b = $row['available'];
      $available = ($available_b = 1) ? "Available" : "Not available" ;
      $target ="#myModal".$id;
      $modal ='<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="'.$target.'">Open</button>';


        $tr ="
         <tr>
            <td>{$name}</td>
            <td><a href={$url}>{$name}</a></td>
            <td>{$available}</td>
            <td>{$modal}</td>
         </tr>";

      echo $tr;
  }
}
?>
    </tbody>
  </table>
</div>
<?php 

$query = "SELECT * FROM locations";
$result = mysqli_query($con,$query);

if (mysqli_num_rows($result)>0) {

  while($row = $result->fetch_assoc()) {

      $id = $row['id'];
      $url = $row['url'];
      $available = $row['available'];
      $modal_name ="myModal".$id; 


      $modal_box = '
    <div class="modal fade" id="'.$modal_name.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
            <div class="modal-body">
            <h2>Welcome '.$username.'</h2>

        

            <!--this one --> 
               <form action="https://sandbox.payhere.lk/pay/checkout" method="post" class="needs-validation" novalidate>
                 <div class="form-group">
                   <input type="hidden" class="form-control" id="uname" name="uname" value="'.$username.'" hidden  required>
                 </div>
                 <div class="form-group">
                    <input type="hidden" class="form-control" id="uid" name="uid" value="'.$user_id.'" hidden  required>
                 </div>
                 <div class="form-group">
                   <input type="hidden" class="form-control" id="id" name="id" value="'.$id.'" hidden  required>
                 </div>
                 <div class="form-group form-check">
                   <label class="form-check-label">
                     <input class="form-check-input" type="checkbox" name="booked" required> You have to pay 2000LKR for book this slot.
                   </label>
                 </div>
                   <input type="hidden" name="merchant_id" value="1219359"> <!--#edit this-->
                   <input type="hidden" name="return_url" value="http://parkingpal.42web.io/action_page.php">
                   <input type="hidden" name="cancel_url" value="http://parkingpal.42web.io/action_page.php">
                   <input type="hidden" name="notify_url" value="http://parkingpal.42web.io/action_page.php">
                   <input type="hidden" name="order_id" value="'.$user_id.'|'.$id.'">
                   <input type="hidden" name="items" value="Parking"><br>
                   <input type="hidden" name="currency" value="LKR">
                   <input type="hidden" name="amount" value="2000">  
                   <input type="hidden" name="first_name" value="'.$username.'">
                   <input type="hidden" name="last_name" value="'.$lname.'"><br>
                   <input type="hidden" name="email" value="'.$email.'">
                   <input type="hidden" name="phone" value="'.$tel.'"><br>
                   <input type="hidden" name="address" value="'.$address.'">
                   <input type="hidden" name="city" value="Colombo">
                   <input type="hidden" name="country" value="Sri Lanka">
                   <input type="submit" class="btn btn-primary" value="Buy Now">
               </form> 
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>';

      echo $modal_box;
  }
}
?>

 

    
</div>
</div>
</div>
</body>


<script type="text/javascript">
  // Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.036 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
</script>
<script type="text/javascript">
  (function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<?php include ('footer.php'); ?>