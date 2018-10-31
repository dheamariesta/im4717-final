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
    <link rel="icon" type="image/png" href="logo-16.png"/>
    <!--<script type="text/javascript">
          datevalidate();
          timeslotvalidate();
    </script>-->
  </head>
  <body>
    <div class="row">
      <img src="logo.png" id="logo" />
    </div>
    <div class="row nav">
      <div class="col-4">
        <a href="index.html">Home</a>
      </div>
      <div class="col-4" id="current-page">
        <a href="dentist.php">Dentist</a>
      </div>
      <div class="col-4">
        <a href="reschedule.php">Reschedule</a>
      </div>

    </div>
    <div class="container">

      <div class="row breadcrumbs">
        <i class="fas fa-chevron-left"></i> &nbsp; <a href="dentist.php">Dentist</a>
      </div>
      <div class="row">
        <h3 class="form-header">Patient Registration</h3>
      </div>
      <form id="booking-form" action="post_booking.php" method="POST" onsubmit="return timeslotvalidate()">
        <div class="row form-row">
          <div class="col-1 input-label">
            Name:
          </div>
          <div class="col-6">
            <input type="text" name="name" class="input-text" id="name" onblur="namevalidate()" required/>
          </div>
        </div>
        <div class="row form-row">
          <div class="col-1 input-label">
            Email:
          </div>
          <div class="col-6">
            <input type="email" name="email" class="input-text" id="email" onblur="emailvalidate()" required/>
          </div>
        </div>
        <div class="row form-row">
          <div class="col-1 input-label">
            Contact No.:
          </div>
          <div class="col-6">
            <input type="text" name="phone" class="input-text" id="contact" onblur="contactvalidate()" required/>
          </div>
        </div>
        <div class="row form-row">
          <div class="col-1 input-label">
            Select Service:
          </div>
          <div class="col-6">
            <div class="form-select">
              <select name="service">
                <option>
                  Dental Implants
                </option>
                <option>
                  Braces
                </option>
                <option>
                  Crowns and Bridges
                </option>
                <option>
                  Prevention
                </option>
                <option>
                  Teeth Whitening
                </option>
                <option>
                  Cosmetic Dentistry
                </option>
              </select>
            </div>

          </div>
        </div>
        <div class="row">
          <h3 class="form-header">Chosen Dentist</h3>
        </div>
        <div class="row form-row">
          <div class="col-1 input-label">
            Name:
          </div>
          <div class="col-6 input-label" style="text-align: left;">
            <?php echo $_GET["name"]; ?>
            <input type="hidden" id="doctor-id" name="doctor-id" value="<?php echo ($_GET["id"]); ?>"/>
          </div>

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
        <button type="submit" class="book-now-button">Book Appointment</button>

      </form>


    </div>



  </body>
</html>
