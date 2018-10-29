<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dentist</title>
    <link type="text/css" rel="stylesheet" href="./dentist.css" />
    <link rel="icon" type="image/png" href="logo-16.png"/>
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
        <div class="col-4" id="current-page">
          <a href="#">Dentist</a>
        </div>
        <div class="col-4">
          <a href="reschedule.php">Reschedule</a>
        </div>

      </div>

      <?php

      @ $db = new mysqli('localhost', 'f31im', 'f31im', 'f31im');

      $query = "SELECT * from dentist;";
      $result = $db->query($query);

      if ($result) {
        if ($result->num_rows > 0){
          while($row = $result->fetch_assoc()) {
            echo '<form action="booking.php" method="GET" >';
            echo '<div class="doctor-card">';
            echo '<div class="col-1">';
            echo '';
            echo '</div>';
            echo '<div class="doctor">';
            echo '<img src='.$row["file_path"].' class=""/>';
            echo '</div>';
            echo '<div class="doctor-description">';
            echo '<h4>Dr. '.$row["name"].'</h4>';
            echo '<input type="hidden" name="name" value="';
            echo $row["name"];
            echo '" />';
            echo '<input type="hidden" name="id" value="';
            echo $row["id"];
            echo '" />';
            echo '<p>';
            echo 'Experience: '.$row["experience"].' years';
            echo '</p>';
            echo '<p class="background">';
            echo $row["background"];
            echo '</p>';
            echo '<p>';

            $sql = "SELECT tag.tag_name from tag inner join dentist_tag on dentist_tag.tag_id=tag.id where dentist_tag.dentist_id='".$row["id"]."';";
            $labels = $db -> query($sql);
            if ($labels -> num_rows > 0){
              while($label = $labels->fetch_assoc()){
                echo '<label class="specialisation">'.$label["tag_name"].'</label>';
              }
            }

            echo '</p>';
            echo '</div>';
            echo '<div class="col-3">';
            echo '<button type="submit" class="book-now-button">Book Doctor</button>';
            echo '</div>';
            echo '</div>';
            echo'</form>';

          }
        }
      } else {
          echo "An error has occurred.  Dentists not loaded.";
      }

      $db->close();

       ?>
      <!-- <div class="doctor-card">
        <div class="col-1">

        </div>
        <div class="doctor">
          <img src="doctor1.jpg" class=""/>
        </div>
        <div class="doctor-description">
          <h4>Dr. Amelia Tham</h4>
          <p>
            Experience: 5 years
          </p>
          <p>
            <label class="specialisation">Child Care</label>
          </p>
        </div>
        <div class="col-3">
          <button class="book-now-button">Book Doctor</button>
        </div>
      </div>
      <div class="doctor-card">
        <div class="col-1">

        </div>
        <div class="doctor">
          <img src="doctor2.jpg" class=""/>
        </div>
        <div class="doctor-description">
          <h4>Dr. Abdul Rashid</h4>
          <p>
            Experience: 10 years
          </p>
          <p>
            <label class="specialisation">Orthodontist</label>
          </p>
        </div>
        <div class="col-3">
          <button class="book-now-button">Book Doctor</button>
        </div>
      </div>
      <div class="doctor-card">
        <div class="col-1">

        </div>
        <div class="doctor">
          <img src="doctor3.jpg" class=""/>
        </div>
        <div class="doctor-description">
          <h4>Dr. Cecilia Augustine</h4>
          <p>
            Experience: 20 years
          </p>
          <p>
            <label class="specialisation">Braces</label>
            <label class="specialisation">Dental Implants</label>
            <label class="specialisation">Teeth Whitening</label>
        </div>
        <div class="col-3">
          <button class="book-now-button">Book Doctor</button>
        </div>
      </div> -->
    </div>



  </body>
</html>
