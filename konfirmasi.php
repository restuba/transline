<?php
    include("config/db.php");

    if(isset($_POST['kirim'])){
        $kode = $_POST['kode'];
       
        $pengirim = $_POST['pengirim'];

        $query = 'SELECT kursi FROM tbpesan WHERE kode_transaksi = :kode AND waktupesan > DATE_SUB(NOW(), INTERVAL 1 HOUR) AND konfirmasi=0';
        $hasil = $db->prepare($query);
        $hasil->bindParam(":kode", $kode);
        $hasil->execute();
        if($hasil->rowCount() == 0){
            $pesan = "<h2>Kode Pemesanan Tidak Valid atau Sudah Tidak Berlaku</h2>";
        }else {
            $query = "INSERT INTO `tbkonfirmasi`(`kode_transaksi`, `pengirim`) VALUES (:kode,  :pengirim)";
            $hasil = $db->prepare($query);
            $hasil->bindParam(":kode", $kode);
          
            $hasil->bindParam(":pengirim", $pengirim);
            $hasil->execute();

            //Update Pemesanan
            $query = "UPDATE tbpesan SET konfirmasi = 1 WHERE kode_transaksi = :kode";
            $hasil = $db->prepare($query);
            $hasil->bindParam(":kode", $kode);
            $hasil->execute();

            $pesan = "<h2 center>Terima kasih atas kepercayaan anda untuk menggunakan layanan kami.</h2>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>

    <title>Transline Travel</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet"> -->
     
</head>

<body>
<?php
  include 'template/header.php';
?>
<br>
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Konfirmasi Pembayaran
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="kode" class="form-control" placeholder="Kode Pemesanan">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pemesan</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="pengirim" class="form-control" placeholder="Pemesan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="kirim" class="btn btn-warning">Konfirmasi  <span class="glyphicon glyphicon-open-file"</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    Untuk pembatalan kunjungi PO Transline terdekat, dengan biaya kembali 75%
                </div>
                <div class="col-md-6">
                    <?php
                        if(isset($pesan)){
                            echo $pesan;
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- /.container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>
