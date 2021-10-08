<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Price Comparison</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Nexperts Project</a></h1>
     

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
	<form action="index.php" method="post">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Discover New Products And Compare Prices</h1>
          <h2>Shop now with the largest selection of top brands and products all in a single website.</h2><br>
		  
		  <input type="text" class="form-control" name="userInput" placeholder="Enter Product Name" required>
		  
        </div>
		</div>
      <div class="text-center">
        <br>
         <input type="submit" id="submit" name="submit" value="Get Price">
      </div>
	   </form>

      <div class="row icon-boxes" id="jumpDiv">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
		  
		  <?php
			
			// Declare Cariables For Saving Product Information
			
			$pimg = "assets/img/product.jpg";
			$pname = "Product Name";
			$pprice = "Product Price";
			$pbuy_link = "";
			
			
			if(isset($_POST["submit"])){
				
				$product_name = $_POST["userInput"];
				// It will fetch product name from input type textbox
				//shopee
				$output = exec("C:\\Python39\\python.exe shopee_scrapper.py ".$product_name);
				$output = preg_replace('/b/','',$output,1);
				$output = trim($output,"''");
	
				$product_array_S = explode(',',$output);
	
				$pimg =  $product_array_S[0];
				$pname = $product_array_S[1];
				$pprice = "RM".$product_array_S[2];
				$pbuy_link = $product_array_S[3];
}
?>
			<div class="col-lg-3 col-md-6 footer-contact">
            <h3>Shopee Shop</h3></div>
            <div class="icon"><img src="<?php echo $pimg; ?>" width="110px" height="100px"></div>
            <h4 class="title"><?php echo $pname; ?></h4>
			<h4 class="title"><?php echo $pprice; ?></h4>
            <p class="description"><a href="<?php echo $pbuy_link; ?>" target="_blank">Product Buy Link</a></p>
          </div>
        </div>
		
		<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
		  
		  <?php
			
			// Declare Cariables For Saving Product Information
			
			$pimg = "assets/img/product.jpg";
			$pname = "Product Name";
			$pprice = "Product Price";
			$pbuy_link = "";
			
			
			if(isset($_POST["submit"])){
				
				$product_name = $_POST["userInput"];
				// It will fetch product name from input type textbox
				//Lazada
				$output = exec("C:\\Python39\\python.exe Lazada_scrapper.py ".$product_name);
				$output = preg_replace('/b/','',$output,1);
				$output = trim($output,"''");
	
				$product_array_L = explode(',',$output);
	
				$pimg =  $product_array_L[0];
				$pname = $product_array_L[1];
				$pprice = $product_array_L[2];
				$pbuy_link = $product_array_L[3];
}
?>
		  
            <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Lazada Shop</h3></div>
			<div class="icon"><img src="<?php echo $pimg; ?>" width="110px" height="100px"></div>
            <h4 class="title"><?php echo $pname; ?></h4>
			<h4 class="title"><?php echo $pprice; ?></h4>
            <p class="description"><a href="<?php echo $pbuy_link; ?>" target="_blank">Product Buy Link</a></p>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Price Comparison</h3>
            <p>
              Nexperts Academy<br>
              <strong>Phone:</strong> +60 195253791<br>
              <strong>Email:</strong> fahmi97.rosli@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

         

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Sign Up To Recieve Email Updates. Don't Miss Out.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Nexperts Academy</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
         
          Designed by <a href="#">M.Fahmi Rosli</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>