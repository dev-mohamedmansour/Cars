<!DOCTYPE html>
<html lang="en"
	 xmlns="http://www.w3.org/1999/html"
	 xmlns="http://www.w3.org/1999/html"
	 xmlns="http://www.w3.org/1999/html"
	 xmlns="http://www.w3.org/1999/html"
	 xmlns="http://www.w3.org/1999/html">

<head>
	  <meta charset="utf-8"/>
	  <meta name="viewport"
		   content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	  <meta name="description"
		   content=""/>
	  <meta name="author"
		   content=""/>
	  <title>Classic Cars</title>
	  <!-- Favicon-->
	  <link rel="icon"
		   type="image/x-icon"
		   href="assets/favicon.ico"/>
	  <!-- Font Awesome icons (free version)-->
	  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
			crossorigin="anonymous"></script>
	  <!-- Google fonts-->
	  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
		   rel="stylesheet"
		   type="text/css"/>
	  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic"
		   rel="stylesheet"
		   type="text/css"/>
	  <!-- Core theme CSS (includes Bootstrap)-->
	  <link rel="stylesheet"
		   href="css/mdb.dark.min.css">
	  <link rel="stylesheet"
		   href="css/mdb.dark.min.css.map">
	  <link rel="stylesheet"
		   href="css/mdb.dark.rtl.min.css">
	  <link rel="stylesheet"
		   href="css/mdb.min.css">
	  <link rel="stylesheet"
		   href="css/mdb.min.css.map">
	  <link rel="stylesheet"
		   href="css/mdb.rtl.min.css">
	  <link rel="stylesheet"
		   href="css/animate.css">
	  <link rel="stylesheet"
		   href="css/animate.min.css">
	  <link rel="stylesheet"
		   href="css/styleGovernorate.css">
	  <link href="css/styles.css"
		   rel="stylesheet"/>
</head>

<body id="page-top">

<?php
	  @include 'Logic/userLogic/homeLogic.php';
	  $clientId = $_SESSION['clientId'];
	  // if not user redirect to login page
	  if (!isset($clientId)) {
			 header('location: login.php');
	  }
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top"
	id="mainNav">
	  <div class="container">
		    <a class="navbar-brand"
			  href="#page-top">Classic Cars</a>
		    <!--        <button-->
		    <!--                class = "navbar-toggle text-uppercase font-weight-bold bg-primary text-white rounded"-->
		    <!--                type = "button"-->
		    <!--                data-bs-toggle = "collapse"-->
		    <!--                data-bs-target = "#navbarResponsive"-->
		    <!--                aria-controls = "navbarResponsive"-->
		    <!--                aria-expanded = "false"-->
		    <!--                aria-label = "Toggle navigation">-->
		    <!--            Menu-->
		    <!--            <i class = "fas fa-bars"></i>-->
		    <!--        </button>-->
		    <div class="collapse navbar-collapse"
			    id="navbarResponsive">
				 <ul class="navbar-nav ms-auto">
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="#about">About</a></li>
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="#services">Services</a>
					   </li>
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="#products">Products</a>
					   </li>
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="#gallery">gallery</a>
					   </li>
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="#team">Team</a></li>
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="#contact">Contact</a>
					   </li>
					   <!--				 </ul>-->
					   <!--		    </div>-->
					   <!--		    <div class="collapse navbar-collapse" id="navbarResponsive">-->
					   <!--				 <ul class="navbar-nav ms-auto">-->
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="orderPages/orderDetails.php">Orders
								  Details</a>
					   </li>
					   <!--					   <li class="nav-item mx-0 mx-lg-1"><a-->
					   <!--								  class="nav-link py-3 px-0 px-lg-3 rounded"-->
					   <!--								  href="sign_up.php">Sign Up</a></li>-->
					   <!--					   <li class="nav-item mx-0 mx-lg-1"><a-->
					   <!--								  class="nav-link py-3 px-0 px-lg-3 rounded"-->
					   <!--								  target="_blank"-->
					   <!--								  href="login.php">Login</a></li>-->
					   <!--				 </ul>-->
					   <!--				 <ul>-->
					   <li class="nav-item mx-0 mx-lg-1"><a
								  class="nav-link py-3 px-0 px-lg-3 rounded"
								  href="logout.php">Logout</a>
					   </li>
				 </ul>
		    </div>
	  </div>
</nav>
<!-- Masthead-->
<!-- Header -->
<style>
    header {
        background-image: url(img/black-chevrolet-chevelle-classic-car-g4j2u50u8pwodklp.jpg);
    }
</style>
<header>
	  <div class="cd-bg-2"
		  style="height: 100vh;">
		    <div class="container">
				 <div class="intro-text wow animate__fadeInUp"
					 data-wow-duration="1s"
					 data-wow-delay="0.3s">
					   <div class="intro-lead-in">Welcome to Classic
							Cars!
					   </div>
					   <div class="intro-heading">Explore Timeless Beauty
					   </div>
					   <a href="#products"
						 class="page-scroll btn btn-xl">Browse
							Our Collection</a>
				 </div>
		    </div>
	  </div>
