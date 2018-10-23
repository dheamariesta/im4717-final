function getDate(){
  var selectedDate = document.querySelector('input[name="appt-date"]').value;
  var doctorId = document.getElementById('doctor-id').value;
  $('#time-slot-table').empty();

  var template = `
  <tr>
    <td id = "0900-1000">
      0900 - 1000 <input type="radio" name="time-slot" value = "0900-1000"/>
    </td>
    <td id = "1500-1600">
      1500 - 1600 <input type="radio" name="time-slot" value = "1500-1600"/>
    </td>
  </tr>
  <tr>
    <td id = "1000-1100">
      1000 - 1100 <input type="radio" name="time-slot" value = "1000-1100"/>
    </td>
    <td id="1600-1700">
      1600 - 1700 <input type="radio" name="time-slot" value = "1600-1700"/>
    </td>
  </tr>
  <tr>
    <td id="1100-1200">
      1100 - 1200 <input type="radio" name="time-slot" value = "1100-1200"/>
    </td>
    <td id="1700-1800">
      1700 - 1800 <input type="radio" name="time-slot" value = "1700-1800"/>
    </td>
  </tr>
  <tr>
    <td id = "1400-1500">
      1400 - 1500 <input type="radio" name="time-slot" value = "1400-1500"/>
    </td>
    <td id="1800-1900">
      1800 - 1900 <input type="radio" name="time-slot" value = "1800-1900"/>
    </td>
  </tr>
  `

  $('#time-slot-table').append(template);
  $.post( "check_date.php", { date: selectedDate, id: doctorId })
  .done(function( data ) {
    var obj = JSON.parse(data);

    obj.forEach((slot) => {
      console.log(slot);
      document.getElementById(slot).style.backgroundColor = "#ccc";
      var inputRadio = document.getElementById(slot).childNodes[1];
      console.log(inputRadio);
      inputRadio.style.display = "none";
    });

  });
}

$( document ).ready(function() {
    getDate();
});
