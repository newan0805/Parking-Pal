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
global $username;
global $user_id;
?>

<body style="margin-top:0 !important">

<div class="d-flex">

<div class="d-flex flex-column ee text-white bg-dark" style="height:100vh">
    <a href="dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      
      <span class="fs-4 center-text">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      
      <li>
        <a href="dashboard.php" class="nav-link text-white">
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
        <li><a class="dropdown-item" href="editProfile.php">Profile</a></li>
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
      </tr>
    </thead>
    <tbody>

<?php 

$query = "SELECT * FROM `locations` WHERE `slot_user` = '{$user_id}' and `available` = '0'";
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
         </tr>";

      echo $tr;
  }
}
?>
    </tbody>
  </table>
</div>


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