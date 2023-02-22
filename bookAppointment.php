<?php


  ///////////////////////////////////*****döngü start*** *////////////////////////////////////////
// $days = array("pazartesi", "sali", "carsamba", "persembe", "cuma");
// $start = strtotime("9:00:00"); // burda unix zaman yapısını kullandım 
// $end = strtotime("20:00:00");
// $arttir = 1800; // 30 dakikalık aralık olduğunu belirtiyor saniye cinsinden

// $current = $start;
// while($current <= $end) { // current değikeni end değikenine eşit ve küçük olana kadar devam eder

//     echo date("H:i:s", $current) . "\n"; // saatleri ekrana basmak için kullanılır h: saaat i: dakika s: saniye
//     $current += $arttir; // arttir ise her seferinde 30 dk üstüne ekleyerek gitesi için kullanılıyor currente bitene kadar
// }
////////////////////////////////////////////// döngü kısmı-finish //////////////////////////

//alınan randevular
$booked = array();

function bookAppointment($day, $loop_between_times){//funciton'ı buraya yazdım 
    global $days, $start_time, $end_time, $booked;

    if (in_array($day, $days) && in_array($hour, $hours) ) { //gün ve saatlere uygun olan randevu varmı diye kontrol sağlanacak olan yer
        if(!in_array(array($day, $hour), $booked)){ // önceden rezerve edilip edilmediğini kontorl ediyor eğer rezerve edilmemişse işleme devam ediyor
            $booked[] = array($day,$hour); //burda gün ve saat dizinlerini içeren bir dizi burda tutuyorum yapılan randevuları
            $hours = array_diff($hours, array($day)); //burda belirli gün için alınan randevuların saatelreini tutmaktadır yalnızca belirli gün için mevcut saatlerde randevu alınabilir
            echo "Booked successfully at $hour on $day \n";

        }
        else{
            echo "sorry, the appointment at $hour on $day is already bookeed \n"; //daha önceden alındı mesajı
        }
        else{
             echo "geçersiz day or hour \n";//geçersiz gün ve saat
        }
    }
    
}
///////////////////////////////function part///////////////////////////////////


$start_time = "09:00:00";
$end_time = "20:00:00";

function loop_between_times($start_time, $end_time, $interval) {
    global $start_time, $end_time;

    $start = strtotime($start_time);
    $end = strtotime($end_time);

    $current = $start;
    while($current <= $end) {
        
        echo date("H:i:s", $current) . "\n";
        $current += $interval;
    }
}
/////////////////////////////////////////////////////////////////////

?>