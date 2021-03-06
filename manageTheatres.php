<?php
//
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
   <link href= "css/admin.css" rel="stylesheet">
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
<?php
	if(!array_key_exists('admin',$_SESSION) || !$_SESSION['admin'])
	{
		echo "Access Denied";
		exit;
	} 
?>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Movies For You</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="login.php">Home</a></li>
          <li class="menu-has-children"><a href="profile.php">My Account</a>
            <ul>
              <li><a href="profile.php">Profile</a></li>
              <li><a href="userPurchases.php">Purchases</a></li>
            </ul>
          </li> 
          <?php 
            if($_SESSION['admin'])
            {
              echo  "<li> <a href='admin.php'>Admin</a></li>";
            }

            ?>
            <li> <a href='index.php'>Logout</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <br><br><br><br><br>
  
	
	<?php
	include "dbLogin.php";
  echo "  <H1>Manage Theatres for {$_POST['complex']}</H1>";
	$db = DBLogin();
	// want to select all user and display them
	$sql = "SELECT * from Theatre where Complex = '{$_POST['complex']}'";
  //echo "$sql";
	$result = $db->query($sql);
  	if ($result->num_rows > 0) {
    // output data of each row
    echo "<table class='t1'>
            <thead>
            <tr>
            	  <th>Number</th>
                <th>Screen Size</th>
                <th>Seats</th>
                <th></th>
            </tr>
            </thead>
          ";
    while($row = $result->fetch_assoc()) {
      echo "<tbody>";
      echo "<tr>";
      echo "<td>" . $row["TheatreNum"] . "</td>";
      echo "<td>" . $row["ScreenSize"]. "</td>";
      echo "<td>" . $row["MaxSeats"] . "</td>";
      // view form
      echo "<td><form action='updateTheatre.php' method = 'post'>

            <input type = 'hidden' name = 'number' value = '{$row["TheatreNum"]}'/>

            <input type = 'hidden' name = 'complex' value = '{$row["Complex"]}'/>

            <input type = 'hidden' name = 'screen' value = '{$row["ScreenSize"]}'/>

            <input type = 'hidden' name = 'seats' value = '{$row["MaxSeats"]}'/>

            <input type='submit' value = 'Update Theatre'></input>
            </form></td>";
      echo "</tr>";
      echo "</tbody>";
      }
    echo "</table>";
    } else {
        echo "0 results";
    }

    $db -> close();
	?>
	
<!-- Add a new theatre -->
  <form action="addTheatre.php" method="post">
   <p> Screen Size</p>
    <select name="size"  required>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
    </select>
    <br>
     <input type="Number" name="number" placeholder="Number" required>
    <input type="number" name="Seats" placeholder="Seats" required>
    <?php
    echo "<input type='hidden' name='complex' value = '{$_POST['complex']}''>";
      ?>
    <input type="submit" value="Add New Theatre">
  </form>
	
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
