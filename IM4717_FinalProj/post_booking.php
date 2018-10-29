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

      if ($name==''||$email==''||$phone==''||$service==''||$appt_date==''||$appt_time=='') {
        echo "Please fill in the required fields";
        $db->close();
      }


      @ $db = new mysqli('localhost', 'f31im', 'f31im', 'f31im');

      $query = "INSERT INTO booking (`name`, `email`, `contact`, `service`, `dentist_id`, `appt_date`, `appt_time`) VALUES ('".$name."','".$email."','".$phone."','".$service."','".$dentist_id."','".$appt_date."','".$appt_time."');";

      if ($result = $db->query($query)===TRUE){
        $booking_id = $db->insert_id;
      }

      if ($result) {
          echo '<div class="" style="text-align: center;">';
          echo '<h3 class="form-header">Booking Successful!</h3>';
          echo '</div>';
          echo '<h4 class="text"style="text-align: center;">';
          echo 'Booking details are as follows: ';
          echo '</h4><br/>';
          echo '<p style="text-align: center;">Booking ID: '.$booking_id;
          echo '</p>';
          echo '<br/><p style="text-align: center;">Name: '.$name;
          echo '</p>';
          echo '<br/><p style="text-align: center;">Email: '.$email;
          echo '</p>';
          echo '<br/><p style="text-align: center;">Contact: '.$phone;
          echo '</p>';
          echo '<br/><p style="text-align: center;">Srevice Chosen: '.$service;
          echo '</p>';
          echo '<br/><p style="text-align: center;">Date of Appointment: '.$appt_date;
          echo '</p>';
          echo '<br/><p style="text-align: center;">Appointment Time: '.$appt_time;
          echo '</p>';
          $to = 'f31im@localhost';
          $subject = 'Confirmation Mail for Dental Appointment';
          $message = 'Dear Patient, your dental appointment details are as follows: ';
          $message .= "\r\n";
          $message .= 'Booking Id: '.$booking_id;
          $message .= "\r\n";
          $message .= 'Name: '.$name;
          $message .= "\r\n";
          $message .= 'Email: '.$email;
          $message .= "\r\n";
          $message .= 'Contact: '.$phone;
          $message .= "\r\n";
          $message .= 'Service: '.$service;
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
          echo "An error has occurred.  The item was not added.";
      }


      $db->close();

       ?>

    </div><!--end of container-->
  </body>
</html>
