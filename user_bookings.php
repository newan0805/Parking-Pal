<?php
    session_start();
    error_reporting(0);
    include('DB/conn.php');
    $user_id = $_SESSION['client_id'];
    $username = $_SESSION['client_first_name'];
    if (strlen($_SESSION['vpmsaid']==0)) {
        header('location:logout.php');
        }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VPS</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datatable.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  
  <!--Custom Font-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'includes/navigation.php' ?>
  
    <?php
    $page="dashboard";
    include 'includes/sidebar.php'
    ?>
    
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="dashboard.php">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Dashboard</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <!-- <h1 class="page-header">Vehicle Management</h1> -->
      </div>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                        <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                        
        <thead>
            <tr>
                <th>Location Name</th>
        <th>URL</th>
        <th>Available</th>
        <th>Book</th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr> -->
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


        $tr ="<tr>
        <td>{$name}</td>
        <td><a href={$url}>{$name}</a></td>
        <td>{$available}</td>
        <td>{$modal}</td>
      </tr>";

      echo $tr;
  }

}


?>

<?php 

$query = "SELECT * FROM locations";
$result = mysqli_query($con,$query);

if (mysqli_num_rows($result)>0) {

  while($row = $result->fetch_assoc()) {

      $id = $row['id'];
      $url = $row['url'];
      $available = $row['available'];
      $modal_name ="myModal".$id; 


        $modal_box = '<div class="modal fade" id="'.$modal_name.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">booking form</h4>
        </div>
        <div class="modal-body">
  <h2>Welcome '.$username.'</h2>
  <form action="action_page.php" class="needs-validation" novalidate>
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
        <input class="form-check-input" type="checkbox" name="booked" required> Book this slot.
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
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
           
 
        
        </tbody>

    </table>
            </div>
          </div>
        </div>
        
        
        
</div><!--/.row-->
    
    
    

        <?php include 'includes/footer.php'?>
  </div>  <!--/.main-->
  
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/chart.min.js"></script>
  <script src="js/chart-data.js"></script>
  <script src="js/easypiechart.js"></script>
  <script src="js/easypiechart-data.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/custom.js"></script>
  <script>
    window.onload = function () {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
};
  </script>

    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
    
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
</html>