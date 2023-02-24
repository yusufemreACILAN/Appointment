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



/////////////////////////////////////////*********************randevu alma*************************** */

$start = "09:00";
$end = "20:00";
$days = ["pazartesi","salı","çarşamba","perşembe","cuma"];
// $kuafor= ["ahmet","mehmet","yasin"];



// İlk olarak, randevuları saklamak için boş bir dizi oluşturuyoruz
$randevular = [];

// Kuaför çalışanlarını, çalışma günlerini ve çalışma saatlerini saklamak için bir dizi oluşturuyoruz
$personeller = [
    [
        'isim' => 'Ahmet',
        'days' => ['pazartesi', 'çarşamba', 'cuma'],
        'start' => '10:00',
        'end' => '18:00',
    ],
    [
        'isim' => 'yasin',
        'days' => ['salı', 'perşembe', 'cumartesi'],
        'start' => '09:00',
        'end' => '17:00',
    ],
];

// müşterinin randevu almak istediği tarihi alıyor
$tarih = '25 şubat 2023';

// tarihten günü çıkarıyor
$days =(date('l', strtotime($tarih)));

// müsait personelleri tutmak için boş bir dizi oluşturdum
$musait_personeller = [];

// personellerin çalıştığı günler arasında müşterinin istediği gün var mı kontrol ediyoruz
foreach ($personeller as $personel) {
    if (in_array($days, $personel['days'])) {
        // eğer müşterinin istediği gün çalışanların arasında varsa o personelin müsait saatlerini kontrol ediliyor
        $musait_saatler = [];
        $start = strtotime($personel['start']);
        $end = strtotime($personel['end']);
        $saatler = range($start, $end, 60 * 30); // 30 dakika aralıklarla saatleri listeleniyor burda

        // personelin daha önceden aldığı randevuları kontrol ediyoruz ve müsait saatler listesine sadece müsait saatleri ekliyoruz
        foreach ($saatler as $saat) {
            $tarih_ve_saat = date('Y-m-d H:i:s', $saat);
            if (!in_array($tarih_ve_saat, $randevular)) {
                $musait_saatler[] = date('H:i', $saat);
            }
        }

        // eğer personelin müsait saatleri varsa müsait personeller listesine ekliyor
        if (!empty($musait_saatler)) {
            $musait_personeller[] = [
                'isim' => $personel['isim'],
                'saatler' => $musait_saatler,
            ];
        }
    }
}

// eğer müsait personel yoksa kullanıcıya uygun bir personel bulunamadığını söylüyor
if (empty($musait_personeller)) {
    echo 'üzgünüz, müsait personel bulunamadı.';
}   else {
  echo "geçersiz tarih";
}



//////////////////////////////////////*********** *///////////////////////////////////////////////


// $randevular = create_appointments($start, $end, $days);
// echo "<pre>";
// print_r($randevular);
// echo "</pre>";
// function create_appointments($start, $end, $days) {
//   $randevular = array();

//   foreach ($days as $day) {
//       $hours = array();
//       $current_time = strtotime($start);

//       while ($current_time <= strtotime($end)) {
//           $hour = date("H:i", $current_time);
//           $day = date("d:l:F", $current_time);
//           $hours[] = $hour;
//           $current_time = strtotime("+30 minutes", $current_time);
//       }

//       $randevular[$day] = $hours;
//   }

//   return $randevular;
// }
// function book($randevular){

// }

?>
