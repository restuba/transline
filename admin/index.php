<?php
    include('../config/db.php');
    include('../config/session.php');
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
           <li class="active"><a href="index.php">HOME</a></li>
           <li><a class="scroll" href="daftartravel.php">TRAYEK</a></li>
           <li><a class="Scroll" href="daftarpesan.php">TRANSAKSI</a></li>
          <li><a class="scroll" href="setting.php">SETTING</a></li>
 
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
            <div class="hai">
              <style type="text/css">
                .hai{
                  margin-top: 5em;
                  margin-left: 5em;
                }
              </style>

              <h1>HAI, ADMIN !</h1>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
