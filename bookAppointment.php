<?php
// $randevular = array();
// $start = "09:00";
// $end = "20:00";
// $day = ["pazartesi","salı", "çarşamba","perşembe"];

// function build_list($start, $end, $days){
//   global $day, $start,$end, $randevular;

//   if (in_array($day, $days) && in_array($start,$end, $hours)) { 
//       if(!in_array(array($day, $hour), $randevular)){ 
//           $randevular[] = array($day, $hour);
//           $hours = array_diff($hours, array($hour)); 
//           echo "$hour saatinde $day tarihinde randevu başarıyla alındı \n";

//       }
//       elseif (in_array(array($day, $hour), $randevular)) {
//           echo "Üzgünüz, $hour saatinde $day tarihindeki randevu daha önceden alınmıştır \n"; 
//       }
//   }
//   else {
//       echo "geçersiz gün veya saat \n";
//   }

// }

// $alinabilir_randevu=["salı:09.00-09.30","salı:09.30-10.00"];
// print_r($randevular);

$start = "09:00";
$end = "20:00";
$days = ["pazartesi","salı","çarşamba","perşembe","cuma"];

$randevular = create_appointments($start, $end, $days);
echo "<pre>";
print_r($randevular);
echo "</pre>";
function create_appointments($start, $end, $days) {
  $randevular = array();

  foreach ($days as $day) {
      $hours = array();
      $current_time = strtotime($start);

      while ($current_time <= strtotime($end)) {
          $hour = date("H:i", $current_time);
          $day = date("w", $current_time);//burayla ilgilen
          $hours[] = $hour;
          $current_time = strtotime("+30 minutes", $current_time);
      }

      $randevular[$day] = $hours;
  }

  return $randevular;
}

?>
