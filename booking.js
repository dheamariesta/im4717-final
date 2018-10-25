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

function namevalidate() {
  var name = document.getElementById('name').value;
  var letterNumber = /^[0-9a-zA-Z\s]+$/;
  if (name.match(letterNumber)) {
    return true;
  }
  else {
    alert("Please enter your name")
    return false;
  }
}

function emailvalidate() {
  var email = document.getElementById('email').value;
  var add = email.indexOf('@');
  if ( add < 0 ) {
    alert("Please include a '@' in your email")
    return false;
  } else {
    var split = email.split("@");
    var domain = split[1];
    var dot = domain.indexOf('.');
    if(dot < 0) {
      alert("Please include address extensions")
      return false;
    }
    var domainextension = domain.split(".");
    if (domainextension[domainextension.length - 1].length < 2 || domainextension[domainextension.length - 1].length > 3) {
      alert("Your last extension must include 2 to 3 characters")
      return false;
    }
  }
}

function contactvalidate() {
  var contact = document.getElementById('contact').value;
  if (contact.length != 8 ) {
    alert("Please enter a valid contact number")
    return false;
  } else {
    return true;
  }
}

function timeslotvalidate() {
  /*if ($("input[type=radio]:checked").length < 0) {
    alert("Please choose a time slot");
    return false;
  }*/
  var radios = document.getElementsByName("time-slot");
  var checked = false;

     for (var i = 0, len = radios.length; i < len; i++) {
          if (radios[i].checked) {
              checked = true;
          }
     }
     if (!checked) {
       alert("Please choose a time slot")
       return false;
     }
}

function datevalidate() {
  var selectedDate = document.querySelector('input[name="appt-date"]').value;
  var date = new Date(selectedDate);
  var now = new Date();
  if (date < now) {
    alert("Date must be in the future")
    return false;
  }
}
