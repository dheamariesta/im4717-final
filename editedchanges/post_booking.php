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
          <a href="reschedule.php">Reschedule</a>
        </div>
      </div>
      <div class="row breadcrumbs">
        <i class="fas fa-chevron-left"></i> &nbsp; <a href="dentist.php">Dentist</a>
      </div>
      <?php


      $name = $_POST["name"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $service = $_POST["service"];
      $dentist_id = $_POST["doctor-id"];
      $appt_date = $_POST["appt-date"];
      $appt_time = $_POST["time-slot"];


      @ $db = new mysqli('localhost', 'f31im', 'f31im', 'f31im');

      $query = "INSERT INTO booking (`name`, `email`, `contact`, `service`, `dentist_id`, `appt_date`, `appt_time`) VALUES ('".$name."','".$email."','".$phone."','".$service."','".$dentist_id."','".$appt_date."','".$appt_time."');";

      if ($result = $db->query($query)===TRUE){
        $booking_id = $db->insert_id;
      }

      if ($result) {
          echo '<div class="row">';
          echo '<h3 class="form-header">Booking Successful!</h3>';
          echo '</div>';
          echo '<h4 class="text">';
          echo 'Booking details are as follows: ';
          echo '</h4><br/>';
          echo 'Booking ID: '.$booking_id;
          echo "<br/><br/>Name: ".$name;
          echo "<br/><br/>Email: ".$email;
          echo "<br/><br/>Contact: ".$phone;
          echo "<br/><br/>Service chosen: ".$service;
          echo "<br/><br/>Date of Appointment: ".$appt_date;
          echo "<br/><br/>Appointment Time: ".$appt_time;
      } else {
          echo "An error has occurred.  The item was not added.";
      }


      $db->close();

       ?>

    </div><!--end of container-->
  </body>
</html>
