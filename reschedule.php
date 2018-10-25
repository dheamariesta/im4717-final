<!DOCTYPE html>
<html lang="en" dir="ltr">
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
          <a href="index.html">Home</a>
        </div>
        <div class="col-4" >
          <a href="dentist.php">Dentist</a>
        </div>
        <div class="col-4" id="current-page">
          <a href="reschedule.php" >Reschedule</a>
        </div>

      </div>
      <!-- <div class="row breadcrumbs">
        <i class="fas fa-chevron-left"></i> &nbsp; <a href="dentist.php">Dentist</a>
      </div> -->
      <form id="reschedule-form" method="post">
        <div class="row">
          <h3 class="form-header">Step 1</h3>
        </div>
        <div class="row form-row">
          <div class="col-1 input-label">
            Booking ID:
          </div>
          <div class="col-6">
            <input type="text" name="id" class="input-text" required/>
          </div>
        </div>
        <div class="row form-row">
          <div class="col-1 input-label">
            Email:
          </div>
          <div class="col-6">
            <input type="email" name="email" class="input-text" required/>
          </div>
        </div>
        <button class="book-now-button" type="Submit">Get Booking</button>
      </form><br/>

      <?php
      if (isset($_POST['id'])) {
        $booking_id = $_POST['id'];
      }
      if (isset($_POST['email'])) {
        $email = $_POST['email'];
      }
      @ $db = new mysqli('localhost', 'f31im', 'f31im', 'f31im');

      $query = "SELECT * from booking WHERE id = '".$booking_id."' AND email = '".$email."';";
      $result = $db->query($query);

      if ($result) {
        if ($result->num_rows > 0){
          while($row = $result->fetch_assoc()) {
            $dentist_id = $row["dentist_id"];
            $name = $row["name"];
            ?>
            <input type="hidden" id="doctor-id" name="doctor-id" value="<?php echo ($dentist_id); ?>"/>
            <?php
            echo '';
            echo '<div class="row">';
            echo '<h3 class="form-header">Step 2</h3>';
            echo '</div>';
            echo '<div class="row form-row">';
            echo '<div class="col-1 input-label">';
            echo 'Customer Name: ';
            echo '</div>';
            echo '<div class="col-6 input-label" style="text-align:left;">';
            echo $row["name"];
            echo '</div>';
            echo '</div>';

            echo '<div class="row form-row">';
            echo '<div class="col-1 input-label">';
            echo 'Appointment Date: ';
            echo '</div>';
            echo '<div class="col-6 input-label" style="text-align:left;">';
            echo $row["appt_date"];
            echo '<input type="hidden" id="apptdate" name="apptdate" value="'.$row["appt_date"].'"/>';
            echo '</div>';
            echo '</div>';

            echo '<div class="row form-row">';
            echo '<div class="col-1 input-label">';
            echo 'Appointment Time: ';
            echo '</div>';
            echo '<div class="col-6 input-label" style="text-align:left;">';
            echo $row["appt_time"];
            echo '<input type="hidden" id="appttime" name="appttime" value="'.$row["appt_time"].'"/>';
            echo '</div>';
            echo '</div>';
          }?>
          <style type="text/css">#reschedule-form2{
            display:block !important;
          }</style>
      <?php
        }
      }
      ?>

      <form id="reschedule-form2" method="post" action="post_reschedule.php" onsubmit="return timeslotvalidate()">
        <input type="hidden" id="customername" name="customername" value="<?php echo ($name); ?>"/>
        <div class="row">
          <h3 class="form-header">Step 3</h3>
        </div>
        <div class="row">
          <h3 class="form-header">Choose Date and Time</h3>
        </div>
        <div class="row form-row">
          <div class="col-6 input-label">

            <input type="text" name="appt-date" id="datepick" value="" class="input-text" onchange="getDate();" onblur="datevalidate()"/>

            <script>
            $(function() {
              $('input[name="appt-date"]').daterangepicker({
                  autoUpdateInput: true,
                  singleDatePicker: true,
                  locale: {
                    format: 'YYYY-MM-DD'
                  }
              });
            });
            </script>
          </div>
          <div class="col-6">
            <table id="time-slot-table">
              <tr>
                <td id = "0900-1000">
                  0900 - 1000 <input type="radio" name="time-slot" />
                </td>
                <td id = "1500-1600">
                  1500 - 1600 <input type="radio" name="time-slot" />
                </td>
              </tr>
              <tr>
                <td id = "1000-1100">
                  1000 - 1100 <input type="radio" name="time-slot" />
                </td>
                <td id="1600-1700">
                  1600 - 1700 <input type="radio" name="time-slot" />
                </td>
              </tr>
              <tr>
                <td id="1100-1200">
                  1100 - 1200 <input type="radio" name="time-slot" />
                </td>
                <td id="1700-1800">
                  1700 - 1800 <input type="radio" name="time-slot" />
                </td>
              </tr>
              <tr>
                <td id = "1400-1500">
                  1400 - 1500 <input type="radio" name="time-slot" />
                </td>
                <td id="1800-1900">
                  1800 - 1900 <input type="radio" name="time-slot" />
                </td>
              </tr>
            </table>
          </div>
        </div>
        <button type="submit" class="book-now-button">Reschedule</button>
      </form><br/>




    </div>



  </body>
</html>
