<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
include ('DB/conn.php');
?>

<body>
<div class="container">
  <div class="row">
    <div class="col-sm">

	<h2>Table Filter</h2>

	<input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter">

	<table class="order-table table">
		<thead>
			<tr>
				<th>Location Name</th>
				<th>URL</th>
				<th>Available</th>
				<th>Checkout?</th>
			</tr>
		</thead>
		<tbody>

			<?php 

$query = "SELECT * FROM `locations` WHERE `available` = 0";
$result = mysqli_query($con,$query);

if (mysqli_num_rows($result)>0) {

	while($row = $result->fetch_assoc()) {

			$name = $row['name'];
			$id = $row['id'];
			$url = $row['url'];
			$available_b = $row['available'];
			$available = ($available_b = 1) ? "Available" : "Not available" ;
			$target ="#myModal".$id;
			$modal ='<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="'.$target.'">Checkout</button>';


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
		</tbody>
	</table>
  <!-- Modal -->
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
  <form action="action_page_admin.php" class="needs-validation" novalidate>
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
</html>