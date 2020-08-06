<?php
    include("config/db.php");

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


 ?>

<!doctype html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<link href="template/footer.php" rel='stylesheet' type='text/css'/>
   <title>Transline Travel</title>
   </head>
   <body>

<?php
  include 'template/header.php';
?>
<!-- <div class="header">
   <div class="top-header">
     <div class="container">
       <div class="logo">
          <a href="index.php"><img src="images/logo.png"/></a>
       </div>
       <span class="menu"> </span>
       <div class="m-clear"></div>
       <div class="top-menu">
        <ul>
           <li class="active"><a href="index.php">HOME</a></li>
           <li><a class="scroll" href="jadwal.php">RESERVASI</a></li>
           <li><a class="Scroll" href="konfirmasi.php">KONFIRMASI</a></li>
    
     
 
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
    </div> -->

 


  <div class="container">
    <div class="slider">
  <input type="radio" name="slide" class="radio-nav" id="nav-1" checked/>
  <input type="radio" name="slide" class="radio-nav" id="nav-2"/>
  <input type="radio" name="slide" class="radio-nav" id="nav-3"/>

  <ul class="slide">
    <li class="slide-1">
      <img src="images/1.png"/>
      <div class="caption"></div>
    </li>
    <li class="slide-2">
      <img src="images/2.png"/>
      <div class="caption"></div>
    </li>
    <li class="slide-3">
      <img src="images/3.png"/>
      <div class="caption"></div>
    </li>
  </ul>

  <div class="nav-arrow nav-next">
    <label class="nav-1" for="nav-1">></label>
    <label class="nav-2" for="nav-2">></label>
    <label class="nav-3" for="nav-3">></label>
  </div>
  <div class="nav-arrow nav-prev">
    <label class="nav-1" for="nav-1"><</label>
    <label class="nav-2" for="nav-2"><</label>
    <label class="nav-3" for="nav-3"><</label>
  </div>
</div>
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
                                    echo "<option value='".$key['trayek_asal']."'>".$key['trayek_asal']."</option>";
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
                                    echo "<option value='".$key['trayek_tujuan']."'>".$key['trayek_tujuan']."</option>";
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
  
</body> 
<html>
