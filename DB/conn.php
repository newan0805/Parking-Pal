<?php
    $con=mysqli_connect("sql302.epizy.com", "epiz_30483102", "5pZl6dHOJ2R", "epiz_30483102_parkingpal");
    if(mysqli_connect_errno()){
        echo "Database: ".mysqli_connect_error();
        die;
    }
  ?>