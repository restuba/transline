<?php
    include('../config/db.php');
    session_start();
    if (isset($_POST['kirim'])) {
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $query = "SELECT * FROM admin WHERE username = :user AND password = :pass";
        $hasil = $db->prepare($query);
        $hasil->bindParam(":user", $user);
        $hasil->bindParam(":pass", $pass);

        $hasil->execute();
        $data = $hasil->fetch();
        if($hasil->rowCount() > 0){
            //Login Berhasil
            $_SESSION['userid'] = $data['id'];
            header("location: index.php");
        }else{
            $errorMsg = "Login Gagal";
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

        <title>Transline</title>

        <!-- Bootstrap core CSS -->

          <link rel="stylesheet" href="css/reset.css">

    
        <link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="css/tampilan.css">
    </head>

    <body>
    <div class="header">
    </div>
       
    <div class="container">
  <div class="login">
    <h1 class="login-heading">
      <strong>Welcome</strong></h1>
                    <?php
                        if(isset($errorMsg)){
                                echo "<div class='alert alert-danger' role='alert'>" . $errorMsg ."</div>";
                        }
                    ?>
                     <form method="post">
        <input type="text" name="user" placeholder="Username" required="required" class="input-txt" /><style type="text/css">
          input[type=text] {
    border: none;
    border-bottom: 2px solid #2A2E33;

}
        </style>
          <input type="password" name="password" placeholder="Password" required="required" class="input-txt" /><style type="text/css">
          input[type=password] {
    border: none;
    border-bottom: 2px solid #2A2E33;
}
        </style>

          <div class="login-footer">
            
             <button class="btn btn-lg btn-primary btn-block" type="submit" name="kirim">Sign in</button>
    
          </div>
      </form>
  </div>
</div>
    
    



            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
