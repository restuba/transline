<?php
    $host = "localhost";
    $dbname = "dbTiket"; //Nama database
    $user = "root"; //Username database biasane root
    $pass = ""; //Password database, nek nganggo wampp atau xampp biasane kosong
    try {
        // Koneksi ke database di simpan ke variable $db
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        //Koneksi error
        echo "Koneksi database error, check file config/db.php. Detail:";
        echo $e->getMessage();
    }
?>
