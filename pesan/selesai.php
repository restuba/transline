<?php
    $kursi = $_POST['kursi'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    $trayek_kode = $_POST['trayek_kode'];
    $tanggal = $_POST['tanggal'];
    $kodeTransaksi = time() . $trayek_kode;


    //Ambil harga total
    $query = "SELECT harga FROM tbtravel WHERE trayek_kode = :kode";
    $hasil = $db->prepare($query);
    $hasil->bindParam(":kode", $trayek_kode);
    $hasil->execute();
    $data = $hasil->fetch();
    $totalHarga = sizeof($kursi) * $data['harga'];

    $query = "INSERT INTO `tbpesan`(
        `kode_transaksi`,
        `trayek_kode`,
        `tanggal`,
        `nama`,
        `alamat`,
        `nohp`,
        `email`,
        `kursi`,
        `konfirmasi`)
        VALUES (:kode, :trayek_kode, :tanggal, :nama, :alamat, :hp, :email, :kursi, 0)";

    for($i = 0; $i<sizeof($kursi); $i++)
    {
        // echo "AA";
        $hasil = $db->prepare($query);
        $hasil->bindParam(":kode", $kodeTransaksi);
        $hasil->bindParam(":trayek_kode", $trayek_kode);
        $hasil->bindParam(":tanggal", $tanggal);

        $hasil->bindParam(":nama", $nama[$i]);
        $hasil->bindParam(":alamat", $alamat[$i]);
        $hasil->bindParam(":hp", $hp[$i]);
        $hasil->bindParam(":email", $email[$i]);
        $hasil->bindParam(":kursi", $kursi[$i]);
        $hasil->execute();
    }


?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Status tiket anda</h4>
           
            </div>
            <div class="panel-body">
             
                
                -Tiket yang anda pesan masih belum aktif, <br>untuk mengaktifkannya segera lakukan transfer sebesar Rp. <?php echo $totalHarga ?> ke <br>rekening Mandiri, 1370007345073 atas Jempol. <br>
                -Kemudian upload sekrup pembayaran ke <br>jempolsamparan@gmail.com untuk mendapatkan kode transaksi.<br>
               -Transaksi pembayaran hanya bisa dilakukan dalam waktu 5 jam.
            </div>
        </div>
    </div>
</div>
