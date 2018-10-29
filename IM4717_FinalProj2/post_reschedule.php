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
    <link rel="icon" type="image/png" href="logo-16.png"/>
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

      $booking_id = $_POST["bookingid"];
      $name = $_POST["customername"];
      $appt_date = $_POST["appt-date"];
      $appt_time = $_POST["time-slot"];


      @ $db = new mysqli('localhost', 'f31im', 'f31im', 'f31im');

      $query = "UPDATE booking SET appt_date = '".$appt_date."', appt_time = '".$appt_time."' WHERE name = '".$name."' AND id = '".$booking_id."';";
      $result = $db->query($query);

      if ($result) {
          echo '<div class="row">';
          echo '<h3 class="form-header" style="text-align:center;">Reschedule Successful!</h3>';
          echo '</div>';
          echo '<h4 class="text" style="text-align:center;">';
          echo 'Booking details are as follows: ';
          echo '</h4>';
          echo '<p style="text-align:center;">Booking ID: '.$booking_id;
          echo '</p><br/>';
          echo '<p style="text-align:center;">Name: '.$name;
          echo '</p><br/>';
          echo '<p style="text-align:center;">Date of Appointment: '.$appt_date;
          echo '</p><br/>';
          echo '<p style="text-align:center;">Appointment Time: '.$appt_time;
          $to = 'f31im@localhost';
          $subject = 'Confirmation Mail for Rescheduling of Dental Appointment';
          $message = 'Dear Patient, your rescheduled dental appointment details are as follows: ';
          $message .= "\r\n";
          $message .= 'Booking ID: '.$booking_id;
          $message .= "\r\n";
          $message .= 'Name: '.$name;
          $message .= "\r\n";
          $message .= 'Appointment Date: '.$appt_date;
          $message .= "\r\n";
          $message .= 'Appointment Time: '.$appt_time;
          $message .= "\r\n";
          $message .= "\r\n";
          $message .= 'Best Regards,';
          $message .= "\r\n";
          $message .= 'myDENTAL';
          $headers = 'From: f31im@localhost' . "\r\n" .
                      'Reply-To: f31im@localhost' . "\r\n" .
                      'X-Mailer: PHP/' . phpversion();
          mail($to,$subject,$message,$headers,'-ff31im@localhost');
          echo '<br/><br/><h3 style="text-align:center;">Confirmation Mail sent!</h3>';
      } else {
          echo "An error has occurred.  The item was not updated.";
      }


      $db->close();

       ?>

    </div><!--end of container-->
  </body>
</html>
