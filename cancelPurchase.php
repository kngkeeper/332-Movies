<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Movies for You</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="https://image.flaticon.com/icons/png/512/184/184578.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href= "css/movie.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

<!--==========================
  Intro Section
============================-->

<section id="cancelPurchase"  class="section-bg" >
  <div class="container">

    <header class="section-header">
      <br><br>
      <h3 class="section-title">Cancellation</h3>
    </header>
    <p style='text-align:center'><a href='/login.php'>Return Home</a></p>
    <div class="container" style='text-align:center'>
        <?php
          include "dbLogin.php";
          $db = DBLogin();
          $NumTix = (int)$_POST["refund"];
          $string = $_POST["cancelPurchase"];
          $array = explode("|" , $string);
          $account = (int)$_SESSION["accountNumber"];

          $Movie = $array[0];
          $Day = $array[1];
          $Time = $array[2];
          $TheatreNum = (int)$array[3];
          $complex = $array[4];
          $NumSeats = (int)$array[5];

          $sql = "SELECT * 
                  FROM reservation
                  WHERE AccountNumber = '$account'
                  AND Complex = '$complex'
                  AND Theatre = '$TheatreNum'
                  AND Day = '$Day'
                  AND StartTime = '$Time'
                  AND NumTickets >= '$NumTix'";
           $result = $db->query($sql);
           if (mysqli_num_rows($result)==0) {
               echo "<p>Hey! You don't have that many tickets to refund!</p>";
           }
           if ($result)
           {
              while ($row = $result->fetch_assoc())
              {
                $TickUpdate = $row['NumTickets'] - $NumTix;
                $q = "UPDATE reservation
                      SET NumTickets = $TickUpdate
                      WHERE AccountNumber = '$account'
                      AND Complex = '$complex'
                      AND Theatre = '$TheatreNum'
                      AND Day = '$Day'
                      AND StartTime = '$Time'
                      AND NumTickets >= '$NumTix'";
                if ($db->query($q)) 
                {
                  echo "<p>Your reservation was successfully updated.</p>";
                } // end if
                $q2 = "UPDATE showing
                set NumSeats = NumSeats + '$NumTix'
                WHERE Complex = '$complex'
                AND Theatre = '$TheatreNum'
                AND Day = '$Day'
                AND StartTime = '$Time'";
                if ($db->query($q2)) 
                {
                  echo "<p>The number of the available seats at this showing has successfully updated.</p>";
                } // end if
              } // end while
           } // end if
          $db->close();
        ?>
  
</div>
</div>
</section>

<!--==========================
  Footer
============================-->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>BizPage</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
