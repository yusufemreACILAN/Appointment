<?php

// Available days
$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");

// Available hours
$hours = array("9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00");

// Booked appointments
$booked = array();

// Function to book an appointment
function bookAppointment($day, $hour) {
    global $days, $hours, $booked;

    // Check if the day and hour are available
    if (in_array($day, $days) && in_array($hour, $hours)) {
        // Check if the appointment is not already booked
        if (!in_array(array($day, $hour), $booked)) {
            // Book the appointment
            $booked[] = array($day, $hour);
            // Remove the hour from the available hours
            $hours = array_diff($hours, array($hour));
            echo "Appointment booked successfully at $hour on $day \n";
        } else {
            echo "Sorry, the appointment at $hour on $day is already booked \n";
        }
    } else {
        echo "Invalid day or hour \n";
    }
}

bookAppointment("Monday", "9:00");
bookAppointment("Monday", "9:00");
bookAppointment("Tuesday", "9:00");
bookAppointment("Wednesday", "10:00");
bookAppointment("Invalid", "Invalid");



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  
$days = array("pazartesi", "sali", "carsamba", "persembe", "cuma");
$start_time = "09:00:00";
$end_time = "20:00:00";

function bookAppointment($day, $hour){
    global $days, $start_time, $end_time, $booked;
    
}




//alınan randevular
$booked = array();





?>