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
    
    </head>
    <body>
    <?php
  include 'template/header.php';
?>
            <div class="container">
                <?php
                    include 'config/db.php';
                    if (isset($_GET['tahap'])) {
                        $tahap = $_GET['tahap'];
                    } else {
                        $tahap = '1';
                    }
                    switch ($tahap) {
                        case '1':
                            // Tahap 1 : Pilih Kursi

                            //Lampirkan file pesan/pilihkursi.php
                            include 'pesan/pilihkursi.php';
                            break;
                        case '2':
                            // Tahap 2 : Isi Data Diri

                            //Lampirkan file pesan/datadiri.php
                            include 'pesan/datadiri.php';
                            break;
                        case '3':
                            include 'pesan/selesai.php';
                            break;
                        default:

                            echo 'Parameter Error';
                            break;
                    }
                ?>
            </div>
            <!-- /.container -->
            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
    </body>
</html>
