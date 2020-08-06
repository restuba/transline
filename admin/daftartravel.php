<?php
    include("../config/db.php");

    $query = "SELECT * FROM tbtravel";
    $hasil = $db->prepare($query);
    $hasil->execute();
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
               <a href="tambahtravel.php" class="btn btn-warning"> <span class="glyphicon glyphicon-plus-sign"></span>  Tambah</a>
               <br>
               <br>
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
                           //Datanya ada
                           foreach ($data as $key) {
                               echo '<tr>';
                               echo '<td>'.$key['trayek_kode'].'</td>';
                               echo '<td>'.$key['trayek_asal'].'</td>';
                               echo '<td>'.$key['trayek_tujuan'].'</td>';
                               echo '<td>'.$key['jam'].'</td>';
                               echo '<td>'.$key['harga'].'</td>';
                               echo "<td>
                                        <a href='edittravel.php?kode=".$key['trayek_kode']."'><img src='edit.png' width='3%' ></a>
                                        <a href='hapustravel.php?kode=".$key['trayek_kode']."'><img src='trash.png' width='3%' ></a>
                                   </td>";
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
