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
$result = $db->query($query);

if ($result) {
    echo "Booking is successful";
} else {
    echo "An error has occurred.  The item was not added.";
}


$db->close();

 ?>
