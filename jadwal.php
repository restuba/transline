<?php
    // Lampirkan file config/db.php
    include 'config/db.php';


    //Ambil data unik untuk kolom trayek asal, yang nantinya untuk membuat input select
    $query = "SELECT DISTINCT trayek_asal FROM tbtravel";
    $hasil = $db->prepare($query);
    $hasil->execute();
    $asal_list = $hasil->fetchAll();


    //Ambil data unik untuk kolom trayek tujuan, yang nantinya untuk membuat input select
    $query = "SELECT DISTINCT trayek_tujuan FROM tbtravel";
    $hasil = $db->prepare($query);
    $hasil->execute();
    $tujuan_list = $hasil->fetchAll();


    $tanggal = Date('Y-m-d H:i:s'); //Default tanggal
    $jam= Date('H:i:s');

    // Kalau ada data dikirim, ambil daftar bus sesuai trayek asal dan trayek tujuan
    if (isset($_POST['kirim'])) {
        // Simpan request ke varable
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $tanggal = $_POST['tanggal'];
     

        //Query untuk mengambil daftar bus sesuai asal dan tujuan
        $query = 'SELECT * FROM tbtravel WHERE trayek_asal = :asal AND trayek_tujuan = :tujuan';
        $hasil = $db->prepare($query);

        //ganti isi :asal dan :tujuan di variable query dengan isi variable $asal dan $tujuan yang telah diisi
        $hasil->bindParam(':asal', $asal);
        $hasil->bindParam(':tujuan', $tujuan);

        //Jalankan perintah sql
        $hasil->execute();

        if ($hasil->rowCount() > 0) {
            //Ambil semua hasil simpan ke variable data
            $data = $hasil->fetchAll();
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
<body>
<?php
  include 'template/header.php';
?>
       
        <div class="container">

    
            <form class="form-inline" action="jadwal.php" method="post">
                    <div class="online_reservation">
                   
                    <div class="booking_room">
                    <div class="reservation">
                    <ul>
                    <div class="form-group" >
                        <h5 center>Kota Asal</h5>
                      
                        <select required class="form-control" name="asal">
                            <option value="" disabled selected>--Pilih asal keberangkatan--</option>
                             <?php
                            foreach ($asal_list as $key) {
                                if($asal == $key['trayek_asal']){
                                    echo "<option selected value='".$key['trayek_asal']."'>".$key['trayek_asal']."</option>";
                                }else{
                                    echo "<option value='".$key['trayek_asal']."'>".$key['trayek_asal']."</option>";
                                }
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <style type="text/css">
                        .form-group {
                          margin-left: 100px;  
                        }
                    </style>
                        <h5>Kota Tujuan</h5>
                        <select required class="form-control" name="tujuan">
                            <option value="" disabled selected>---- Pilih tujuan ---</option>
                           <?php
                            foreach ($tujuan_list as $key) {
                                if($tujuan == $key['trayek_tujuan']){
                                    echo "<option selected value='".$key['trayek_tujuan']."'>".$key['trayek_tujuan']."</option>";
                                }else {
                                    echo "<option value='".$key['trayek_tujuan']."'>".$key['trayek_tujuan']."</option>";
                                }
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <style type="text/css">
                      .form-group {
                        margin-right: -70px; 
                      }
                    </style>

                        <h5>Tanggal</h5>
                        <input required name="tanggal" type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" placeholder="Tanggal">
                    </div>
              
                    <div class="cari">
                    <button name="kirim" type="submit" class="btn btn-warning">Cari Tiket</button>
                    </div>
                </form>
            </div>
            </ul>
            </div>
            </div>

            <br/>
            <div class="tabel"><style type="text/css">
                .tabel {
                    position: absolute;
                    width: 80%;
                    margin-top: 5em;
                }

            </style>
            <table class="table table-bordered">
                <thead>
                    <th>Kode Trayek</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Jam</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php
                        if (!isset($data)) {
                         
                            echo '<tr><td colspan=6>Tidak Ada Data</td></tr>';
                        } else {
                            //Datanya ada
                            foreach ($data as $key) {
                                echo '<tr>';
                                echo '<td>'.$key['trayek_kode'].'</td>';
                                echo '<td>'.$key['trayek_asal'].'</td>';
                                echo '<td>'.$key['trayek_tujuan'].'</td>';
                                echo '<td>'.$key['jam'].'</td>';
                                echo '<td>'.$key['harga'].'</td>';
                                echo "<td>
                                        <form action='pesan.php' method='post'>
                                            <input type='hidden' name='tanggal' value='".$tanggal."'>
                                            <input type='hidden' name='trayek_kode' value='".$key['trayek_kode']."'>
                                            <input type='submit' class='btn btn-warning' name='kirim' value='Pesan'>
                                    </td>";
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
           
</body>
</html>
