<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "pabmbugm2021";

   try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //check availability
      if (isset($_POST['nim_check'])) {
         $sqlnim = $conn->prepare("SELECT * FROM form WHERE nim = :nim");
         $sqlnim->bindParam(':nim', $nim);
         $nim = $_POST['nim'] ?? '';
         $sqlnim->execute();
         $results = $sqlnim->rowCount();
         echo $results;
         echo $nim;
         if ($results > 0) {
            echo "pabmbugmnimtaken";	
         }else{
            echo "pabmbugmnimavailable";
         }
         exit ();
      }
      if (isset($_POST['email_check'])) {
         $sqlemail = $conn->prepare("SELECT * FROM form WHERE email = :email");
         $sqlemail->bindParam(':email', $email);
         $email = $_POST['email'] ?? '';
         $sqlemail->execute();
         $results = $sqlemail->rowCount();
         echo $results;
         echo $email;
         if ($results > 0) {
            echo "pabmbugmemailtaken";	
         }else{
            echo "pabmbugmemailavailable";
         }
         exit ();
      }
      if (isset($_POST['interview_check'])) {
         $sqlinterview = $conn->prepare("SELECT * FROM form WHERE interview = :interview");
         $sqlinterview->bindParam(':interview', $interview);
         $interview = $_POST['interview'] ?? '';
         $sqlinterview->execute();
         $results = $sqlinterview->rowCount();
         // HARI SENEN
         if ($interview == 'Senin, 30 Agustus 2021 Sesi 1') {
            if ($results >= 0){echo "pabmbugmjadwalinterviewA1penuh";}
            else {echo "pabmbugmjadwalinterviewA1tersedia";}}
         else if ($interview == 'Senin, 30 Agustus 2021 Sesi 2') {
            if ($results >= 15){echo "pabmbugmjadwalinterviewA2penuh";}
            else {echo "pabmbugmjadwalinterviewA2tersedia";}}
         // else if ($interview == 'Senin, 21 September 2020 Pukul 16.40 - 17.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewA3penuh";}
         //    else {echo "pabmbugmjadwalinterviewA3tersedia";}}
         // else if ($interview == 'Senin, 21 September 2020 Pukul 17.00 - 17.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewA4penuh";}
         //    else {echo "pabmbugmjadwalinterviewA4tersedia";}}
         // else if ($interview == 'Senin, 21 September 2020 Pukul 17.20 - 17.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewA5penuh";}
         //    else {echo "pabmbugmjadwalinterviewA5tersedia";}}
         // else if ($interview == 'Senin, 21 September 2020 Pukul 17.40 - 18.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewA6penuh";}
         //    else {echo "pabmbugmjadwalinterviewA6tersedia";}}
         // else if ($interview == 'Senin, 21 September 2020 Pukul 19.00 - 19.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewA7penuh";}
         //    else {echo "pabmbugmjadwalinterviewA7tersedia";}}
         // else if ($interview == 'Senin, 21 September 2020 Pukul 19.20 - 19.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewA8penuh";}
         //    else {echo "pabmbugmjadwalinterviewA8tersedia";}}
         // else if ($interview == 'Senin, 21 September 2020 Pukul 19.40 - 20.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewA9penuh";}
         //    else {echo "pabmbugmjadwalinterviewA9tersedia";}}
         // HARI Selasa
         if ($interview == 'Selasa, 31 Agustus 2021 Sesi 1') {
            if ($results >= 15){echo "pabmbugmjadwalinterviewB1penuh";}
            else {echo "pabmbugmjadwalinterviewB1tersedia";}}
         else if ($interview == 'Selasa, 31 Agustus 2021 Sesi 2') {
            if ($results >= 15){echo "pabmbugmjadwalinterviewB2penuh";}
            else {echo "pabmbugmjadwalinterviewB2tersedia";}}
         // else if ($interview == 'Selasa, 22 September 2020 Pukul 16.40 - 17.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewB3penuh";}
         //    else {echo "pabmbugmjadwalinterviewB3tersedia";}}
         // else if ($interview == 'Selasa, 22 September 2020 Pukul 17.00 - 17.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewB4penuh";}
         //    else {echo "pabmbugmjadwalinterviewB4tersedia";}}
         // else if ($interview == 'Selasa, 22 September 2020 Pukul 17.20 - 17.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewB5penuh";}
         //    else {echo "pabmbugmjadwalinterviewB5tersedia";}}
         // else if ($interview == 'Selasa, 22 September 2020 Pukul 17.40 - 18.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewB6penuh";}
         //    else {echo "pabmbugmjadwalinterviewB6tersedia";}}
         // else if ($interview == 'Selasa, 22 September 2020 Pukul 19.00 - 19.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewB7penuh";}
         //    else {echo "pabmbugmjadwalinterviewB7tersedia";}}
         // else if ($interview == 'Selasa, 22 September 2020 Pukul 19.20 - 19.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewB8penuh";}
         //    else {echo "pabmbugmjadwalinterviewB8tersedia";}}
         // else if ($interview == 'Selasa, 22 September 2020 Pukul 19.40 - 20.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewB9penuh";}
         //    else {echo "pabmbugmjadwalinterviewB9tersedia";}}
         // HARI Rabu
         if ($interview == 'Rabu, 1 September 2021 Sesi 1') {
            if ($results >= 15){echo "pabmbugmjadwalinterviewC1penuh";}
            else {echo "pabmbugmjadwalinterviewC1tersedia";}}
         else if ($interview == 'Rabu, 1 September 2021 Sesi 1') {
            if ($results >= 15){echo "pabmbugmjadwalinterviewC2penuh";}
            else {echo "pabmbugmjadwalinterviewC2tersedia";}}
         // else if ($interview == 'Rabu, 7 Oktober 2020 Pukul 16.40 - 17.00 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewC3penuh";}
         //    else {echo "pabmbugmjadwalinterviewC3tersedia";}}
         // else if ($interview == 'Rabu, 7 Oktober 2020 Pukul 17.00 - 17.20 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewC4penuh";}
         //    else {echo "pabmbugmjadwalinterviewC4tersedia";}}
         // else if ($interview == 'Rabu, 7 Oktober 2020 Pukul 17.20 - 17.40 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewC5penuh";}
         //    else {echo "pabmbugmjadwalinterviewC5tersedia";}}
         // else if ($interview == 'Rabu, 7 Oktober 2020 Pukul 17.40 - 18.00 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewC6penuh";}
         //    else {echo "pabmbugmjadwalinterviewC6tersedia";}}
         // else if ($interview == 'Rabu, 7 Oktober 2020 Pukul 19.00 - 19.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewC7penuh";}
         //    else {echo "pabmbugmjadwalinterviewC7tersedia";}}
         // else if ($interview == 'Rabu, 7 Oktober 2020 Pukul 19.20 - 19.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewC8penuh";}
         //    else {echo "pabmbugmjadwalinterviewC8tersedia";}}
         // else if ($interview == 'Rabu, 7 Oktober 2020 Pukul 19.40 - 20.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewC9penuh";}
         //    else {echo "pabmbugmjadwalinterviewC9tersedia";}}
         // HARI Kamis
         if ($interview == 'Kamis, 2 September 2021 Sesi 1') {
            if ($results >= 15){echo "pabmbugmjadwalinterviewD1penuh";}
            else {echo "pabmbugmjadwalinterviewD1tersedia";}}
         else if ($interview == 'Kamis, 2 September 2021 Sesi 2') {
            if ($results >= 15){echo "pabmbugmjadwalinterviewD2penuh";}
            else {echo "pabmbugmjadwalinterviewD2tersedia";}}
         // else if ($interview == 'Kamis, 8 Oktober 2020 Pukul 16.40 - 17.00 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewD3penuh";}
         //    else {echo "pabmbugmjadwalinterviewD3tersedia";}}
         // else if ($interview == 'Kamis, 8 Oktober 2020 Pukul 17.00 - 17.20 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewD4penuh";}
         //    else {echo "pabmbugmjadwalinterviewD4tersedia";}}
         // else if ($interview == 'Kamis, 8 Oktober 2020 Pukul 17.20 - 17.40 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewD5penuh";}
         //    else {echo "pabmbugmjadwalinterviewD5tersedia";}}
         // else if ($interview == 'Kamis, 8 Oktober 2020 Pukul 17.40 - 18.00 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewD6penuh";}
         //    else {echo "pabmbugmjadwalinterviewD6tersedia";}}
         // else if ($interview == 'Kamis, 8 Oktober 2020 Pukul 19.00 - 19.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewD7penuh";}
         //    else {echo "pabmbugmjadwalinterviewD7tersedia";}}
         // else if ($interview == 'Kamis, 8 Oktober 2020 Pukul 19.20 - 19.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewD8penuh";}
         //    else {echo "pabmbugmjadwalinterviewD8tersedia";}}
         // else if ($interview == 'Kamis, 8 Oktober 2020 Pukul 19.40 - 20.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewD9penuh";}
         //    else {echo "pabmbugmjadwalinterviewD9tersedia";}}
         // HARI Jumat
         if ($interview == 'Jumat, 3 September 2021 Sesi 1') {
            if ($results >= 15){echo "pabmbugmjadwalinterviewE1penuh";}
            else {echo "pabmbugmjadwalinterviewE1tersedia";}}
         else if ($interview == 'Jumat, 3 September 2021 Sesi 2') {
            if ($results >= 15){echo "pabmbugmjadwalinterviewE2penuh";}
            else {echo "pabmbugmjadwalinterviewE2tersedia";}}
         // else if ($interview == 'Jumat, 9 Oktober 2020 Pukul 16.40 - 17.00 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewE3penuh";}
         //    else {echo "pabmbugmjadwalinterviewE3tersedia";}}
         // else if ($interview == 'Jumat, 9 Oktober 2020 Pukul 17.00 - 17.20 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewE4penuh";}
         //    else {echo "pabmbugmjadwalinterviewE4tersedia";}}
         // else if ($interview == 'Jumat, 9 Oktober 2020 Pukul 17.20 - 17.40 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewE5penuh";}
         //    else {echo "pabmbugmjadwalinterviewE5tersedia";}}
         // else if ($interview == 'Jumat, 9 Oktober 2020 Pukul 17.40 - 18.00 WIB') {
         //    if ($results >= 8){echo "pabmbugmjadwalinterviewE6penuh";}
         //    else {echo "pabmbugmjadwalinterviewE6tersedia";}}
         // else if ($interview == 'Jumat, 9 Oktober 2020 Pukul 19.00 - 19.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewE7penuh";}
         //    else {echo "pabmbugmjadwalinterviewE7tersedia";}}
         // else if ($interview == 'Jumat, 9 Oktober 2020 Pukul 19.20 - 19.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewE8penuh";}
         //    else {echo "pabmbugmjadwalinterviewE8tersedia";}}
         // else if ($interview == 'Jumat, 9 Oktober 2020 Pukul 19.40 - 20.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewE9penuh";}
         //    else {echo "pabmbugmjadwalinterviewE9tersedia";}}
         // HARI Sabtu
         if ($interview == 'Sabtu, 4 September 2021 Sesi 1') {
            if ($results >= 20){echo "pabmbugmjadwalinterviewF1penuh";}
            else {echo "pabmbugmjadwalinterviewF1tersedia";}}
         else if ($interview == 'Sabtu, 4 September 2021 Sesi 2') {
            if ($results >= 20){echo "pabmbugmjadwalinterviewF2penuh";}
            else {echo "pabmbugmjadwalinterviewF2tersedia";}}
         // else if ($interview == 'Sabtu, 10 Oktober 2020 Pukul 16.40 - 17.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewF3penuh";}
         //    else {echo "pabmbugmjadwalinterviewF3tersedia";}}
         // else if ($interview == 'Sabtu, 10 Oktober 2020 Pukul 17.00 - 17.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewF4penuh";}
         //    else {echo "pabmbugmjadwalinterviewF4tersedia";}}
         // else if ($interview == 'Sabtu, 10 Oktober 2020 Pukul 17.20 - 17.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewF5penuh";}
         //    else {echo "pabmbugmjadwalinterviewF5tersedia";}}
         // else if ($interview == 'Sabtu, 10 Oktober 2020 Pukul 17.40 - 18.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewF6penuh";}
         //    else {echo "pabmbugmjadwalinterviewF6tersedia";}}
         // else if ($interview == 'Sabtu, 10 Oktober 2020 Pukul 19.00 - 19.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewF7penuh";}
         //    else {echo "pabmbugmjadwalinterviewF7tersedia";}}
         // else if ($interview == 'Sabtu, 10 Oktober 2020 Pukul 19.20 - 19.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewF8penuh";}
         //    else {echo "pabmbugmjadwalinterviewF8tersedia";}}
         // else if ($interview == 'Sabtu, 10 Oktober 2020 Pukul 19.40 - 20.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewF9penuh";}
         //    else {echo "pabmbugmjadwalinterviewF9tersedia";}}
         // HARI Minggu
         if ($interview == 'Minggu, 5 September 2021 Sesi 1') {
            if ($results >= 20){echo "pabmbugmjadwalinterviewG1penuh";}
            else {echo "pabmbugmjadwalinterviewG1tersedia";}}
         else if ($interview == 'Minggu, 5 September 2021 Sesi 2') {
            if ($results >= 20){echo "pabmbugmjadwalinterviewG2penuh";}
            else {echo "pabmbugmjadwalinterviewG2tersedia";}}
         // else if ($interview == 'Minggu, 11 Oktober 2020 Pukul 16.40 - 17.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewG3penuh";}
         //    else {echo "pabmbugmjadwalinterviewG3tersedia";}}
         // else if ($interview == 'Minggu, 11 Oktober 2020 Pukul 17.00 - 17.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewG4penuh";}
         //    else {echo "pabmbugmjadwalinterviewG4tersedia";}}
         // else if ($interview == 'Minggu, 11 Oktober 2020 Pukul 17.20 - 17.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewG5penuh";}
         //    else {echo "pabmbugmjadwalinterviewG5tersedia";}}
         // else if ($interview == 'Minggu, 11 Oktober 2020 Pukul 17.40 - 18.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewG6penuh";}
         //    else {echo "pabmbugmjadwalinterviewG6tersedia";}}
         // else if ($interview == 'Minggu, 11 Oktober 2020 Pukul 19.00 - 19.20 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewG7penuh";}
         //    else {echo "pabmbugmjadwalinterviewG7tersedia";}}
         // else if ($interview == 'Minggu, 11 Oktober 2020 Pukul 19.20 - 19.40 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewG8penuh";}
         //    else {echo "pabmbugmjadwalinterviewG8tersedia";}}
         // else if ($interview == 'Minggu, 11 Oktober 2020 Pukul 19.40 - 20.00 WIB') {
         //    if ($results >= 14){echo "pabmbugmjadwalinterviewG9penuh";}
         //    else {echo "pabmbugmjadwalinterviewG9tersedia";}}
         exit ();
      }  
   } 
   catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      }
   // $conn = null;
?>