</header>


<!-- About Section -->
<section id="about">
	  <div class="container">
		    <div class="row1">
				 <div class="col-lg-12 text-center">
					   <h2 class="section-heading">About</h2>
					   <h3 class="section-subheading text-muted">Discover
							the journey of Classic Cars and our passion
							for vintage
							automobiles.</h3>
				 </div>
		    </div>
		    <div class="row1">
				 <div class="col-lg-12">
					   <ul class="timeline">
							<li class="wow animate__fadeInLeft"
							    data-wow-duration="1s"
							    data-wow-delay="0.3s">
								  <div class="timeline-image"
									  style="overflow: hidden; ">
									    <img class="img-circle img-responsive"
										    src="img/morris-minor.jpg"
										    alt="">
								  </div>
								  <div class="timeline-panel">
									    <div class="timeline-heading">
											 <h4>2009-2011</h4>
											 <h4 class="subheading">
												   Our Humble
												   Beginnings</h4>
									    </div>
									    <div class="timeline-body">
											 <p class="text-muted">
												   Classic Cars was
												   born out of a
												   shared passion
												   for vintage
												   automobiles. It
												   all
												   started in 2009
												   when a group of
												   car enthusiasts
												   came together
												   with the dream of
												   preserving and
												   restoring classic
												   cars to their
												   former glory.</p>
											 <p class="text-muted">
												   What began as a
												   small workshop in
												   a garage soon
												   grew into a
												   renowned
												   establishment,
												   known for its
												   meticulous
												   craftsmanship and
												   attention to
												   detail. Our
												   commitment to
												   excellence and
												   love for classic
												   cars have been
												   the driving force
												   behind our
												   journey from
												   humble
												   beginnings to
												   where we stand
												   today.</p>
									    </div>
								  </div>
							</li>
							<li class="timeline-inverted wow animate__fadeInRight"
							    data-wow-duration="1s"
							    data-wow-delay="0.3s">
								  <div class="timeline-image"
									  style="overflow: hidden;">
									    <img class="img-circle img-responsive"
										    src="img/full-shot-happy-couple-with-motorcycle.jpg"
										    alt="">
								  </div>
								  <div class="timeline-panel">
									    <div class="timeline-heading">
											 <h4>March 2011</h4>
											 <h4 class="subheading">
												   An Agency is
												   Born</h4>
									    </div>
									    <div class="timeline-body">
											 <p class="text-muted">In
												   March 2011,
												   Classic Cars
												   officially became
												   a registered
												   agency, marking a
												   significant
												   milestone in our
												   journey. This
												   milestone
												   represented our
												   commitment to
												   professionalism
												   and dedication to
												   providing
												   top-notch service
												   to our
												   clients.</p>
									    </div>
								  </div>
							</li>
							<li class="wow animate__fadeInLeft"
							    data-wow-duration="1s"
							    data-wow-delay="0.3s">
								  <div class="timeline-image"
									  style="overflow: hidden;">
									    <img class="img-circle img-responsive"
										    src="img/car-being-taking-care-workshop.jpg"
										    alt="">
								  </div>
								  <div class="timeline-panel">
									    <div class="timeline-heading">
											 <h4>December 2012</h4>
											 <h4 class="subheading">
												   Transition to
												   Full Service</h4>
									    </div>
									    <div class="timeline-body">
											 <p class="text-muted">By
												   December 2012,
												   Classic Cars had
												   successfully
												   transitioned into
												   a full-service
												   classic car
												   dealership. This
												   transition
												   allowed us to
												   expand our
												   offerings and
												   better serve the
												   needs of our
												   growing customer
												   base.</p>
									    </div>
								  </div>
							</li>
							<li class="timeline-inverted wow animate__fadeInRight"
							    data-wow-duration="1s"
							    data-wow-delay="0.3s">
								  <div class="timeline-image"
									  style="overflow: hidden;">
									    <img class="img-circle img-responsive"
										    src="img/3d-car-with-minimal-background.jpg"
										    alt="">
								  </div>
								  <div class="timeline-panel">
									    <div class="timeline-heading">
											 <h4>July 2014</h4>
											 <h4 class="subheading">
												   Phase Two
												   Expansion</h4>
									    </div>
									    <div class="timeline-body">
											 <p class="text-muted">In
												   July 2014,
												   Classic Cars
												   embarked on its
												   phase two
												   expansion,
												   opening new
												   branches in key
												   locations. This
												   expansion
												   strategy aimed to
												   reach a wider
												   audience and
												   establish our
												   presence as a
												   leading name in
												   the classic car
												   industry.</p>
									    </div>
								  </div>
							</li>
							<li class="timeline-inverted">
								  <div class="timeline-image">
									    <h4>Be Part
											 <br>Of Our
											 <br>Story!
									    </h4>
								  </div>
							</li>
					   </ul>
				 </div>
		    </div>
	  </div>
