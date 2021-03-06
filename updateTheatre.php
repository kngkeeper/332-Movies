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
<?php
// clean up values
	include 'dbLogin.php';
	//print_r($_POST);
	$db = DBLogin();
  echo "<h1>Updating Info for {$_POST['complex']} theatre {$_POST['number']}</h1>";
  echo" <form action='updateTheatreInfo.php' method='post' >
   <p> Screen Size</p>
   "?>
    <select name='size' required>
            <option <?php if($_POST['screen'] == 'S'){echo 'selected';} ?> value='S'>S</option>
            <option <?php if($_POST['screen'] == 'M'){echo 'selected';} ?> value='M'>M</option>
            <option <?php if($_POST['screen'] == 'L'){echo 'selected';} ?> value='L'>L</option>
    </select>
    <?php
    echo "
    <br>
     <input type='Number' name='number' placeholder='Number' value ='{$_POST['number']}' required>

    <input type='number' name='Seats' placeholder='Seats' value='{$_POST['seats']}' required>
    
     <input type='hidden' name='complex' value = '{$_POST['complex']}''>
     <input type='hidden' name='ogNum' value = '{$_POST['number']}''>
      
    <input type='submit' value='Update Theatre'>
  </form>"
 
?>
<body>


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