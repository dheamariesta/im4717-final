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
          <a href="#">Home</a>
        </div>
        <div class="col-4" >
          <a href="dentist.php">Dentist</a>
        </div>
        <div class="col-4" id="current-page">
          <a href="#" >Reschedule</a>
        </div>

      </div>
      <!-- <div class="row breadcrumbs">
        <i class="fas fa-chevron-left"></i> &nbsp; <a href="dentist.php">Dentist</a>
      </div> -->
      <form id="reschedule-form">
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
        <button type="Submit">Get Booking</button>
      </form>

      <?php if($booking): ?>
      <display users profile in html>
      <?php endif; ?>




    </div>



  </body>
</html>
