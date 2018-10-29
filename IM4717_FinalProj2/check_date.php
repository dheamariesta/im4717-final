<?php
$date = $_POST["date"];
$id = $_POST["id"];
@ $db = new mysqli('localhost', 'f31im', 'f31im', 'f31im');

$query = "SELECT appt_time from booking where dentist_id = '".$id."' and appt_date = '".$date."';";
$result = $db->query($query);

$appt_time = array();
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    array_push($appt_time, $row["appt_time"] );
  }
}
$jsonData = json_encode($appt_time);
echo($jsonData);

$db->close();

 ?>
