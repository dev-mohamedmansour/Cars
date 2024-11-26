<!DOCTYPE html>
<html lang = "en">
<head>

    <!-- main template css file -->
    <link rel = "stylesheet"
          href = "../css/admin/admin_page.css"/>
    <link rel = "stylesheet"
          href = "../css/admin/admin_orders.css"/>
    <!-- Render All Elements Normally -->
    <link rel = "stylesheet"
          href = "../css/normalize.css"/>
    <!-- font Awesome Library -->
    <link rel = "stylesheet"
          href = "../css/all.min.css"/>
    <!-- Google fonts -->
    <!--    <link rel = "preconnect"-->
    <!--          href = "https://fonts.googleapis.com"/>-->
    <!--    <link rel = "preconnect"-->
    <!--          href = "https://fonts.gstatic.com"-->
    <!--          crossorigin/>-->
    <!--    <link-->
    <!--            href = "https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap"-->
    <!--            rel = "stylesheet"-->
    <!--    />-->
    <meta http-equiv = "X-UA-Compatible"
          content = "IE=edge"/>
    <meta charset = "utf-8"/>
    <meta name = "viewport"
          content = "width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name = "description"
          content = "this website or classic cars that you can buy and bought you classic car"/>
    <meta name = "author"
          content = "Mohamed Mansour"/>
    <title>Orders Details</title>
    <!-- Favicon-->
    <link rel = "icon"
          type = "image/x-icon"
          href = "../assets/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src = "https://use.fontawesome.com/releases/v6.3.0/js/all.js"
            crossorigin = "anonymous"></script>
    <!-- Google fonts-->
    <link href = "https://fonts.googleapis.com/css?family=Montserrat:400,700"
          rel = "stylesheet"
          type = "text/css"/>
    <link href = "https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic"
          rel = "stylesheet"
          type = "text/css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel = "stylesheet"
          href = "../css/mdb.dark.min.css">
    <link rel = "stylesheet"
          href = "../css/mdb.dark.min.css.map">
    <link rel = "stylesheet"
          href = "../css/mdb.dark.rtl.min.css">
    <link rel = "stylesheet"
          href = "../css/mdb.min.css">
    <link rel = "stylesheet"
          href = "../css/mdb.min.css.map">
    <link rel = "stylesheet"
          href = "../css/mdb.rtl.min.css">

    <link href = "../css/styles.css"
          rel = "stylesheet"/>
</head>

<body id = "page-top">
<?php
	 session_start();
	 $userId = $_SESSION[ 'clientId' ];
	 if (!isset($userId)) {
		  header('location:../login.php');
	 }
?>


<!-- Navigation-->
<nav class = "navbar navbar-expand-lg bg-secondary text-uppercase fixed-top"
     id = "mainNav">
    <div class = "container">
        <a class = "navbar-brand"
           href = "#page-top">Classic Cars</a>
        <button
                class = "navbar-toggle text-uppercase font-weight-bold bg-primary text-white rounded"
                type = "button"
                data-bs-toggle = "collapse"
                data-bs-target = "#navbarResponsive"
                aria-controls = "navbarResponsive"
                aria-expanded = "false"
                aria-label = "Toggle navigation">
            Menu
            <i class = "fas fa-bars"></i>
        </button>
        <div class = "collapse navbar-collapse"
             id = "navbarResponsive">
            <ul class = "navbar-nav ms-auto">
                <li class = "nav-item mx-0 mx-lg-1"><a
                            class = "nav-link py-3 px-0 px-lg-3 rounded"
                            href = "#contact">contact</a></li>
                <li class = "nav-item mx-0 mx-lg-1"><a
                            class = "nav-link py-3 px-0 px-lg-3 rounded"
                            href = "../index.php">Home
                    </a></li>
                <li class = "nav-item mx-0 mx-lg-1"><a
                            class = "nav-link py-3 px-0 px-lg-3 rounded"
                            href = "orderCustomize.php">OrderCustomization
                    </a></li>
                <li class = "nav-item mx-0 mx-lg-1"><a
                            class = "nav-link py-3 px-0 px-lg-3 rounded"
                            href = "../sign_up.php">Sign Up</a></li>
                <li class = "nav-item mx-0 mx-lg-1"><a
                            class = "nav-link py-3 px-0 px-lg-3 rounded"
                            href = "../login.php">Login</a></li>
            </ul>
            <ul>
                <li class = "user-btn">
                    <a class = "logout"
                       href = "../logout.php">logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->


<style>
    #contact {
        background-image: url(../img/OrderInformation.jpg);
        background-attachment: scroll;
        margin-top: 100px;
    }

</style>
<main id = "contact"
      class = "cd-fixed-bg">
    <!--        cd-fixed-bg style = "height: 90vh;">-->
    <section class = "orders">
        <h1 class = "title">Your Orders</h1>
        <div class = "container">
		    <?php
				include '../Logic/userLogic/orderLogic.php';
				showorders();
		    ?>
        </div>
    </section>
</main>


<!-- Footer -->
<footer class = "text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
    <div class = "d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class = "me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href = ""
               class = "me-4 text-reset">
                <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = ""
               class = "me-4 text-reset">
                <i class = "fab fa-twitter"></i>
            </a>
            <a href = ""
               class = "me-4 text-reset">
                <i class = "fab fa-google"></i>
            </a>
            <a href = ""
               class = "me-4 text-reset">
                <i class = "fab fa-instagram"></i>
            </a>
            <a href = ""
               class = "me-4 text-reset">
                <i class = "fab fa-linkedin"></i>
            </a>
            <a href = ""
               class = "me-4 text-reset">
                <i class = "fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </div>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <div class = "">
        <div class = "container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class = "row mt-3">
                <!-- Grid column -->
                <div class = "col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class = "text-uppercase fw-bold mb-4">
                        <i class = "fas fa-gem me-3"></i>CLASSIC
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
                <!-- Grid column -->

                <!-- Grid column -->
                <div class = "col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class = "text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href = "#!"
                           class = "text-reset"></a>
                    </p>
                    <p>
                        <a href = "#!"
                           class = "text-reset"></a>
                    </p>
                    <p>
                        <a href = "#!"
                           class = "text-reset"></a>
                    </p>
                    <p>
                        <a href = "#!"
                           class = "text-reset"></a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class = "col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class = "text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href = "#about"
                           class = "text-reset">About</a>
                    </p>
                    <p>
                        <a href = "#services"
                           class = "text-reset">Services</a>
                    </p>
                    <p>
                        <a href = "#products"
                           class = "text-reset">Products</a>
                    </p>
                    <p>
                        <a href = "#contact us"
                           class = "text-reset">Contact us</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class = "col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class = "text-uppercase fw-bold mb-4">
                        Contact us</h6>
                    <p><i class = "fas fa-home me-3"></i> New York,
                        NY 10012, US</p>
                    <p>
                        <i class = "fas fa-envelope me-3"></i>
                        info@example.com
                    </p>
                    <p><i class = "fas fa-phone me-3"></i> + 01 234
                        567 88</p>
                    <p><i class = "fas fa-print me-3"></i> + 01 234
                        567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </div>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class = "text-center p-4"
         style = "background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright: Mohamed Mansour
        <a class = "text-reset fw-bold"
           href = ""></a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->


<!-- Bootstrap core JS-->
<script
        src = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src = "../js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src = "https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>