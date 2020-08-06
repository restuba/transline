<?php
    include("../config/db.php");


    $query = "SELECT * FROM tbpesan WHERE 1";
    $parameter = array();
    if(isset($_POST['kirim'])){
        $tglberangkat = $_POST['tglberangkat'];
        $tglpesan = $_POST['tglpesan'];
        $konfirmasi = $_POST['konfirmasi'];

        if(isset($tglberangkat) && !empty($tglberangkat)){
            $query = $query . " AND tanggal = :tglberangkat";
            $parameter[':tglberangkat'] = $tglberangkat;
        }


        if(isset($tglpesan) && !empty($tglpesan)){
            $query = $query . " AND DATE(waktupesan) = :tglpesan";
            $parameter[":tglpesan"] = $tglpesan;
        }

        if(isset($konfirmasi) && !empty($konfirmasi)){
            $query = $query . " AND konfirmasi = :konfirmasi";
            $parameter[":konfirmasi"] = $konfirmasi;
        }

        // echo $query;
    }

    $hasil = $db->prepare($query);
    $hasil->execute($parameter);
    $data = $hasil->fetchAll();
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

       <title>Transline Travel</title>

       <!-- Bootstrap core CSS -->
       <link href="../css/bootstrap.min.css" rel="stylesheet">
       <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
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
           <li><a class="scroll" href="index.php">HOME</a></li>
           <li><a class="scroll" href="daftartravel.php">TRAYEK</a></li>
           <li class="active"><a href="daftarpesan.php">TRANSAKSI</a></li>
    
     
 
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
               <div class="panel panel-default">
                  <div class="panel-heading">Daftar Pemesanan</div>
                  <div class="panel-body">
                    <form class="form-inline" action="" method="post">
                        <div class="form-group">
                            <label>Tanggal Pemberangkatan</label>
                            <input type="date" class="form-control" name="tglberangkat" value="<?php echo isset($tglberangkat)?$tglberangkat:''?>"><style type="text/css">
                          input[type=date] {
                          border: none;
                          border-bottom: 2px solid #2A2E33;

}
        </style>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Pesan</label>
                            <input type="date" class="form-control" name="tglpesan" value="<?php echo isset($tglpesan)?$tglpesan:''?>">
                          </div>
                          <div class="form-group">
                            <label>Konfirmasi</label>
                            <select class="form-control" name="konfirmasi">
                                <option value="1">Sudah</option>
                                <option selected value="0">Belum</option>
                            </select>
                          </div>

                          <button type="submit" name="kirim" class="btn btn-default">Kirim</button><style type="text/css">
          button[type=submit] {
  background-color: #FFD700;

}
        </style>
                    </form>
                  </div>
                </div>
               <table class="table table-bordered">
                   <thead>
                       <th>Kode Transaksi</th>
                       <th>Kode Trayek</th>
                       <th>Tanggal Pemberangkatan</th>
                       <th>Waktu Pesan</th>
                       <th>Nama</th>
                       <th>Almat</th>
                       <th>No HP</th>
                       <th>Email</th>
                       <th>Kursi</th>
                       <th>Konfirmasi</th>
                   </thead>
                   <tbody>
                       <?php
                           //Datanya ada
                           foreach ($data as $key) {
                               echo '<tr>';
                               echo '<td>'.$key['kode_transaksi'].'</td>';
                               echo '<td>'.$key['trayek_kode'].'</td>';
                               echo '<td>'.$key['tanggal'].'</td>';
                               echo '<td>'.$key['waktupesan'].'</td>';
                               echo '<td>'.$key['nama'].'</td>';
                               echo '<td>'.$key['alamat'].'</td>';
                               echo '<td>'.$key['nohp'].'</td>';
                               echo '<td>'.$key['email'].'</td>';
                               echo '<td>'.$key['kursi'].'</td>';
                               echo $key['konfirmasi'] == '0'?'<td>Belum</td>':'<td>Sudah</td>';

                               echo '</tr>';
                           }
                       ?>
                   </tbody>
               </table>
           </div>
           <!-- /.container -->


           <!-- Bootstrap core JavaScript
           ================================================== -->
           <!-- Placed at the end of the document so the pages load faster -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
           <script src="../js/bootstrap.min.js"></script>
   </body>
</html>