</section>

<!-- Services Section -->


<style>
    .cd-main-content {
        background-image: url("img/young-couple-sitting-vintage-car_23-2148195693.jpg");
    }
</style>

<main id="services"
	 class="cd-fixed-bg cd-main-content">
	  <div class="cd-bg-2">
		    <section>
				 <div class="container">
					   <div class="row1">
							<div class="col-lg-12 text-center">
								  <h2 class="section-heading">Our
									    Services</h2>
								  <h3 class="section-subheading text">
									    Explore our range of services
									    tailored for classic car
									    enthusiasts.
								  </h3>
							</div>
					   </div>
					   <div class="row text-center">
							<div class="col-md-4 wow animate__flipInX"
								data-wow-duration="1.3s"
								data-wow-delay="0.4s">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fas fa-car fa-stack-1x fa-inverse"></i>
              </span>
								  <h4 class="service-heading">Car
									    Sales</h4>
								  <p class="text">Explore our wide
									    selection of classic cars
									    available for sale. Whether
									    you're looking for
									    a vintage roadster or a
									    timeless sedan, we have the
									    perfect car for you.</p>
							</div>
							<div class="col-md-4 wow animate__flipInX"
								data-wow-duration="1.3s"
								data-wow-delay="0.8s">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fas fa-tools fa-stack-1x fa-inverse"></i>
              </span>
								  <h4 class="service-heading">Car
									    Repair</h4>
								  <p class="text">Trust our expert
									    mechanics to provide top-notch
									    repair services for your
									    classic car. From
									    routine maintenance to major
									    overhauls, we ensure your
									    vehicle runs smoothly.</p>
							</div>
							<div class="col-md-4 wow animate__flipInX"
								data-wow-duration="1.3s"
								data-wow-delay="1.2s">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fas fa-car-alt fa-stack-1x fa-inverse"></i>
              </span>
								  <h4 class="service-heading">Car
									    Rental</h4>
								  <p class="text">Experience the thrill
									    of driving a classic car with
									    our car rental services.
									    Whether it's
									    for a special occasion or a
									    weekend getaway, our fleet of
									    meticulously maintained
									    vehicles is at your
									    disposal.</p>
							</div>
					   </div>

				 </div>
		    </section>
	  </div>
</main>

<Style>
    .card:nth-child(1):before {
        background-image: url(img/Alloy_Gullwing51.jpg);
    }

    .card:nth-child(2):before {
        background-image: url(img/P1800_Green_11.jpg);
    }

    .card:nth-child(3):before {
        background-image: url(img/UTCC201721.jpg);
    }

    .card:nth-child(4):before {
        background-image: url(img/1961-Jaguar-E-Type-Series-1-3-8-Litre-Fixed-Head-Coupe-_63.jpg);
    }

    .card:nth-child(5):before {
        background-image: url(img/wp88834111.jpg);
    }

    .card:nth-child(6):before {
        background-image: url(img/OIP1.jpeg);
    }
</Style>

