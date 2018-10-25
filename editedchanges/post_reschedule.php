<html>
  <head>
    <meta charset="utf-8">
    <title>Bookings</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="booking.js"></script>
    <link type="text/css" rel="stylesheet" href="./booking.css" />
  </head>
  <body>
    <div class="container">
      <div class="row">
        <img src="logo.png" id="logo" />
      </div>
      <div class="row nav">
        <div class="col-4">
          <a href="#">Home</a>
        </div>
        <div class="col-4" id="current-page">
          <a href="dentist.php">Dentist</a>
        </div>
        <div class="col-4">
          <a href="rescbedule.php">Reschedule</a>
        </div>
      </div>
      <div class="row breadcrumbs">
        <i class="fas fa-chevron-left"></i> &nbsp; <a href="dentist.php">Dentist</a>
      </div>
      <?php


      $name = $_POST["customername"];
      $appt_date = $_POST["appt-date"];
      $appt_time = $_POST["time-slot"];


      @ $db = new mysqli('localhost', 'f31im', 'f31im', 'f31im');

      $query = "UPDATE booking SET appt_date = '".$appt_date."', appt_time = '".$appt_time."' WHERE name = '".$name."';";
      $result = $db->query($query);

      if ($result) {
          echo '<div class="row">';
          echo '<h3 class="form-header">Reschedule Successful!</h3>';
          echo '</div>';
          echo '<h4 class="text">';
          echo 'Booking details are as follows: ';
          echo '</h4>';
          echo "Name: ".$name;
          echo "<br/><br/>Date of Appointment: ".$appt_date;
          echo "<br/><br/>Appointment Time: ".$appt_time;
      } else {
          echo "An error has occurred.  The item was not updated.";
      }


      $db->close();

       ?>

    </div><!--end of container-->
  </body>
</html>
