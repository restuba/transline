<?php
    include ('../config/db.php');

    if(isset($_GET['kode'])){
        $query = "DELETE FROM tbtravel WHERE trayek_kode = :kode";
        $hasil = $db->prepare($query);
        $hasil->bindParam(":kode", $_GET['kode']);
        $hasil->execute();

        header("location:daftartravel.php");
    }
 ?>