<section id="products"
	    class="sec-product">
	  <?php //include 'Logic/homeLogic.php' ?>
	  <div class="container">
		    <div class="row row2">
				 <div class="col-lg-12 text-center">
					   <h2 class="section-heading">Our Products</h2>
					   <h3 class="section-subheading text">Explore an
							extraordinary array of timeless classic cars
							in our collection.
					   </h3>
				 </div>
		    </div>
		    <div class="row row2">
				 <div class="hov col-lg-4 wow animate__slideInUp card-update"
					 data-wow-duration="1s" data-wow-delay="0.3s">
					   <div class="backgroundImageCars">
							<div class="actionBtns">
								  <button class="actionBtn detailsBtn">
									    details
								  </button>
								  <button class="actionBtn orderBtn">
									    order
								  </button>
								  <button class="moveBtn ">details
								  </button>
							</div>
							<div id="order" role="tabpanel">
								  <form method="post" action=""
									   class=" form order">
									    <div>
											 <label for="governorates"
												   class="label-governorate">Select
												   your
												   Governorate</label>
											 <select
												   class="select-governorate"
												   id="governorates"
												   name="orderGovernorate">
												   <option>
														--
														Select
														your
														Governorate
														--
												   </option>
												   <option
														value="Cairo">
														Cairo
												   </option>
												   <option
														value="Giza">
														Giza
												   </option>
												   <option
														value="Alexandria">
														Alexandria
												   </option>
												   <option
														value="Aswan">
														Aswan
												   </option>
												   <option
														value="Luxor">
														Luxor
												   </option>
												   <option
														value="Asyut">
														Asyut
												   </option>
												   <option
														value="Sohag">
														Sohag
												   </option>
												   <option
														value="Qena">
														Qena
												   </option>
												   <option
														value="Dakahlia">
														Dakahlia
												   </option>
												   <option
														value="Sharqia">
														Sharqia
												   </option>
												   <option
														value="Suez">
														Suez
												   </option>
												   <option
														value="Fayoum">
														Fayoum
												   </option>
												   <option
														value="RedSea">
														RedSea
												   </option>
												   <option
														value="Minya">
														Minya
												   </option>
												   <option
														value="NorthSinai">
														NorthSinai
												   </option>
												   <option
														value="SouthSinai">
														SouthSinai
												   </option>
												   <option
														value="PortSaid">
														PortSaid
												   </option>
												   <option
														value="BeniSufe">
														Beni
														Sufe
												   </option>
											 </select>
											 <p></p>
											 <div id="center-container"
												 class="hidden">
												   <label for="centers"
														class="label-governorate">
														Select
														Your
														Center
												   </label>
												   <select
														id="centers"
														class="select-governorate"
														name="orderCity">
														<option>
															  --
															  Select
															  Your
															  Center
															  --
														</option>
												   </select>
											 </div>
											 <div class="col-lg-12 text-center">
												   <div id="success"></div>
												   <button
														name="mercedes"
														value="Mercedes SL 300 Gullwing"
														type="submit"
														class="btn btn-xl mt-5">
														Save
												   </button>
											 </div>
									    </div>
								  </form>
							</div>
							<div id="details" role="tabpanel">
								  <form action="#products"
									   class="details form detailsForm">
									    <div class="imege-container">
											 <h4 class="nameCas text-center bg-light-gray mt-2">
												   Mercedes
												   SL
												   300
												   Gullwing</h4>
											 <div class="overlay">
												   <!--												   <h2 class="title">-->
												   <!--														Mercedes-->
												   <!--														SL-->
												   <!--														300-->
												   <!--														Gullwing </h2>-->
												   <h4> Today's
														selling
														price : .
														$1.7
														million</h4>
												   <button
														type="button">
														<p class="copy">
															  The
															  Mercedes
															  SL
															  300
															  Gullwing
															  is
															  a
															  classic
															  sports
															  car
															  produced
															  by
															  Mercedes-Benz
															  from
															  1954
															  to
															  1957,
															  renowned
															  for
															  its
															  iconic
															  gull-wing
															  doors
															  and
															  elegant
															  design.
															  Powered
															  by
															  a
															  3.0-liter
															  inline-six
															  engine,
															  it
															  remains
															  a
															  highly
															  sought-after
															  collector's
															  item
															  for
															  its
															  rarity
															  and
															  timeless
															  appeal.</p>
												   </button>
											 </div>
									    </div>
								  </form>
							</div>
					   </div>
				 </div>
				 <div class="hov col-lg-4 wow animate__slideInUp card-update"
					 data-wow-duration="1s" data-wow-delay="0.6s">
					   <div class="backgroundImageCar1">
							<div class="actionBtns">
								  <button class="actionBtn detailsBtn">
									    details
								  </button>
								  <button class="actionBtn orderBtn">
									    order
								  </button>
								  <button class="moveBtn ">details
								  </button>
							</div>
							<div id="order" role="tabpanel">
								  <form method="post" action=""
									   class=" form order">
									    <div>
											 <label for="governorates"
												   class="label-governorate">Select
												   your
												   Governorate</label>
											 <select
												   class="select-governorate"
												   id="governorates"
												   name="orderGovernorate">
												   <option>
														--
														Select
														your
														Governorate
														--
												   </option>
												   <option
														value="Cairo">
														Cairo
												   </option>
												   <option
														value="Giza">
														Giza
												   </option>
												   <option
														value="Alexandria">
														Alexandria
												   </option>
												   <option
														value="Aswan">
														Aswan
												   </option>
												   <option
														value="Luxor">
														Luxor
												   </option>
												   <option
														value="Asyut">
														Asyut
												   </option>
												   <option
														value="Sohag">
														Sohag
												   </option>
												   <option
														value="Qena">
														Qena
												   </option>
												   <option
														value="Dakahlia">
														Dakahlia
												   </option>
												   <option
														value="Sharqia">
														Sharqia
												   </option>
												   <option
														value="Suez">
														Suez
												   </option>
												   <option
														value="Fayoum">
														Fayoum
												   </option>
												   <option
														value="RedSea">
														RedSea
												   </option>
												   <option
														value="Minya">
														Minya
												   </option>
												   <option
														value="NorthSinai">
														NorthSinai
												   </option>
												   <option
														value="SouthSinai">
														SouthSinai
												   </option>
												   <option
														value="PortSaid">
														PortSaid
												   </option>
												   <option
														value="BeniSufe">
														Beni
														Sufe
												   </option>
											 </select>
											 <p></p>
											 <div id="center-container"
												 class="hidden">
												   <label for="centers"
														class="label-governorate">
														Select
														Your
														Center
												   </label>
												   <select
														id="centers"
														class="select-governorate"
														name="orderCity">
														<option>
															  --
															  Select
															  Your
															  Center
															  --
														</option>
												   </select>
											 </div>
											 <div class="col-lg-12 text-center">
												   <div id="success"></div>
												   <button
														name="volvo"
														value="Volvo P1800"
														type="submit"
														class="btn btn-xl mt-5">
														Save
												   </button>
											 </div>
									    </div>
								  </form>
							</div>
							<div id="details" role="tabpanel">
								  <form action="#products"
									   class="details form detailsForm">
									    <div class="imege-container">
											 <h4 class="nameCas text-center bg-light-gray mt-2">
												   Volvo
												   P1800</h4>
											 <div class="overlay">
												   <!--											 <h2 class="title">Volvo-->
												   <!--												   P1800</h2>-->
												   <h4> Today's
														selling
														price :
														$200000
														k</h4>
												   <button
														type="button"
												   <p class="copy">
														The
														Volvo
														P1800
														is
														a
														classic
														sports
														car
														produced
														by
														Volvo
														Cars
														from
														1961
														to
														1973.
														It
														gained
														fame
														as
														the
														car
														driven
														by
														Roger
														Moore's
														character
														Simon
														Templar
														in
														the
														television
														series
														"The
														Saint".
														With
														its
														sleek
														design
														and
														reliable
														performance,
														the
														P1800
														has
														earned
														a
														special
														place
														in
														automotive
														history
														and
														remains
														a
														beloved
														choice
														among
														classic
														car
														enthusiasts.</p>
												   </button>
											 </div>
									    </div>
								  </form>
							</div>
					   </div>
				 </div>

				 <div class="card col-lg-4 wow animate__slideInUp"
					 data-wow-duration="1s"
					 data-wow-delay="0.9s">
					   <form method="post"
						    action="">
							<div class="content">
								  <h2 class="title">BMW 3.0 CSL</h2>
								  <h4> Today's selling
									    price : $229,900 k</h4>
								  <button type="submit"
										name="BMW"
										value="BMW 3.0 CSL">
									    <p class="copy">The BMW 3.0 CSL
											 is a
											 legendary sports car
											 manufactured by
											 BMW from 1971 to 1975.
											 It
											 became
											 famous for its
											 remarkable
											 success in
											 motorsport, including
											 winning
											 the
											 European Touring Car
											 Championship.
											 With its iconic
											 "Batmobile"
											 design and
											 high-performance engine,
											 the
											 3.0 CSL
											 captured the hearts of
											 racing
											 enthusiasts
											 worldwide.</p>
								  </button>
							</div>
					   </form>
				 </div>

				 <div class="card col-lg-4 wow animate__slideInUp"
					 data-wow-duration="1s"
					 data-wow-delay="1.2s">
					   <form method="post"
						    action="">
							<div class="content">
								  <h2 class="title">Jaguar E-Type</h2>
								  <h4> Today's selling
									    price : $71,664 k</h4>
								  <button type="submit"
										name="jaguar"
										value="Jaguar E-Type">
									    <p class="copy">The Jaguar
											 E-Type,
											 often
											 referred to as the "most
											 beautiful car
											 ever made" by Enzo
											 Ferrari,
											 is an icon of automotive
											 design
											 and
											 performance. Produced by
											 Jaguar
											 Cars
											 from 1961 to 1975, the
											 E-Type
											 captivated the world
											 with its
											 stunning
											 aesthetics and
											 exhilarating
											 driving
											 experience. With its
											 sleek
											 curves and powerful
											 engine,
											 driving
											 the E-Type is like
											 embarking on
											 a
											 journey to the stars. It
											 remains a
											 timeless symbol of
											 automotive
											 excellence and a dream
											 car for
											 enthusiasts around the
											 globe.</p>
								  </button>
							</div>
					   </form>
				 </div>
				 <div class="card col-lg-4 wow animate__slideInUp"
					 data-wow-duration="1s"
					 data-wow-delay="1.5s">
					   <form method="post"
						    action="">
							<div class="content">
								  <h2 class="title">Porsche 911</h2>
								  <h4> Today's selling
									    price : $122,095 k</h4>
								  <button type="submit"
										name="porsche"
										value="Porsche 911">
									    <p class="copy">The Porsche 911
											 is an
											 automotive legend,
											 renowned for
											 its
											 precision engineering
											 and
											 timeless
											 design. Introduced in
											 1963, the
											 911
											 has evolved over
											 generations
											 while
											 maintaining its
											 unmistakable
											 silhouette and
											 performance
											 pedigree.
											 With its rear-engine
											 layout and
											 distinctive styling, the
											 911
											 offers a
											 driving experience like
											 no
											 other.
											 Whether carving through
											 winding
											 roads
											 or cruising on the open
											 highway,
											 It's a symbol of
											 automotive
											 innovation
											 and a testament to
											 Porsche's
											 commitment to
											 excellence.</p>
								  </button>
							</div>
					   </form>
				 </div>
				 <div class="card col-lg-4 wow animate__slideInUp"
					 data-wow-duration="1s"
					 data-wow-delay="1.8s">
					   <form method="post"
						    action="">
							<div class="content">
								  <h2 class="title">Ferrari 250 GTO</h2>
								  <h4> Today's selling
									    price : $30,260,179
									    million</h4>
								  <button type="submit"
										value="Ferrari 250 GTO"
										name="ferrari">
									    <p class="copy">The Ferrari 250
											 GTO is
											 an
											 automotive masterpiece,
											 celebrated for
											 its combination of
											 beauty,
											 performance. It is
											 considered
											 the 250
											 GTO, produced by Ferrari
											 in the
											 early
											 1960s. With its powerful
											 V12
											 engine, the 250 GTO
											 dominates
											 the
											 racetrack. Its racing
											 pedigree
											 includes victories in
											 prestigious
											 events
											 such as the Tour de
											 France auto
											 race
											 and the 24 Hours of Le
											 Mans.
											 With only
											 36 cars ever produced,
											 owning
											 a Ferrari 250 GTO is the
											 ultimate
											 aspiration for
											 collectors and
											 enthusiasts alike.</p>
								  </button>
							</div>
					   </form>
				 </div>
		    </div>
		    <div class="col-lg-12 text-center">
				 <div id="success"></div>
				 <button
					   type="submit"
					   class="btn bg-success text-dark mt-3">
					   <a href="orderPages/orderCustomize.php"
						 class="text-dark">Customize
							your car</a>
				 </button>
		    </div>
	  </div>
