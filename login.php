<!DOCTYPE html>
<html lang="en">

<head>
	  <meta charset="utf-8"/>
	  <meta name="viewport"
		   content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	  <meta name="description" content=""/>
	  <meta name="author" content=""/>
	  <title>Login</title>
	  <!-- Favicon-->
	  <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
	  <!-- Font Awesome icons (free version)-->
	  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
			crossorigin="anonymous"></script>
	  <!-- Google fonts-->
	  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
		   rel="stylesheet" type="text/css"/>
	  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic"
		   rel="stylesheet"
		   type="text/css"/>
	  <!-- Core theme CSS (includes Bootstrap)-->
	  <link rel="stylesheet" href="css/mdb.dark.min.css">
	  <link rel="stylesheet" href="css/mdb.dark.min.css.map">
	  <link rel="stylesheet" href="css/mdb.dark.rtl.min.css">
	  <link rel="stylesheet" href="css/mdb.min.css">
	  <link rel="stylesheet" href="css/mdb.min.css.map">
	  <link rel="stylesheet" href="css/mdb.rtl.min.css">

	  <link href="css/styles.css" rel="stylesheet"/>
</head>

<body id="page-top">


<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top"
	id="mainNav">
	  <div class="container">
		    <a class="navbar-brand" href="#page-top">Login</a>
		    <button
				 class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded"
				 type="button"
				 data-bs-toggle="collapse"
				 data-bs-target="#navbarResponsive"
				 aria-controls="navbarResponsive"
				 aria-expanded="false" aria-label="Toggle navigation">
				 Menu
				 <i class="fas fa-bars"></i>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarResponsive">
				 <ul class="navbar-nav ms-auto">
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="index.php">Home
							</a></li>
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="sign_up.php">Sign Up</a></li>
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="#contact">Login</a></li>
				 </ul>
		    </div>
	  </div>
</nav>
<!-- Masthead-->


<style>
    #contact {
        background-image: url(img/company.jpg);
        background-attachment: scroll;
        margin-top: 100px;
    }
</style>
<main id="contact" class="cd-fixed-bg">
	  <div class="cd-bg-2" style="height: 90vh;">
		    <section style="padding-top: 160px;">
				 <div class="container">
					   <div class="row row2">
							<div class="col-lg-12 text-center"
								style="margin-bottom: 45px;">
								  <h2 class="section-heading">Login</h2>
							</div>
					   </div>
					   <div class="row row2">
							<div class="col-lg-12">
													 <?php include 'Logic/userLogic/loginLogic.php' ?>
								  <form name="sentMessage"
									   id="contactForm" novalidate=""
									   method="post"
									   action="">
									    <div class="row row2">
											 <div class="col-md-12">
												   <div class="form-group">
														<input type="email"
															  name="email"
															  class="form-control"
															  placeholder="Your Email"
															  id="name"
															  required=""
															  data-validation-required-message="Please enter your email.">
														<p class="help-block text-danger"></p>
												   </div>
												   <div class="form-group">
														<input type="password"
															  name="password"
															  class="form-control"
															  placeholder="password"
															  id="car_id"
															  required=""
															  data-validation-required-message="Please enter the password.">
														<p class="help-block text-danger"></p>
												   </div>
											 </div>
											 <div class="clearfix"></div>
											 <div class="col-lg-12 text-center">
												   <div id="success"></div>
												   <button
														type="submit"
														name="login"
														class="btn btn-xl">
														Save
												   </button>
											 </div>
									    </div>
								  </form>
							</div>
					   </div>
				 </div>
		    </section>
	  </div>
</main>


<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
	  <!-- Section: Social media -->
	  <div class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
		    <!-- Left -->
		    <div class="me-5 d-none d-lg-block">
				 <span>Get connected with us on social networks:</span>
		    </div>
		    <!-- Left -->

		    <!-- Right -->
		    <div>
				 <a href="" class="me-4 text-reset">
					   <i class="fab fa-facebook-f"></i>
				 </a>
				 <a href="" class="me-4 text-reset">
					   <i class="fab fa-twitter"></i>
				 </a>
				 <a href="" class="me-4 text-reset">
					   <i class="fab fa-google"></i>
				 </a>
				 <a href="" class="me-4 text-reset">
					   <i class="fab fa-instagram"></i>
				 </a>
				 <a href="" class="me-4 text-reset">
					   <i class="fab fa-linkedin"></i>
				 </a>
				 <a href="" class="me-4 text-reset">
					   <i class="fab fa-github"></i>
				 </a>
		    </div>
		    <!-- Right -->
	  </div>
	  <!-- Section: Social media -->

	  <!-- Section: Links  -->
	  <div class="">
		    <div class="container text-center text-md-start mt-5">
				 <!-- Grid row -->
				 <div class="row mt-3">
					   <!-- Grid column -->
					   <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
							<!-- Content -->
							<h6 class="text-uppercase fw-bold mb-4">
								  <i class="fas fa-gem me-3"></i>CLASSIC
								  CARS
							</h6>
							<p>
								  We hope you've enjoyed your time with
								  us. Explore our unique collection of
								  classic cars and
								  immerse
								  yourself in the timeless beauty of
								  automotive history.
							</p>
					   </div>
					   <!-- Grid column -->

					   <!-- Grid column -->
					   <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
							<!-- Links -->
							<h6 class="text-uppercase fw-bold mb-4">
								  Products
							</h6>
							<p>
								  <a href="#!" class="text-reset"></a>
							</p>
							<p>
								  <a href="#!" class="text-reset"></a>
							</p>
							<p>
								  <a href="#!" class="text-reset"></a>
							</p>
							<p>
								  <a href="#!" class="text-reset"></a>
							</p>
					   </div>
					   <!-- Grid column -->

					   <!-- Grid column -->
					   <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
							<!-- Links -->
							<h6 class="text-uppercase fw-bold mb-4">
								  Useful links
							</h6>
							<p>
								  <a href="#about" class="text-reset">About</a>
							</p>
							<p>
								  <a href="#services"
									class="text-reset">Services</a>
							</p>
							<p>
								  <a href="#products"
									class="text-reset">Products</a>
							</p>
							<p>
								  <a href="#contact us"
									class="text-reset">Contact us</a>
							</p>
					   </div>
					   <!-- Grid column -->

					   <!-- Grid column -->
					   <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
							<!-- Links -->
							<h6 class="text-uppercase fw-bold mb-4">
								  Contact us</h6>
							<p><i class="fas fa-home me-3"></i> New York,
								  NY 10012, US</p>
							<p>
								  <i class="fas fa-envelope me-3"></i>
								  info@example.com
							</p>
							<p><i class="fas fa-phone me-3"></i> + 01 234
								  567 88</p>
							<p><i class="fas fa-print me-3"></i> + 01 234
								  567 89</p>
					   </div>
					   <!-- Grid column -->
				 </div>
				 <!-- Grid row -->
		    </div>
	  </div>
	  <!-- Section: Links  -->

	  <!-- Copyright -->
	  <div class="text-center p-4"
		  style="background-color: rgba(0, 0, 0, 0.05);">
		    © 2024 Copyright: Mohamed Mansour
		    <a class="text-reset fw-bold" href=""></a>
	  </div>
	  <!-- Copyright -->
</footer>
<!-- Footer -->


<!-- Bootstrap core JS-->
<script
	  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>