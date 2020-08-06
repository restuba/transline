<?php
    include("../config/db.php");
    if(isset($_POST['kirim'])){
        $kode = $_POST['trayek_kode'];
        $asal = $_POST['trayek_asal'];
        $tujuan = $_POST['trayek_tujuan'];
        $jam = $_POST['jam'];
        $harga = $_POST['harga'];

        $query = "INSERT INTO `tbtravel`(`trayek_kode`, `trayek_asal`, `trayek_tujuan`, `jam`, `harga`) VALUES (:kode,:asal,:tujuan,:jam,:harga)";
        $hasil = $db->prepare($query);
        $hasil->bindParam(":kode", $kode);
        $hasil->bindParam(":asal", $asal);
        $hasil->bindParam(":tujuan", $tujuan);
        $hasil->bindParam(":jam", $jam);
        $hasil->bindParam(":harga", $harga);

        try {
            $hasil->execute();
            header("location: daftartravel.php");
        } catch (Exception $e) {
            $errorMsg = "Terdapat Kesalahan Saat Menambah Data";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
     <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>

    <title>Transline Travel</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="header">
   <div class="top-header">
     <div class="container">
       <div class="logo">
          <a href="index.php"><img src="../images/logo.png"/></a>
       </div>
       <span class="menu"> </span>
       <div class="m-clear"></div>
       <div class="top-menu">
        <ul>
           <<li><a class="Scroll" href="index.php">HOME</a></li>
           <li class="active"><a href="daftartravel.php">TRAYEK</a></li>
           <li><a class="Scroll" href="daftarpesan.php">TRANSAKSI</a></li>
    
     
 
           <li><a class="scroll" href="contact.php">CONTACT US</a></li>
        </ul>
        <script>
          $("span.menu").click(function(){
            $(".top-menu ul").slideToggle(200);
          });
        </script>
       </div>
       <div class="clearfix"></div>
      </div>
    </div>
    <br/>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Trayek
                        </div>
                        <div class="panel-body">
                            <?php
                                if(isset($errorMsg)){
                                        echo "<div class='alert alert-danger' role='alert'>" . $errorMsg ."</div>";
                                }
                            ?>
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Trayek</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="trayek_kode"class="form-control" placeholder="Kode Trayek">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Asal</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="trayek_asal" class="form-control" placeholder="Asal">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tujuan</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="trayek_tujuan" class="form-control" placeholder="Tujuan">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jam</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="jam" class="form-control" placeholder="Jam">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="harga" class="form-control" placeholder="Harga">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="kirim" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"></span>  Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</body>

</html>