</section>
<!-- Clients Aside -->


<style>
    .gallery-slider {
        width: 100%;
        height: 100vh;
    }

    .gallery-slider .items-group {
        width: 100%;
        height: 93%;
        position: relative;
    }

    .gallery-slider .items-group .item {
        top: 0;
        left: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        display: flex;
        overflow: hidden;
        transition: 0.5s;
        visibility: hidden;
        position: relative;
        padding: 50px 20px;
        position: absolute;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
    }

    .gallery-slider .items-group .item:hover .bg {
        opacity: 0.4;
    }

    .gallery-slider .items-group .item:hover .block {
        box-shadow: 0px 0px 50px #333;
    }

    .gallery-slider .items-group .item.active {
        opacity: 1;
        visibility: visible;
    }

    .gallery-slider .items-group .item .bg {
        top: 0px;
        left: 0px;
        opacity: 1;
        z-index: -1;
        width: 100%;
        height: 100%;
        transition: 0.5s;
        position: absolute;
        transform: scale(1.03);
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .gallery-slider .items-group .item .blur {
        top: 0px;
        left: 0px;
        z-index: -1;
        width: 100%;
        height: 100%;
        transition: 0.5s;
        filter: blur(5px);
        position: absolute;
        transform: scale(1.03);
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .gallery-slider .items-group .item .block {
        width: 100%;
        height: 100%;
        padding: 20px;
        color: #ffffff;
        transition: box-shadow 0.5s;
        max-width: 300px;
        overflow: hidden;
        max-height: 450px;
        border-radius: 10px;
        transform: scale(1.03);
        box-sizing: border-box;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        box-shadow: none;
    }

    .gallery-slider .items-group .item .block .circleLight {
        top: 0px;
        left: 0px;
        opacity: 0;
        content: "";
        width: 100%;
        height: 100%;
        display: block;
        transition: 0.5s;
        position: absolute;
        border-radius: 10px;
        background: radial-gradient(circle at 80px 40px, #fff, transparent);
    }

    .gallery-slider .items-group .item .block .text {
        width: 100%;
        height: 100%;
        display: flex;
        text-align: center;
        flex-direction: column;
        justify-content: space-between;
        background-position: center;
        background-attachment: fixed;
    }

    .gallery-slider .items-group .item .block h2 {
        color: white;
        font-family: 'Cardo';
        font-size: 34px;
        margin-bottom: 0px;
    }

    .gallery-slider .items-group .item .block p {
        font-family: "Open Sans", sans-serif;
        font-size: 15px;
    }

    .gallery-slider .items-group .item .block:hover {
        box-shadow: 0px 0px 70px #111;
    }

    .gallery-slider .items-group .item .block:hover .circleLight {
        opacity: 0.4;
    }

    .gallery-slider .navigations {
        bottom: 53px;
        width: 100%;
        position: relative;
    }

    .gallery-slider .navigations .dots {
        height: 20px;
        padding: 10px 0px;
        text-align: center;
    }

    .gallery-slider .navigations .dots li {
        width: 10px;
        height: 10px;
        cursor: pointer;
        transition: 0.3s;
        background: #fff;
        border-radius: 50%;
        display: inline-block;
        vertical-align: middle;
    }

    .gallery-slider .navigations .dots li + li {
        margin-left: 10px;
    }

    .gallery-slider .navigations .dots li:hover {
        filter: blur(2px);
    }

    .gallery-slider .navigations .dots li.active {
        width: 15px;
        height: 15px;
    }

    .gallery-slider .navigations .dots li.active:hover {
        filter: blur(0px);
    }
</style>
<div id="gallery"
	class="gallery-slider">
	  <div class="items-group">
		    <div class="item">
				 <div class="block">
					   <span class="circleLight"></span>
					   <div class="text">
							<h2>Sleek and modern!</h2>
							<p>A cool car indeed.</p>
					   </div>
				 </div>
		    </div>
		    <div class="item">
				 <div class="block">
					   <span class="circleLight"></span>
					   <div class="text">
							<h2>Powerful and confident.</h2>
							<p>Impressive to many.</p>
					   </div>
				 </div>
		    </div>
		    <div class="item">
				 <div class="block">
					   <span class="circleLight"></span>
					   <div class="text">
							<h2>Magnificent design!</h2>
							<p>Hard to miss.</p>
					   </div>
				 </div>
		    </div>
		    <div class="item">
				 <div class="block">
					   <span class="circleLight"></span>
					   <div class="text">
							<h2>Elegance and luxury.</h2>
							<p>Truly beautiful.</p>
					   </div>
				 </div>
		    </div>
		    <div class="item">
				 <div class="block">
					   <span class="circleLight"></span>
					   <div class="text">
							<h2>Vibrant and unique.</h2>
							<p>Stands out.</p>
					   </div>
				 </div>
		    </div>
		    <div class="item">
				 <div class="block">
					   <span class="circleLight"></span>
					   <div class="text">
							<h2>Modern and advanced.</h2>
							<p>Impressive performance.</p>
					   </div>
				 </div>
		    </div>
		    <div class="item">
				 <div class="block">
					   <span class="circleLight"></span>
					   <div class="text">
							<h2>Charming appearance.</h2>
							<p>Perfect combination.</p>
					   </div>
				 </div>
		    </div>
		    <div class="item">
				 <div class="block">
					   <span class="circleLight"></span>
					   <div class="text">
							<h2>Inspiring admiration.</h2>
							<p>Luxurious and amazing.</p>
					   </div>
				 </div>
		    </div>
		    <div class="item">
				 <div class="block">
					   <span class="circleLight"></span>
					   <div class="text">
							<h2>Elegance and luxury.</h2>
							<p>Beauty and elegance.</p>
					   </div>
				 </div>
		    </div>
	  </div>


	  <div class="navigations">
		    <ul class="dots"></ul>
	  </div>
</div>


<section id="team"
	    class="team">
	  <span>Meet Our</span>
	  <div class="col-lg-12 text-center">
		    <h2 class="section-heading">Our Automotive Experts</h2>
		    <p>Get to know our team of automotive enthusiasts who are
				 passionate about cars and technology.</p>
	  </div>
	  <span class="bg-watermark">Team</span>
	  <div class="container1">
		    <div class="cards">
				 <div class="card2">
					   <img
							src="assets/img/portfolio/MOHAMED.jpg"
							alt="Mohamed Mansour El-Gebaly">
					   <div class="card-content">
							<h3>Mohamed Mansour El-Gebaly</h3>
							<p>Sales Manager </p>
							<ul>
								  <li>
									    <a target="_blank"
										  href="https://facebook.com/profile.php?id=100035481951645"><i
												   class="fa-brands fa-facebook"></i></a>
								  </li>
								  <li>
									    <a href="#"><i
												   class="fa-brands fa-twitter"></i></a>
								  </li>
								  <li>
									    <a target="_blank"
										  href="http://www.linkedin.com/in/mohamed-el-gebaly-18a40a299"><i
												   class="fa-brands fa-linkedin-in"></i></a>
								  </li>
								  <li>
									    <a href="#"><i
												   class="fa-brands fa-google"></i></a>
								  </li>
							</ul>
					   </div>
				 </div>
		    </div>
	  </div>
</section>


<style>
    #contact {
        background-image: url(img/contactus.jpg);
    }
</style>
<main id="contact"
	 class="cd-fixed-bg">
	  <div class="cd-bg-2">
		    <section>
				 <div class="container">
					   <div class="row row2">
							<div class="col-lg-12 text-center"
								style="margin-bottom: 45px;">
								  <h2 class="section-heading">Contact
									    Us</h2>
							</div>
					   </div>
					   <div class="row1">
							<div class="col-lg-12">
								  <form name="sentMessage"
									   id="contactForm"
									   novalidate=""
									   method="post">
									    <div class="row">
											 <div class="col-md-6">
												   <div class="form-group">
														<input type="text"
															  name="name"
															  class="form-control"
															  placeholder="Your Name *"
															  id="name"
															  required=""
															  data-validation-required-message="Please enter your name.">
														<p class="help-block text-danger"></p>
												   </div>
												   <div class="form-group">
														<input type="email"
															  name="email"
															  class="form-control"
															  placeholder="Your Email *"
															  id="email"
															  required=""
															  data-validation-required-message="Please enter your email">
														<p class="help-block text-danger"></p>
												   </div>
												   <div class="form-group">
														<input type="text"
															  name="subject"
															  class="form-control"
															  placeholder="subject"
															  id="phone"
															  required=""
															  data-validation-required-message="Please
															   enter your subject">
														<p class="help-block text-danger"></p>
												   </div>
											 </div>
											 <div class="col-md-6">
												   <div class="form-group">
													   <textarea
															class="form-control"
															name="message"
															placeholder="Your Message *"
															id="message"
															required=""
															data-validation-required-message="Please enter a message.">
													   </textarea>
														<p class="help-block text-danger"></p>
												   </div>
											 </div>
											 <div class="clearfix"></div>
											 <div class="col-lg-12 text-center">
												   <div id="success"></div>
												   <button
														type="submit"
														name="send_message"
														class="btn btn-xl">
														Send
														Message
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


<style>
    footer p:hover {
        color: rgba(var(--bs-secondary-rgb));
    }

    .fa-facebook-f {
        color: #3b5998;
    }

    /* اللون الأزرق لفيسبوك */
    .fa-twitter {
        color: #1da1f2;
    }

    /* اللون الأزرق لتويتر */
    .fa-google {
        color: #dd4b39;
    }

    /* اللون الأحمر لجوجل */
    .fa-instagram {
        color: #e4405f;
    }

    /* اللون الأحمر لإنستجرام */
    .fa-linkedin {
        color: #0e76a8;
    }

    /* اللون الأزرق للينكد إن */
    .fa-github {
        color: #333;
    }


    /* اللون الأسود لجيت هاب */
</style>
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
				 <a href=""
				    class="me-4 text-reset">
					   <i class="fab fa-facebook-f"></i>
				 </a>
				 <a href=""
				    class="me-4 text-reset">
					   <i class="fab fa-twitter"></i>
				 </a>
				 <a href=""
				    class="me-4 text-reset">
					   <i class="fab fa-google"></i>
				 </a>
				 <a href=""
				    class="me-4 text-reset">
					   <i class="fab fa-instagram"></i>
				 </a>
				 <a href=""
				    class="me-4 text-reset">
					   <i class="fab fa-linkedin"></i>
				 </a>
				 <a href=""
				    class="me-4 text-reset">
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
								  classic cars and immerse
								  yourself in the timeless beauty of
								  automotive history.
							</p>
					   </div>

					   <div class="col-md-6 col-lg-4 col-xl-4 mx-auto mb-4">
							<!-- Links -->
							<div class="row">
								  <h6 class="col text-uppercase fw-bold mb-4">
									    Useful links</h6>
							</div>
							<div class="row">
								  <div class="col-md-6">
									    <p>
											 <a href="#about"
											    class="text-reset">About</a>
									    </p>
									    <p>
											 <a href="#services"
											    class="text-reset">Services</a>
									    </p>
									    <p>
											 <a href="#products"
											    class="text-reset">Products</a>
									    </p>
								  </div>
								  <div class="col-md-6">
									    <p>
											 <a href="#gallery"
											    class="text-reset">gallerys</a>
									    </p>
									    <p>
											 <a href="#team"
											    class="text-reset">Team</a>
									    </p>
									    <p>
											 <a href="#contact"
											    class="text-reset">Contact</a>
									    </p>
								  </div>
							</div>
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
							<p><i class="fas fa-phone me-3"></i> + 020
								  1016 412 213 </p>
							<p><i class="fas fa-print me-3"></i> + 020
								  1152 898 744 </p>
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
		    © 2024 Copyright:
		    <a class="text-reset fw-bold"
			  target="_blank"
			  href="https://web.facebook.com/profile.php?id=100035481951645">Mohamed
				 Mansour</a>
	  </div>
	  <!-- Copyright -->
</footer>
<!-- Footer -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/scriptGovernorate.js"></script>
<script src="js/actionscript.js"></script>

<!---->
<!---->
<!---->
<!---->

<!-- Bootstrap core JS-->
<!--<script-->
<!--	  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>-->
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>