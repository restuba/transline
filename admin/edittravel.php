<?php
    include("../config/db.php");
    if(isset($_GET['kode'])){
        if(isset($_POST['kirim'])){
            $asal = $_POST['trayek_asal'];
            $tujuan = $_POST['trayek_tujuan'];
            $jam = $_POST['jam'];
            $harga = $_POST['harga'];

            $query = "UPDATE tbtravel SET trayek_asal = :asal, trayek_tujuan = :tujuan, jam = :jam, harga = :harga WHERE trayek_kode = :kode";
            $hasil = $db->prepare($query);
            $hasil->bindParam(":kode", $_GET['kode']);
            $hasil->bindParam(":asal", $asal);
            $hasil->bindParam(":tujuan", $tujuan);
            $hasil->bindParam(":jam", $jam);
            $hasil->bindParam(":harga", $harga);

            $hasil->execute();
        }

        $query = "SELECT * FROM tbtravel WHERE trayek_kode = :kode";
        $hasil = $db->prepare($query);
        $hasil->bindParam(":kode", $_GET['kode']);
        $hasil->execute();
        $data = $hasil->fetch();

        $kode = $data['trayek_kode'];
        $asal = $data['trayek_asal'];
        $tujuan = $data['trayek_tujuan'];
        $jam = $data['jam'];
        $harga = $data['harga'];
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

    <title>PO. BUS BERSAHABAT</title>

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
    
     
 
           <li><a class="scroll" href="about.php">ABOUT US</a></li>
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
                           
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Trayek</label>
                                    <div class="col-sm-10">
                                        <input required disabled type="text" name="trayek_kode" value="<?php echo $kode;?>"class="form-control" placeholder="Kode Trayek">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Asal</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="trayek_asal" value="<?php echo $asal;?>"class="form-control" placeholder="Asal">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tujuan</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="trayek_tujuan" value="<?php echo $tujuan;?>"class="form-control" placeholder="Tujuan">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jam</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="jam" value="<?php echo $jam;?>"class="form-control" placeholder="Jam">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="harga" value="<?php echo $harga;?>"class="form-control" placeholder="Harga">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="kirim" class="btn btn-primary">Simpan</button>
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
